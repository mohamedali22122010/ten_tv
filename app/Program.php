<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Program extends Model implements HasMediaConversions
{
	use HasTranslations,HasMediaTrait,HasSlug;
	
    protected $fillable = ['title', 'about_announcer', 'description', 'show_text', 'repeate_text', 'show_time', 'repeate_time','facebook_link','twitter_link','instagram_link', 'youtube_link'];
	
	public $translatable = ['title', 'about_announcer', 'description', 'show_text', 'repeate_text'];
	
	protected $table = 'programs';
				
	public function scopeApproved($query)
	{
		return $query->where('status',1);
	}
     /*
     * Add Images sizes and filters here
     */
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 70, 'h' => 70 ])
             ->performOnCollections('images');

        $this->addMediaConversion('meduim')
             ->setManipulations(['h' => 230  ,'fit'=>'contain'])
             ->performOnCollections('images');

        $this->addMediaConversion('large')
             ->setManipulations(['w' => 370 ,'fit'=>'fill'])
             ->performOnCollections('images');

         
    }
	
	/**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
