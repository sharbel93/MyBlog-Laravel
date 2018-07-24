@extends('main')
@section('title' , '| Edit Blog Post')

@section('stylesheets')

    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'] ) !!}
    <div class="row">


        <div class="col-lg-8 col-md-8">

       {{ Form::label('title', 'Title:') }}
       {{ Form::text('title', null, ['class' => 'form-control form-control-lg'] , ['placeholder' => '.form-control-lg']) }}

            {{ Form::label('slug', 'Slug:',  ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ['class' => 'form-control '] ) }}

            {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:', ['class' => 'mb-2 my-2']) }}
            {{ Form::select('tags[]', $tags, null, ['id' => 'users', 'class' => 'form-control', 'multiple' => 'multiple']) }}

            {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
       {{ Form::textarea('body',null, ['class' => 'form-control']) }}

        </div>



        <div class="col-md-4 col-lg-4">
            <div class="jumbotron">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-dark">
                        Create At: <span class="float-right">{{ date('M j, Y H:i', strtotime($post->created_at)) }}</span>
                    </li>
                    <li class="list-group-item list-group-item-dark">
                        Last Updated: <span class="float-right">{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</span>
                    </li>
                </ul>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel ', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                    </div>

                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        {{--<a href="#" class="btn btn-danger btn-block">Delete</a>--}}
                        {{--{!! Html::linkRoute('posts.update', 'Save Changes', array($post->id), array('class' => 'btn btn-success btn-block')) !!}--}}
                    </div>
                </div>

            </div>
        </div>


    </div> <!-- end od .row (form) -->
    {!! Form::close() !!}

@stop


@section('scripts')


    {{--{!! Html::style('js/select2.min.js') !!}--}}
    <script>
        $(document).ready(function(){
            $('#users').select2({
                // placeholder : 'Please select a tag',
                tags: true
            });
        });
    </script>

@endsection