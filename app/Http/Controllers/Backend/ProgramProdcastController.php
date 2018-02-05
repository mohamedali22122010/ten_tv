<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProgramTime;
use App\Program;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ProgramProdcastController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $broadcasts = ProgramTime::paginate(10);
        return view('backend.broadcasts.index',compact('broadcasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $broadcast = new ProgramTime;

		$programs = Program::approved()->get()->pluck('title','id')->sort()->toArray();
        $programs['0'] = "Others";
        return view('backend.broadcasts.create',compact('broadcast','programs'));
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
        $broadcast = new ProgramTime;
		$this->validate($request,[
	        'show_at' => Rule::unique('program_times')->where(function ($query) use($request) {
			    return $query->where('day', $request->day);
			})
	    ]);
		$broadcast->fill($request->except('_token'));
        if($request->program_id == 0){
            $broadcast->program_id = null;
        }
		if($request->repeate){
            $broadcast->repeate = 1;
        }else{
            $broadcast->repeate = 0;
        }
		$broadcast->save();
		
		return redirect(route('broadcast.index'));
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
        $broadcast = ProgramTime::findOrFail($id);
		$programs = Program::approved()->get()->pluck('title','id')->sort()->toArray();
        $programs['0'] = "Others";
        return view('backend.broadcasts.edit',compact('broadcast','programs'));
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
        $broadcast = ProgramTime::findOrFail($id);
		$this->validate($request,[
	        'show_at' => Rule::unique('program_times')->where(function ($query) use($request ,$id) {
			    return $query->where('day', $request->day)->where('id','!=',$id);
			})
	    ]);
	    $broadcast->fill($request->except('_token'));
        if($request->program_id == 0){
            $broadcast->program_id = null;
        }
		if($request->repeate){
            $broadcast->repeate = 1;
        }else{
            $broadcast->repeate = 0;
        }
		
		$broadcast->save();
		
		return redirect(route('broadcast.index'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ProgramTime::destroy($id);
    }
}
