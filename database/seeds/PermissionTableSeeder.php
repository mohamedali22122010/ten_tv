<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\PermissionRole;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		$routeCollection = \Route::getRoutes();

		foreach ($routeCollection as $route) {
			if($route->getPrefix() == '/backend' && in_array('backend', $route->gatherMiddleware()) ){
				$permission = Permission::where('name',$route->getName())->first();
				if(!$permission 
//					&& !str_contains($route->getName(),'DataTable')
					&& !str_contains($route->getName(),'image') 
//					&& !str_contains($route->getName(),'editableMessage') 
//					&& !str_contains($route->getName(),'replies')
//					&& !str_contains($route->getName(),'addBulkReply') 
//					&& !str_contains($route->getName(),'openToReply') 
//					&& !str_contains($route->getName(),'userMessages') 
					){
					Permission::create([
						'name' => $route->getName(),
		        		'display_name' => $route->getName(),
		        		'description' => $route->getName()
					]);
				}
			}
		}
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
