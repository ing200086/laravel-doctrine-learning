<?php

namespace Tests\Integration\Doctrine;

use App\Entities\User;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function set_and_retrieve_object()
    {
        $this->seedDb();

        $dbUser = $this->entityManager->find(User::class, 1);

        $this->assertEquals("George Orwell", $dbUser->getName());

        $dbBug = $dbUser->getBugs();
    }

    /**
     * @test
     */
    public function no_entity_manager_testing_of_object()
    {
        $this->seed_the_dan();

        $dbBugs = $this->entityManager->find(User::class, 1)->getBugs();
    }

    protected function seed_the_dan()
    {
        $user = new User();
        $user->setName("Dan");

        $bug = new \App\Entities\Bug();
        $bug->setDescription("Damn Ants.");
        $bug->setReporter($user)->setEngineer($user);


        $this->entityManager->persist($user);
        $this->entityManager->persist($bug);

        $this->entityManager->flush();
    }



}
