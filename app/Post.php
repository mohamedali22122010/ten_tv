<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Post extends Model implements HasMediaConversions
{
    use HasTranslations,HasMediaTrait,HasSlug;
	
    protected $fillable = ['title', 'description', 'content', 'meta_tag_title', 'meta_tag_description', 'meta_tag_keywords', 'category_id' ,'type' ,'link' ];
	
	public $translatable = ['title', 'description', 'content', 'meta_tag_title', 'meta_tag_description', 'meta_tag_keywords'];
	
	protected $table = 'posts';
	
    public $appends = ['image'];

	
	public function creator()
    {
         return $this->belongsTo(User::class,'user_id');
    }
	
	public function getTypesAttribute()
	{
		return [
			1 => 'Text',
			2 => 'Video',
			3 => 'Audio',
		];
	}
	
	public function getImageAttribute()
    {
        return $this->getMedia('images')->first()?$this->getMedia('images')->first()->getUrl():'';
    }
    
	public function category()
    {
         return $this->belongsTo(Category::class,'category_id');
    }
	
	public function scopeApproved($query)
	{
		return $query->where('status',1);
	}
	
	public function scopeLightSelection($query)
    {
        return $query->select('id', 'link','title', 'slug', 'type', 'description' , 'home_page_right', 'home_page_left' ,'home_page_soon');
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
