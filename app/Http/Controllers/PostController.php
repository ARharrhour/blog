<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index',["posts"=>auth()->user()->posts()->paginate(5)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        //
       $validation= $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',

        ]);
        if($validation){
           auth()->user()->posts()->create(["title"=>$request->get('title'),"user_id"=>auth()->user()->id,"body"=>$request->get('body')]);


        }
        // else{
        //     session()->flash('failedCreateFeedBack', 'failed create post');
        //     return back();
        // }
return redirect()->route('posts.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('home.blog',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('edit',$post);
        //
        return view('admin.posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $this->authorize('update',$post);
        $post->title=$request->get('title');
        $post->body=$request->get('body');
        $post->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
    public function bulk(Request $request){
        if($request->get('checkboxes')==='delete'){
            return back();
       }else if($request->get('checkboxes')){
            foreach ($request->get('checkboxes') as $delete) {
                Post::find($delete)->delete();
            }
        }
        return back();
    }
}
