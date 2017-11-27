<?php
namespace App\Helpers;

use Spatie\MediaLibrary\UrlGenerator\BaseUrlGenerator;
use Storage;

class LocalUrlGenerator extends BaseUrlGenerator
{

    /**
     * Get the url for the profile of a media item.
     *
     * @return string
     */
    public function getUrl() : string
    {
       return asset('storage/'.$this->getPathRelativeToRoot());
    }
	
	public static function getIconUrl($icon) 
	{
		return asset('storage/'.$icon);
	}
}
