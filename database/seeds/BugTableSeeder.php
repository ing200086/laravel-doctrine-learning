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
        $faker = \Faker\Factory::create();
        $entityManager = app('Doctrine\ORM\EntityManagerInterface');
    	$userRepository = $entityManager->getRepository(\App\Entities\User::class);
    	$reporters = $userRepository->findAll();

        $bugs = entity(\App\Entities\Bug::class, 10)->create();

        foreach($bugs as $bug)
        {
            $bug->setReporter($faker->randomElement($reporters));

            $entityManager->persist($bug);
        }

        $entityManager->flush();
    }
}
