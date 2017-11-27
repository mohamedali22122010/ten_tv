<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
	
//         $this->call(CountriesSeeder::class);
//         $this->call(RolesTableSeeder::class);
//         $this->call(UsersTableSeeder::class);
         $this->call(PermissionTableSeeder::class);
		 
		 DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	
    }
}
