<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Session;

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
        // create a variable and store all the blog posts in ti from the database
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        //return a view and pass in the adove varable
        return view('post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category:: all();
        return view('post.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request, array(
            'title' => 'required|max:250',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));
        // store it in to the date base
        $post = new Post;

        $post->title=$request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body=$request->body;

        $post->save();

        Session::flash('success', 'The blog post was sucessfully save!');

        return redirect()->route('posts.show', $post->id);

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
        return view('post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the dataase and save as a ver
        $post = Post::find($id);
        $categories = Category:: all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        // return the view and pass in the var we previously created
        return view('post.edit')->withPost($post)->withCategories($cats);
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
        $post = Post::find($id);
        //Validate the data
        if ($request->input('slug') == $post->slug) {
         $this->validate($request, array(
            'title' => 'required|max:250',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));           
        } else {    
            $this->validate($request, array(
            'title' => 'required|max:250',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));    
        }
        //Save the data to the database
         $post = Post::find($id);

         $post->title = $request->input('title');
         $post->slug = $request->input('slug');
         $post->category_id = $request->input('category_id');
         $post->body = $request->input('body');

         $post->save();
        //Set flash data with success massage
         Session::flash('success', 'This post was sucessfully save');
        //Redirect with flash data to posts.show 
         return redirect()->route('posts.show', $post->id);
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

        Session::flash('success', 'The post was sucessfully deleted.');
        return redirect()->route('posts.index');
    }
}
