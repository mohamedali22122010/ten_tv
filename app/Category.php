<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Category extends Model implements HasMediaConversions
{
    use HasTranslations,HasMediaTrait,HasSlug;
	
    protected $fillable = ['title', 'description', 'meta_tag_title', 'meta_tag_description', 'meta_tag_keywords'];
    
    public $translatable = ['title', 'description', 'meta_tag_title', 'meta_tag_description', 'meta_tag_keywords'];
	
	protected $table = 'categories';
	
	public function articles()
    {
         return $this->hasMany(Article::class,'category_id');
    }
	
	public function scopeApproved($query)
	{
		return $query->where('status',1);
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

         /*
     * Add Images sizes and filters here
     */
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 70, 'h' => 70 ])
             ->performOnCollections('images');         
    }

	
}
