<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramTime extends Model
{
    protected $fillable = ['day', 'program_id', 'show_at' ];
	
	protected $table = 'program_times';
	
	public function getDaysAttribute()
	{
		return [
			0=>'SUNDAY',
			1=>'MONDAY',
			2=>'TUESDAY',
			3=>'WEDNESDAY',
			4=>'THURSDAY',
			5=>'FRIDAY',
			6=>'SATURDAY',
		];
	}
	
	public function getDayNameAttribute()
	{
		return $this->days[$this->day];	
	}
	
	public function program()
    {
         return $this->belongsTo(Program::class,'program_id');
    }
}
