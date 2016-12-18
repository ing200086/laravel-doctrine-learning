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
        
        $this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BugTableSeeder::class);
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
