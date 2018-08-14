@extends('main')
@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {{--{!! Html::style('css/select2.min.css') !!}--}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea',
        plugins: 'link code'});</script>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <hr>
            <h1> Create New Post </h1>

            {!! Form::open(array('route' => 'posts.store', 'data-parsely-validate' => '', 'files' => true)) !!}
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))  }}

            {{ Form::label('slug', 'Slug:', array('class' => 'my-2')) }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '','minlength' => '5', 'maxlength' => '255'))  }}

            {{ Form::label('category_id', 'Category :', array('class' => 'my-2')) }}
            <select name="category_id" class="mb-2  form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>


            {{ Form::label('tags', 'Tags: ', array('class' => 'my-2')) }}
            <select name="tags[]"  id="users" class="mb-2 form-control"  multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>


             
            {{  Form::label('featured_image', 'Upload Featured Image:', [ 'class' => 'my-4']) }}<br>
            {{  Form::file('featured_image', [ 'class' => 'mb-3']) }}<br>
            
             

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
    {{--{!! Html::style('js/select2.min.js') !!}--}}

    <script>
        $(document).ready(function(){
            $('#users').select2({
                placeholder : 'Please select a tag',
                tags: true
            });
        });
    </script>

@endsection