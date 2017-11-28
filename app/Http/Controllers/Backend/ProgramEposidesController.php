<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProgramEposides;
use App\Program;
use Carbon\Carbon;
use App\Jobs\RmoveMedia;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveTemp;

class ProgramEposidesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eposides = ProgramEposides::paginate(10);
        return view('backend.eposides.index',compact('eposides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eposide = new ProgramEposides;
		$programs = Program::approved()->get()->pluck('title','id')->sort()->toArray();
        return view('backend.eposides.create',compact('eposide','programs'));
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
        $eposide = new ProgramEposides;
		$eposide->fill($request->except('_token'));
		
		$eposide->save();
		
		return redirect(route('eposide.index'));
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
        $eposide = ProgramEposides::findOrFail($id);
		$programs = Program::approved()->get()->pluck('title','id')->sort()->toArray();
        return view('backend.eposides.edit',compact('eposide','programs'));
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
        $eposide = ProgramEposides::findOrFail($id);
		$eposide->fill($request->except('_token'));
		
		$eposide->save();
		
		return redirect(route('eposide.index'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ProgramEposides::destroy($id);
    }
}
