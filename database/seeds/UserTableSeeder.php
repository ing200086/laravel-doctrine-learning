<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($times = 10)
    {
    	entity(\App\Entities\User::class, 1)->create([
    		'name' => 'George Orwell']);
        entity(\App\Entities\User::class, $times-1)->create();
    }
}
