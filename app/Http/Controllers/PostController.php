<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in it from the database
//        $posts = Post::all();

        //paginate
//        $posts = Post::paginate(2);

        // ordering the posts using id number
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body'=> 'required'
        ));

        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        // redirect to another page
        return redirect()->route('posts.show', $post->id)->with('success','The blog post was successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
      /* Or another shortcut */
//        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a var
            $post = Post::find($id);
        // return the view and pass in the var we previously created
             return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body'=> 'required'
        ));
        // Save the data to the database

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // redirect with a success message to posts.show
        return redirect()->route('posts.show', $post->id)->with('success','The blog post was successfully saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success','The blog post was successfully Deleted!');
    }
}
