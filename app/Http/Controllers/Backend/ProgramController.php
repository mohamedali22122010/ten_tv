<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Program;
use Carbon\Carbon;
use App\Jobs\RmoveMedia;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveTemp;

class ProgramController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::paginate(10);
        return view('backend.programs.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = new Program;
        return view('backend.programs.create',compact('program'));
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
        $program = new Program;
		$program->fill($request->except('_token'));
		if($request->status){
            $program->status = 1;
        }else{
            $program->status = 0;
        }
		
		$program->save();
		// associate images to product
        $this->dispatch(new AssociateMedia($program,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($program->urls));
		
		return redirect(route('program.index'));
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
        $program = Program::findOrFail($id);
        return view('backend.programs.edit',compact('program'));
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
        $program = Program::findOrFail($id);
		$program->fill($request->except('_token'));
		
		if($request->status){
            $program->status = 1;
        }else{
            $program->status = 0;
        }
		
		$program->save();
		// removed deleted images
        $this->dispatch(new RmoveMedia($program,$request->removedImages,'images'));
        // add images 
        $this->dispatch(new AssociateMedia($program,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($request->urls));
		
		return redirect(route('program.index'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Program::destroy($id);
    }
}
