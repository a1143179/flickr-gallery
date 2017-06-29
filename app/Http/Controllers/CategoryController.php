<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\App;
use View;
use JeroenG\Flickr\Flickr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = new Categories();
        return View::make('category.index', array(
            'categories' => $category->all()
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categories();
        $category->name = $request->name;
        $category->save();
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        return View::make('category.edit', array(
            'category' => $category
        ));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Categories::find($id);
        $cat->name = $request->name;
        $cat->save();
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categories::find($id);
        $cat->delete();
    }
    
    public function flickrSearch(Request $req)
    {
        $flickr = new Flickr(new \JeroenG\Flickr\Api('72c9418a120160ce4244b4cc3680f0cf', 'php_serial'));
        $result = $flickr->request('flickr.photos.search', array(
            'tags' => $req->catName,
            'nojsoncallback' => '1',
        ));
        $photos = array();
        foreach ($result->photos['photo'] as $photo) {
            $photos[] = array(
                'id' => $photo['id'],
                'url' => 'https://farm' . $photo['farm'] . '.staticflickr.com/'
                    . $photo['server'] . '/' . $photo['id'] . '_'
                    . $photo['secret'] . '_s.jpg'
            );
        }
        
        return $photos;
        /*return View::make('category.flickr', array(
            'photos' => $photos,
        ));*/
    }
    
    public function flickrInfo(Request $req)
    {
        $flickr = new Flickr(new \JeroenG\Flickr\Api('72c9418a120160ce4244b4cc3680f0cf', 'php_serial'));
        $result = $flickr->request('flickr.photos.getInfo', array(
            'photo_id' => $req->id,
            'nojsoncallback' => '1',
        ));
        var_dump($result);die();
    }
}
