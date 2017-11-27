<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;

use Storage;
use File;

class UploadToStorage extends Job 
{
    use SerializesModels;

    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file_name = $this->clean($this->file->getClientOriginalName());
        Storage::put('temp/'.$file_name, File::get($this->file->getRealPath()));
		return $file_name;
    }
	
	public function clean($string) {
	   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	   return preg_replace('/[^A-Za-z0-9.\-]/', '', $string); // Removes special chars.
	}
}
