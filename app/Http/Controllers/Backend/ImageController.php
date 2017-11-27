<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use File;
use Image;
use App\Jobs\UploadToStorage;


class ImageController extends Controller
{
    public function get($name)
    {
    	$image=Storage::get('temp/'.$name);
        $image=Image::make($image);
        return $image->response();
    }

    public function upload(Request $request)
    {
    	$file=$request->file('file');
        $file_name = $this->dispatch(new UploadToStorage($file));

        return ['error'=>false,'filename'=>$file_name];
    }

    public function remove($path)
    {
        Storage::delete($path);
    }
}
