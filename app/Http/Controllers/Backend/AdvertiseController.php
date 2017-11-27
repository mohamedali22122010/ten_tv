<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Advertise;

class AdvertiseController extends Controller
{
	public function __construct()
	{
        $this->middleware(function ($request, $next) {
			if(auth()->user()->role_id != 1){
				return response()->view('backend.errors.401',['message'=>trans('backend.you are not authorized to do this action')]);
			}
            return $next($request);
        });
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertises = Advertise::paginate(10);
        return view('backend.advertises.index',compact('advertises'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertise = Advertise::findOrFail($id);
		return view('backend.advertises.edit',compact('advertise'));
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
        $advertise = Advertise::findOrFail($id);
		$advertise->fill($request->except('_token'));
		if($request->status){
            $advertise->status = 1;
        }else{
        	$advertise->status = 0;
        }
		$advertise->save();
		return redirect(route('advertise.index'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
