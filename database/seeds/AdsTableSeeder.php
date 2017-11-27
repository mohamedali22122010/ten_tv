<?php

use Illuminate\Database\Seeder;
use App\Advertise;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertise::truncate();
		factory(App\Advertise::class,10)->create();
		
    }
}
