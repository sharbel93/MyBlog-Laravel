<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'slug' => 'required|alpha_dash |min:5 |max: 255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body'=> 'required',
            'featured_image' => 'sometimes|image'
        ));

        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifierfier::clean($request->body);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        // redirect to another page
        return redirect()->route('posts.show', $post->id)->with('success', 'The blog post was successfully saved!');
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
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tagsArray = array();
        foreach ($tags as $tag) {
            $tagsArray[$tag->id] = $tag->name;
        }


        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tagsArray);
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
        $post = Post::find($id);
        //         'category_id' => 'required|integer',
        //         'body'=> 'required'
        //     ));
        // } else {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => "required|alpha_dash |min:5 |max: 255|unique:posts,slug, $id",
            'category_id' => 'required|integer',
            'body' => 'required',
            'featured_image' => 'image'
        ));
        // if ($request->input('slug') == $post->slug) {
        //     $this->validate($request, array(
        //         'title' => 'required|max:255',
   
        // }

        // Save the data to the database

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {
           
            // add the new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image;
           
            // update the database
            $post->image = $filename;
            // Delete the old photo
            Storage::delete($oldFilename);
        }

        $post->save();


        $post->tags()->sync($request->tags);

        // incase oferrors use the below code
//        if (isset($request->tags)){
//
//            $post->tags()->sync($request->tags);
//        } else {
//            $post->tags()->sync(array());
//        }



        // redirect with a success message to posts.show
        return redirect()->route('posts.show', $post->id)->with('success', 'The blog post was successfully saved!');
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
        $post->tags()->detach();
        Storage::delete($post->image);

        $post->delete();


        return redirect()->route('posts.index')->with('success', 'The blog post was successfully Deleted!');
    }
}
