<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Page extends Model implements HasMediaConversions
{
    use HasTranslations,HasMediaTrait,HasSlug;
	
	public $translatable = ['title','description','meta_tag_title', 'meta_tag_description', 'meta_tag_keywords',];
	
	protected $table = 'pages';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'meta_tag_title', 
        'meta_tag_description',
        'meta_tag_keywords',
	];
	
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
             ->setManipulations(['w' => 368, 'h' => 232])
             ->performOnCollections('images');

        $this->addMediaConversion('big')
             ->setManipulations(['w' => 720, 'h' => 464])
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
