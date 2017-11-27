<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class User extends Authenticatable implements HasMediaConversions
{
    use HasSlug,EntrustUserTrait,Notifiable,HasMediaTrait;

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
    
	public function role()
	{
		return $this->belongsTo('App\Role');
	}

	public function roles()
	{
		return $this->belongsTo('App\Role');
	}

	public static function boot()
    {
        parent::boot();
    }
		
	/**
     * Check if user has a permission by its name.
     *
     * @param string|array $permission Permission string or array of permissions.
     * @param bool         $requireAll All permissions in the array are required.
     *
     * @return bool
     */
    public function can($permission, $requireAll = false)
    {
        if (is_array($permission)) {
            foreach ($permission as $permName) {
                $hasPerm = $this->can($permName);

                if ($hasPerm && !$requireAll) {
                    return true;
                } elseif (!$hasPerm && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the perms were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the perms were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
                // Validate against the Permission table
            foreach ($this->role->cachedPermissions() as $perm) {
                if (str_is( $permission, $perm->name) ) {
                    return true;
                }
            }
        }

        return false;
    }

}
