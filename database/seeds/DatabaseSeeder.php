<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $tables = [
		'products'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->fullTruncate();
       $this->call(ProductTableSeeder::class);
    }

    protected function fullTruncate()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
