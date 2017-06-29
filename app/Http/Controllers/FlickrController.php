<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\App;
use View;
use JeroenG\Flickr\Flickr;

class FlickrController extends Controller
{
    
    public function search(Request $req)
    {
        $flickr = new Flickr(new \JeroenG\Flickr\Api(config('app.FLICKR_API_KEY'), 'php_serial'));
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
    }
    
    public function photoInfo(Request $req)
    {
        $flickr = new Flickr(new \JeroenG\Flickr\Api(config('app.FLICKR_API_KEY'), 'php_serial'));
        $result = $flickr->request('flickr.photos.getInfo', array(
            'photo_id' => $req->id,
            'nojsoncallback' => '1',
        ));
        $output = array();
        $output['id'] = $result->photo['id'];
        $output['title'] = $result->photo['title']['_content'];
        $output['description'] = $result->photo['description']['_content'];
        $output['url'] = 'https://farm' . $result->photo['farm'] . '.staticflickr.com/'
                    . $result->photo['server'] . '/' . $result->photo['id'] . '_'
                    . $result->photo['secret'] . '_n.jpg';
        return json_encode($output);
    }
}
