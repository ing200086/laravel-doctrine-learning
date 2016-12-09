<?php

use Illuminate\Database\Seeder;

class BugTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entityManager = app('Doctrine\ORM\EntityManagerInterface');
    	$users = $entityManager->getRepository(\App\Entities\User::class)->findAll();
        entity(\App\Entities\Bug::class, 1)->create([
                'users' => [$users[0]],
                'description' => "Time has stopped!"
            ]);
        entity(\App\Entities\Bug::class, 10)->create([
                'users' => $users
            ]);
    }
}
