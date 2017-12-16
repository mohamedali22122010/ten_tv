<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Slider;
use App\Http\Requests\SliderRequest;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveMedia;
use App\Jobs\RmoveTemp;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $sliders = Slider::orderBy('id','desc');
		$sliders = $sliders->paginate(10);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = new Slider;
		return view('backend.sliders.create',compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider;
        $slider->fill($request->except('_token'));
		if($request->active){
            $slider->active = 1;
        }else{
            $slider->active = 0;
        }
		$slider->save();
		$flash_message = [];
		$flash_message['class'] = 'success';
		$flash_message['body'] = 'Slider Has been added';


        $slider->clearMediaCollection('main_image');
        $slider->clearMediaCollection('tablet_image');
        $slider->clearMediaCollection('mobile_image');

        $slider->addMedia($request->file('main_image'))->toCollection('main_image');
        $slider->addMedia($request->file('tablet_image'))->toCollection('tablet_image');
        $slider->addMedia($request->file('mobile_image'))->toCollection('mobile_image');


		return redirect(route('sliders.index'))->with(['flash_message' => $flash_message]);
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
        //
        $slider = Slider::find($id);
        return view('backend.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        //
        $slider = Slider::find($id);
        $slider->fill($request->except('_token'));
		if($request->active){
            $slider->active = 1;
        }else{
            $slider->active = 0;
        }
		$slider->save();
		$flash_message = [];
		$flash_message['class'] = 'success';
		$flash_message['body'] = 'Slider Has been added';
        if ($request->hasFile('main_image')) {
            $slider->clearMediaCollection('main_image');          
            $slider->addMedia($request->file('main_image'))->toCollection('main_image');
        }

        if ($request->hasFile('tablet_image')) {
            $slider->clearMediaCollection('tablet_image');
            $slider->addMedia($request->file('tablet_image'))->toCollection('tablet_image');
        }
        if ($request->hasFile('mobile_image')) {
            $slider->clearMediaCollection('mobile_image');
            $slider->addMedia($request->file('mobile_image'))->toCollection('mobile_image');
        }
		
		return redirect(route('sliders.index'))->with(['flash_message' => $flash_message]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Slider::destroy($id);
    }
}
