<?php
namespace App\Helpers;

use Spatie\MediaLibrary\UrlGenerator\BaseUrlGenerator;
use AWS;

class S3UrlGenerator extends BaseUrlGenerator
{

    /**
     * Get the url for the profile of a media item.
     *
     * @return string
     */
    public function getUrl() : string
    {
       $s3 = AWS::createClient('S3');
       $cmd = $s3->getCommand('GetObject', [
           'Bucket' => env('AWS_S3_BUCKET'),
           'Key'    => $this->getPathRelativeToRoot(),
       ]);
       $request =  $s3->createPresignedRequest($cmd, '+30 minutes');
       return  $request->getUri();;
    }
	
	public static function getIconUrl($icon) : string
	{
		$s3 = AWS::createClient('S3');
       $cmd = $s3->getCommand('GetObject', [
           'Bucket' => env('AWS_S3_BUCKET'),
           'Key'    => $icon,
       ]);
       $request =  $s3->createPresignedRequest($cmd, '+30 minutes');
       return  $request->getUri();;
	}
}
