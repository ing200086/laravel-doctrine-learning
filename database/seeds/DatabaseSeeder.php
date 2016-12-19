<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $tables = [
		'products',
        'bugs',
        'users'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fullTruncate($this->getDBDriver());
        
        $this->resolve(UserTableSeeder::class)->run();
        $this->resolve(ProductTableSeeder::class)->run();
        $this->resolve(BugTableSeeder::class)->run();
    }

    protected function fullTruncate($dbDriver)
    {
        if ($dbDriver == 'mysql') { 
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            foreach ($this->tables as $table) {
                DB::table($table)->truncate();
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }

    protected function getDBDriver()
    {
        return config('database.connections.' . config('database.default') . '.driver');
    }
}
