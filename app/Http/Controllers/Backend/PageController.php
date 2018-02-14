<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Page;
use App\Http\Requests\PageRequest;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveMedia;
use App\Jobs\RmoveTemp;

class PageController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Page::orderBy('id','desc');
		/*foreach ($request->except('page') as $key => $value) {
			if(!empty($value))
				$pages->likeCondition($key,$value);
		}*/
		$pages = $pages->get();
		//$pages->appends($request->all());
		$data['name'] = "Page";
        return view('backend.pages.index', compact('pages','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page;
		return view('backend.pages.create',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = new Page;
        $page->fill($request->except('_token'));
		if($request->status){
            $page->status = 1;
        }else{
            $page->status = 0;
        }
		$page->save();
		$flash_message = [];
		$flash_message['class'] = 'success';
		$flash_message['body'] = 'Page Has been added';

        // associate images to product
        $this->dispatch(new AssociateMedia($page,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($request->urls));



		return redirect(route('pages.index'))->with(['flash_message' => $flash_message]);
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
        $page = Page::find($id);
        return view('backend.pages.edit',compact('page'));
    }
	
	public function about_us()
	{
		$page = Page::findOrFail(1);
        return view('backend.pages.edit',compact('page'));
	}
	
	public function contact_us()
	{
		$page = Page::findOrFail(2);
        return view('backend.pages.edit',compact('page'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        //
        $page = Page::find($id);
        $page->fill($request->except('_token'));
		if($request->status){
            $page->status = 1;
        }else{
            $page->status = 0;
        }
		$page->save();
		$flash_message = [];
		$flash_message['class'] = 'success';
		$flash_message['body'] = 'Page Has been added';
		
		// removed deleted images
        $this->dispatch(new RmoveMedia($page,$request->removedImages,'images'));
        // add images 
        $this->dispatch(new AssociateMedia($page,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($request->urls));
        
        if(in_array($id,[1,2])){
        	return back()->withInput();
        }
		
		return redirect(route('pages.index'))->with(['flash_message' => $flash_message]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Page::destroy($id);
    }
}
