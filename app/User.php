<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class User extends Authenticatable implements HasMediaConversions
{
    use HasSlug,Notifiable,HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role_id', 'about', 'ordering', 'social_media', 'confirmed', 'confirmation_code', 'specification'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
    public static $rules =[
                            'name' => 'required|max:255',
                            'email' => 'required|email|max:255|unique:users',
                            'password' => 'required|min:6|confirmed',
                        ];
						
	protected $casts = [
        'social_media' => 'array',
    ];
	
	public $staticRoles = [
        1=> "admin" ,
        2=> "disk" ,
        3=> "doctor" , 
        4=> "hospital" , 
        5=> "company" , 
        6=> "regular"
	];
	
	    /*
     * Add Images sizes and filters here
     */
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 368, 'h' => 232])
             ->performOnCollections('images');

    }
	
	
	public function articles()
    {
         return $this->hasMany(Article::class,'user_id');
    }
	
	public function books()
    {
         return $this->hasMany(LiberaryBooks::class,'user_id');
    }
	
	public function reviews_to_him()
    {
         return $this->hasMany(Review::class,'user_id');
    }
	
	public function reviews_from_him()
    {
         return $this->hasMany(Review::class,'reviewer_id');
    }
	/*
	public function hospitalsOfThisCompany()
    {
         return $this->hasMany(CompanyHospitals::class,'hospital_id')->where('company_id',$this->id);
    }
	
	public function companiesOfThisHospital()
    {
         return $this->hasMany(CompanyHospitals::class,'company_id')->where('hospital_id',$this->id);
    }
	
	public function hospitalsOfThisDoctor()
    {
         return $this->hasMany(HospitalDoctors::class,'hospital_id')->where('doctor_id',$this->id);
    }
	
	public function doctorsOfThisHospital()
    {
         return $this->hasMany(HospitalDoctors::class,'doctor_id')->where('hospital_id',$this->id);
    }
	
	public function sectionsOfThisHospital()
    {
         return $this->hasMany(HospitalSections::class,'section_id')->where('hospital_id',$this->id);
    }*/
	
	/***************************************/
	
	public function hospitalsOfCompany()
    {
        return $this->belongsToMany(User::class,'company_hospitals','company_id','hospital_id');
    }

	public function companiesOfHospital()
	{
        return $this->belongsToMany(User::class,'company_hospitals','hospital_id','company_id');
	}
	
	public function doctorsOfHospital()
    {
        return $this->belongsToMany(User::class,'hospital_doctors','hospital_id','doctor_id');
    }
	
	public function hospitalsOfDoctors()
    {
        return $this->belongsToMany(User::class,'hospital_doctors','doctor_id','hospital_id');
    }
	
	/*public function sections()
    {
        return $this->belongsToMany(GeneralSections::class,'hospital_sections');
    }
	
	public function hospitalSections()
    {
         return $this->hasMany(HospitalSections::class,'hospital_id');
    }*/
	
	public function sectionsOfHospital()
	{
        return $this->belongsToMany(User::class,'hospital_sections','hospital_id','section_id');
	}
	
	public function hospitalsOfSection()
	{
        return $this->belongsToMany(User::class,'hospital_sections','section_id','hospital_id');
	}
	
	
	/*****************************************/
	
	public function scopeApproved($query)
	{
		return $query->where('status',1);
	}
	
	public function scopeConfirmed($query)
	{
		return $query->where('confirmed',1);
	}
	
	/**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
	
	public function scopeLikeCondition($query, $attribute , $value )
    {
    	$value = trim($value);
        return $query->where($attribute,"LIKE","%$value%");
    }

}
