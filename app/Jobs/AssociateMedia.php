<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;


class AssociateMedia extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $urls;
    public $collection;
    public $model;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model,$urls,$collection)
    {
        $this->model=$model;
        $this->urls=$urls;
        $this->collection=$collection;

    }
	
	private function MultiImageModel(){
		return [
			'App\Slider',
		];
	}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        if($this->urls)
        {
            if(!in_array(get_class($this->model),$this->MultiImageModel()))
            {
                $this->model->clearMediaCollection('images');
            }
            foreach($this->urls as $url)
            {
                $this->model->addMediaFromUrl($url)->toCollection($this->collection);
            }
        }
		if($request->main_image){
			$allMedia = $this->model->getMedia();
			foreach ($allMedia as $mediaItem) {
				if($mediaItem->file_name == $request->main_image){
					$mediaItem->custom_properties = ['main-image'=>'true'];//getCustomProperty('main-image', r);
					$mediaItem->save();
				}else{
					if($mediaItem->hasCustomProperty('main-image')){
						$mediaItem->custom_properties = ['not-main-image'=>'true'];//getCustomProperty('main-image', r);
						$mediaItem->save();
					}
				}
				
			}
		}
    }
}
