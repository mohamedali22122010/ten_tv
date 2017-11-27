<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class Role extends EntrustRole
{
//	use LogsActivity;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
	
	protected static $logAttributes = [
    	'name',
    ];
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * many-to-many relationship method.
     *
     * @return QueryBuilder
     */
    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }
	
	// set time zone to saudi arabia
	public function getCreatedAtAttribute()
	{
		if(config('backend_timezone'))
		{
			return Carbon::parse($this->attributes['created_at'])->timezone('Asia/Riyadh');
		}
	}
	
	// set time zone to saudi arabia
	public function getUpdatedAtAttribute()
	{
		if(config('backend_timezone'))
		{
			return Carbon::parse($this->attributes['updated_at'])->timezone('Asia/Riyadh');
		}
	}
	
	public function getLogNameToUse(string $eventName = ''): string
    {
        return trans('backend.'.$eventName);
    }

	public function getDescriptionForEvent(string $eventName): string
    {
    	return trans('backend.event_desc',['user'=>@auth()->user()->name,'event'=>trans('backend.'.$eventName),'model'=>trans('backend.'.get_class($this))]);
    }

	
}