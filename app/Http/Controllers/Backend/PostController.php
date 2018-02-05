<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Carbon\Carbon;
use App\Jobs\RmoveMedia;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveTemp;

class PostController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('backend.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
		$categories = Category::approved()->get()->pluck('title','id')->sort()->toArray();
        return view('backend.posts.create',compact('post','categories','stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Post;
		$post->fill($request->except('_token'));
		$post->user_id = auth()->user()->id;
		if($request->status){
            $post->status = 1;
        }else{
            $post->status = 0;
        }
		
		if($request->home_page){
            $post->home_page = 1;
        }else{
            $post->home_page = 0;
        }

        if($request->home_page_soon){
           $post->home_page_soon = 1;
        }else{
           $post->home_page_soon = 0;
        }
		
		$post->save();
		// associate images to product
        $this->dispatch(new AssociateMedia($post,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($post->urls));
		
		return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
		$categories = Category::approved()->get()->pluck('title','id')->sort()->toArray();
        return view('backend.posts.edit',compact('post','categories','stages'));
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
        //
        $post = Post::findOrFail($id);
		$post->fill($request->except('_token'));
		
		if($request->status){
            $post->status = 1;
        }else{
            $post->status = 0;
        }
		
		if($request->home_page){
            $post->home_page = 1;
        }else{
            $post->home_page = 0;
        }	
        if($request->home_page_soon){
           $post->home_page_soon = 1;
        }else{
           $post->home_page_soon = 0;
        }
		
		$post->save();
		// removed deleted images
        $this->dispatch(new RmoveMedia($post,$request->removedImages,'images'));
        // add images 
        $this->dispatch(new AssociateMedia($post,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($request->urls));
		
		return redirect(route('post.index'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
    }
}
