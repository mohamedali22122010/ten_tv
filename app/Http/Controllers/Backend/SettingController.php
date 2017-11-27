<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //
	
	public function index()
	{
		 $setting = config('custom-setting');
		 return view('backend.setting.edit',['setting'=>$setting]);
	
	}
	
	public function update(Request $request)
	{
		 $inputs = $request->except('_token');
		 $data = var_export($inputs, 1);
         $title = "// generated at ".date("Y-m-d H:i:s");
		 $contents = File::put(config_path().'/custom-setting.php',"<?php\n $title \nreturn $data;");
		 $flash_message ="Setting updated successfully";
		 return back()->withInput();
	}
}
