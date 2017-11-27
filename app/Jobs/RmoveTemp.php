<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;

class RmoveTemp extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $urls;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($urls)
    {
        $this->urls = $urls;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->urls)
        { 
            foreach($this->urls as $url)
            {
                $path=parse_url($url,PHP_URL_PATH);
                $basename=pathinfo($path,PATHINFO_BASENAME);
                Storage::delete('temp/'.$basename);
            }
        }
    }
}
