@extends('main')
<?php $titleTag = htmlspecialchars($tag->name); ?>
@section('title', "| $titleTag Tag")

@section('content')

    <div class="row">
        <div class="col-md-8">
        <h1>{{ $tag->name }} Tag  <small class="text-muted">{{$tag->posts()->count()}} Posts</small></h1>

        </div>
        <div class="col-md-2 ">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-md btn-primary my-3 btn-block" >Edit</a>
        </div>

        <div class="col-md-2">
            {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block my-3']) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Tags</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                            <span class="badge  badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-outline-secondary btn-xs"> View</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection



