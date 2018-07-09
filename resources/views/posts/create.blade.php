@extends('main')
@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <hr>
            <h1> Create New Post </h1>

            {!! Form::open(array('route' => 'posts.store', 'data-parsely-validate' => '')) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))  }}

            {{ Form::label('body', 'Post Body:') }}
            {{ Form::textarea('body',null,array('class' => 'form-control', 'required' => '')) }}

            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}
            {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection


@section('scripts')

    {!! Html::style('js/parsley.min.js') !!}

@endsection