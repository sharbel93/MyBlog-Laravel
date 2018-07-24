@extends('main')
@section('title', '| View Post')
@section('content')

    <div class="row">
        <div class="col-md-8">
    <h1>{{ $post->title }}</h1>
    <p class="lead"> {{ $post->body }}</p>

            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="badge badge-pill badge-secondary"> {{ $tag->name }}</span>
                @endforeach
            </div>

        </div>



    <div class="col-md-4">
        <div class="jumbotron">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">
                    Url Slug : <span > <a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug)  }}</a></span>
                </li>
                <li class="list-group-item list-group-item-dark">
                    <label>Category:</label>
                    <span class="float-right"><p>{{ $post->category->name }}</p></span>
                </li>
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
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                    {{--<a href="#" class="btn btn-danger btn-block">Delete</a>--}}
                     {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                    {!! Form::close() !!}
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    {{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-outline-info btn-block form-spacing-top']) }}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection