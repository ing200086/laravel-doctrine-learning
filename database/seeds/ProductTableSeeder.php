<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($times = 10)
    {
    	entity(\App\Entities\Product::class, 1)->create([
    		'name' => 'The Book of Time'
    		]);
    	
        entity(\App\Entities\Product::class, $times-1)->create();
    }
}
