<?php
namespace App\Helpers;

use Spatie\MediaLibrary\UrlGenerator\BaseUrlGenerator;
use AWS;

class CustomUrlGenerator extends BaseUrlGenerator
{

    /**
     * Get the url for the profile of a media item.
     *
     * @return string
     */
    public function getUrl() : string
    {
    	if($this->media->disk == 's3'){
    		$s3 = AWS::createClient('S3');
	       $cmd = $s3->getCommand('GetObject', [
	           'Bucket' => env('AWS_S3_BUCKET'),
	           'Key'    => $this->getPathRelativeToRoot(),
	       ]);
	       $request =  $s3->createPresignedRequest($cmd, '+30 minutes');
	       return  $request->getUri();
    	}else{
    		return asset('storage/'.$this->getPathRelativeToRoot());
    	}
    }
	
	public static function getIconUrl($icon) : string
	{
		if(config('filesystems.default') == 's3'){
			$s3 = AWS::createClient('S3');
	       $cmd = $s3->getCommand('GetObject', [
	           'Bucket' => env('AWS_S3_BUCKET'),
	           'Key'    => $icon,
	       ]);
	       $request =  $s3->createPresignedRequest($cmd, '+30 minutes');
	       return  $request->getUri();
		}else{
			return asset('storage/'.$icon);
		}
	}
}
