@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <img src="{{ asset('images/posts/' . $post->image) }}"  height="400" width="800">
            <h1>{{ $post->title }}</h1>
            <p> {!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>



    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="comments-title">
                  <span class="badge  ">
                        <i class="fas fa-2x fa-comments"></i> &nbsp;{{ $post->comments()->count() }}
                    </span>
                Comments
            </h3>
        @foreach($post->comments as $comment)
        <div class="comment">
        <div class="author-info">
        <img src="{{ "https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email)))."?s=50&d=wavatar" }}" alt="image" class="author-image">
        <div class="author-name">
        <h4>{{ $comment->name }}</h4>
        <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</p>

        </div>
        </div>

        <div class="comment-content">
        {{ $comment->comment }}
        </div>

        </div>
        @endforeach
        </div>
        </div>

    <div class="row my-5">
        <div id="comment-form" class=" col-md-8 offset-md-2">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}


            <div class="row">

                <div class="col-md-6">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name',null, ['class' => 'form-control ']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email',null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-12">
                    {{ Form::label('comment', 'Comment:') }}
                    {{ Form::textarea('comment',null,['class' => 'form-control', 'rows' => '5']) }}

                    {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block my-3']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>


    {



@endsection