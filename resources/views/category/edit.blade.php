@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Gallery </div>

                <div id="categoryList" class="panel-body">
                    {{ Form::open(array('url' => '/category/' . $category->id )) }}
                        <div class="form-group">
                            {{ Form::label('name', 'New Name') }}
                            {{ Form::text('name', $category->name, array('class' => 'form-control')) }}
                        </div>
                        {{ method_field('PUT') }}
                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                        {{ Form::button('Cancel', array('class' => 'btn', 'onclick' => 'window.location="/category"')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
