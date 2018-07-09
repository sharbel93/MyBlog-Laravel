@extends('main')
@section('title', '| View Post')
@section('content')

    <div class="row">
        <div class="col-md-8">
    <h1>{{ $post->title }}</h1>
    <p class="lead"> {{ $post->body }}</p>

        </div>



    <div class="col-md-4">
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
                    {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}
                </div>
                <div class="col-sm-6">
                    {{--<a href="#" class="btn btn-danger btn-block">Delete</a>--}}
                    {!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection