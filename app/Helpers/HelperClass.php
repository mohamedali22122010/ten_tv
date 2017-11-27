<?php
namespace App\Helpers;

use Image;
use Storage;
use File;

class HelperClass 
{

	public static function SetIconFromImage($image,$width=70,$height=70)
	{
		$icon = $image;
        $filename  = 'icons/'.time() . '.' . $icon->getClientOriginalExtension();
		$disk = config('filesystems.default');
		Storage::put($filename,File::get($icon->getRealPath()));
		$image = Image::make($icon->getRealPath())->resize($width,$height)->save(config("filesystems.disks.public.root")."/".$filename);
		if($disk == 's3'){
			Storage::put($filename,$image->__toString());
			Storage::disk('public')->delete($filename);
		}
		return $filename;
	}
	
}
