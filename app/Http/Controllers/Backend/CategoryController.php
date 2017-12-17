<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Jobs\RmoveMedia;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveTemp;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories =Category::orderBy('id','asc');
		$categories = $categories->paginate(10);

        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        return view('backend.categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->fill($request->except('_token'));
		if($request->status){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
		$category->save();

        // associate images to product
        $this->dispatch(new AssociateMedia($category,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($category->urls));

		return redirect(route('category.index'));
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
        $category = Category::find($id);
        return view('backend.categories.edit',compact('category'));
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
       	$category = Category::find($id);
        $category->fill($request->except('_token'));
		if($request->status){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        // removed deleted images
        $this->dispatch(new RmoveMedia($category,$request->removedImages,'images'));
        // add images 
        $this->dispatch(new AssociateMedia($category,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($request->urls));
        
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Category::destroy($id);
    }
}
