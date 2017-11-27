<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role_id'=> 1,
            'confirmed' => 1,
            'status' => 1,
            'password' => bcrypt('123456'),
        ]);
    }
}
