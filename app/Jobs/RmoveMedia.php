<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RmoveMedia extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    public $model;
    public $removedImages;
    public $collection;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model,$removedImages,$collection)
    {
        $this->model=$model;
        $this->removedImages=$removedImages;
        $this->collection=$collection;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->removedImages)
        {
            foreach($this->removedImages as $key)
            {
                if(array_key_exists($key,$this->model->getMedia($this->collection)->toArray()))
                {
                    $this->model->getMedia($this->collection)[$key]->delete();
                }
            }
        }
    }
}
