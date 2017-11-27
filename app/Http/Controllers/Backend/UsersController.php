<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Auth;
use App\User;
use App\Jobs\AssociateMedia;
use App\Jobs\RmoveMedia;
use App\Jobs\RmoveTemp;

class UsersController extends Controller
{
	
	public function __construct()
	{
        $this->middleware(function ($request, $next) {
        	$route = $request->route()->getName();
			if(($route == 'profile.edit' || $route == 'profile.update') ){ // this mean this user is hospital and can just create section and not approved
				return $next($request);
			}elseif(auth()->user()->role_id != 1){
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
    public function index(Request $request)
    {
        $users=User::Where('role_id',$request->role_id)->orderBy('id','desc');
		$users = $users->paginate(10);

		$users->appends($request->all());
		
        return view('backend.users.index',compact('users'));
    }
	
	public function getProfile()
	{
		$profile = User::findOrFail(auth()->user()->id);
		$doctorsArray = $hospitalsArray = $hospitalsIDs = $doctorsIDs = $companiesArray = $companiesIDs = [];
		if($profile->role_id == 4) // this mean this is a profile of hospital
		{
			$doctorsArray = User::approved()->confirmed()->where('role_id','=',3)->get()->pluck('name','id')->sort()->toArray();
			if($profile->doctorsOfHospital){
				foreach($profile->doctorsOfHospital as $doctor)
		        {
		            $doctorsIDs[]=$doctor->id;
		        }
			}
			$companiesArray = User::approved()->confirmed()->where('role_id','=',5)->get()->pluck('name','id')->sort()->toArray();
			if($profile->companiesOfHospital){
				foreach($profile->companiesOfHospital as $company)
		        {
		            $companiesIDs[]=$company->id;
		        }
			}
		}else // this mean this is a profile of company or doctor
		{
			$hospitalsArray = User::approved()->confirmed()->where('role_id','=',4)->get()->pluck('name','id')->sort()->toArray();
			if($profile->role_id == 3) // this mean this is a profile of doctor
			{
				if($profile->hospitalsOfDoctors){
					foreach($profile->hospitalsOfDoctors as $hospital)
			        {
			            $hospitalsIDs[]=$hospital->id;
			        }
				}
			}
			if($profile->role_id == 5) // this mean this is a profile of Company
			{
				if($profile->hospitalsOfCompany){
					foreach($profile->hospitalsOfCompany as $hospital)
			        {
			            $hospitalsIDs[]=$hospital->id;
			        }
				}
			}
		}	
		return view('backend.users.editProfile',compact('profile','hospitalsArray','doctorsArray','companiesArray','hospitalsIDs','doctorsIDs','companiesIDs'));
	}
	
	public function postProfile(Request $request)
	{
		$profile = User::findOrFail(auth()->user()->id);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.auth()->user()->id,
            'social_media.*'=>'url',
            'password' => 'min:6|confirmed',
        ]);
		$profile->fill($request->except('_token','password'));
		if($request->password){
			$profile->password = bcrypt($request->password);
		}
		$profile->save();
		if($profile->role_id == 3){
			$profile->hospitalsOfDoctors()->detach();
			if($request->hospitals){
				foreach($request->hospitals as $hospital)
		        {
		            $profile->hospitalsOfDoctors()->attach($hospital);
		        }
			}
		}
		if($profile->role_id == 4){
			$profile->doctorsOfHospital()->detach();
			if($request->doctors){
				foreach($request->doctors as $doctor)
		        {
		            $profile->doctorsOfHospital()->attach($doctor);
		        }
			}
			$profile->companiesOfHospital()->detach();
			if($request->companies){
				foreach($request->companies as $company)
		        {
		            $profile->companiesOfHospital()->attach($company);
		        }
			}
		}
		if($profile->role_id == 5){
			$profile->hospitalsOfCompany()->detach();
			if($request->hospitals){
				foreach($request->hospitals as $hospital)
		        {
		            $profile->hospitalsOfCompany()->attach($hospital);
		        }
			}
		}
		 // removed deleted images
        $this->dispatch(new RmoveMedia($profile,$request->removedImages,'images'));
        // add images 
        $this->dispatch(new AssociateMedia($profile,$request->urls,'images'));
        //remove temp files
        $this->dispatch(new RmoveTemp($request->urls));
       
		return redirect(route('profile.edit'))->with(['flash_message' => trans('backend.edited profile')]);

	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= new User;
        return view('backend.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->role_id=1;
		$user->confirmed = 1;
        $user->save();

        return redirect(route('users.index',['role_id'=>$request->role_id]));
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
        $user=User::find($id);
        return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // $request->request->add(['role_id'=>1]);
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();

        return redirect(route('users.index',['role_id'=>$user->role_id]));

    }
	
	public function active($id)
	{
		$user = User::Find($id);
		$user->status = 1;
		$user->save();
		
		$flash_message = trans('backend.User Actived Successfully');
		return redirect()->back()->with(['flash_message' => $flash_message]);		
				
	}
	
	public function disactive($id)
	{
		$user = User::Find($id);
		$user->status = 0;
		$user->save();
		
		$flash_message = trans('backend.User Disactived Successfully');
		return redirect()->back()->with(['flash_message' => $flash_message]);		
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}
