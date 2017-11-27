<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;


class Slider extends Model implements HasMediaConversions
{
    use HasTranslations,HasMediaTrait;
	
	public $translatable = ['title','text'];
	
	protected $table = 'slider';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'title',
        'link',
        'text',
        'active',
    ];
	
	
    /*
     * Add Images sizes and filters here
     */
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 368, 'h' => 232])
             ->performOnCollections('images');

        $this->addMediaConversion('big')
             ->setManipulations(['w' => 1440, 'h' => 530,'fit'=>'contain'])
             ->performOnCollections('images');
    }

}
