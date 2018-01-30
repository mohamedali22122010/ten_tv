<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FeatureVideo;
use App\Program;
use Carbon\Carbon;
use App\Jobs\RmoveMedia;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveTemp;

class FeatureVideoController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = FeatureVideo::orderBy('is_home','desc')->orderBy('id','desc')->paginate(10);
        return view('backend.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video = new FeatureVideo;
		$programs = Program::approved()->get()->pluck('title','id')->sort()->toArray();
        return view('backend.videos.create',compact('video','programs'));
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
        $video = new FeatureVideo;
		$video->fill($request->except('_token'));
		if($request->is_home){
            $video->is_home = 1;
        }else{
            $video->is_home = 0;
        }
		$video->save();
		
		return redirect(route('video.index'));
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
        $video = FeatureVideo::findOrFail($id);
		$programs = Program::approved()->get()->pluck('title','id')->sort()->toArray();
        return view('backend.videos.edit',compact('video','programs'));
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
        $video = FeatureVideo::findOrFail($id);
		$video->fill($request->except('_token'));
		if($request->is_home){
            $video->is_home = 1;
        }else{
            $video->is_home = 0;
        }
		$video->save();
		
		return redirect(route('video.index'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return FeatureVideo::destroy($id);
    }
}
