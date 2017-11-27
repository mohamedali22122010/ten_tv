<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::truncate();
		$role1 = new Role;
        $role1->name = "Admin";
        $role1->save();
		
		$role2 = new Role;
        $role2->name = "Sub Manager";
        $role2->save();
		
    }
}
