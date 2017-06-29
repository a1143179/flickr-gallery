@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Categories Admin
                </div>
                

                <div id="categoryList" class="panel-body">
                    {{ Form::button('New Category', array(
                        'class' => 'btn btn-primary col-xs-12',
                        'onclick' => 'window.location="/category/create"'
                    )) }}
                    @foreach ($categories as $category)
                        <div class="catName col-xs-12 categoryItem">{{ $category->name }}</div>
                        <div class="col-xs-12">
                            <div class="row">
                                <div data-cat-id="{{ $category->id }}" v-on:click="editCategory" class="col-xs-6 text-center editCat btn-primary">
                                    <span class="editCategory glyphicon glyphicon-edit"></span>
                                </div>
                                <div data-cat-id="{{ $category->id }}" v-on:click="deleteCategory" class="col-xs-6 text-center delCat btn-warning">
                                    <span class="deleteCategory glyphicon glyphicon-trash"></span>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
