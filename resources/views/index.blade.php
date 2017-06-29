@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Flickr Gallery
                </div>
                <div class="panel-body">
                    <div class="col-md-3">
                        <div id="categoryList">
                            @foreach ($categories as $category)
                                <div class="row mb10">
                                    <a class="btn btn-primary btn-block categoryItem" href="javascript:void(0);" data-cat-name="{{ $category->name }}" v-on:click="showFlickr">
                                        {{ $category->name }}
                                    </a>
                                </div>
                            @endforeach
                        </div>  
                    </div>
                    <div class="col-md-9">
                        <div id="initial">
                            Select a category from the left to see images here
                        </div>
                        <div id="photoList" class="row text-center">
                    		<img v-for="photo in photos"
                    			:data-id="photo.id" 
                    			v-on:click="flickrInfo" 
                    			class="flickr-image float-left" 
                    			:src="photo.url" />                              
                        </div>
                        <div id="photoDetails" class="row">
                            <div class="col-md-7"><img class="img-responsive" :src="photoInfo.url" /></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div id="photoTitle" class="col-xs-9"><h5>@{{ photoInfo.title }}</h5></div>
                                    <div id="backToListDiv"  v-on:click="backToList" class="col-xs-3">
                                        <a href="#" class="btn btn-primary btn-xs">
                                            <span id="backToList" class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="photoDesc" class="col-xs-12">@{{ photoInfo.description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
