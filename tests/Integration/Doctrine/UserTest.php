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
        $user = $this->seedUser("Dan");
        $bug = $this->seedBug("Damn Ants", $user, $user);

        $dbUser = $this->entityManager->find(User::class, 1);

        $this->assertEquals("Dan", $dbUser->getName());

        $dbBug = $dbUser->getBugs();

        $this->assertEquals('Damn Ants', $dbBug[0]->getDescription());
    }

    /**
     * @test
     */
    public function no_entity_manager_testing_of_object()
    {
        $user = $this->seedUser("Dan");
        $bug = $this->seedBug("Damn Ants", $user, $user);

        $dbBugs = $this->entityManager->find(User::class, 1)->getBugs();
    }

    protected function seedUser($name)
    {
        $user = new User($name);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    protected function seedBug($description, $reporter, $engineer)
    {
        $bug = new \App\Entities\Bug();
        $bug->setDescription($description);
        $bug->setReporter($reporter)->setEngineer($engineer);

        $this->entityManager->persist($bug);
        $this->entityManager->flush();
    }
}
