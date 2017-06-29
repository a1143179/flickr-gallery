@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default col-xs-12 pt10 pb10">
                {{ Form::open(array('url' => '/category', 'method' => 'POST', 'class' => 'form-inline')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'New Category') }}
                        {{ Form::text('name', '', array('class' => 'form-control')) }}
                    </div>
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                    {{
                        Form::button('Cancel', array(
                            'class' => 'btn btn-warning', 
                            'onclick' => 'window.location="/category"',
                        )) 
                    }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
