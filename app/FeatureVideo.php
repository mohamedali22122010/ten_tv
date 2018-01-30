<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FeatureVideo extends Model
{
    use HasTranslations;
    
    protected $fillable = ['title', 'link', 'program_id'];
	
	public $translatable = ['title'];
	
	protected $table = 'feature_videos';
		
	
	public function program()
    {
         return $this->belongsTo(Program::class,'program_id');
    }
	
	public function videoType($url) 
	{
        if (strpos($url, 'youtube') !== false ) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') !== false) {
            return 'vimeo';
        } else {
            return 'unknown';
        }
    }
	
	public function getYoutubeVedioIdFromUrl($url)
    {
        if(self::videoType($url) == 'youtube')
        {
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            if(isset($my_array_of_vars['v']) && !empty($my_array_of_vars['v']))
            {
                return $my_array_of_vars['v']; // this is vedio id
            }
        }
        return false;
    }
}
