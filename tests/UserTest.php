<?php

use App\Entities\User;

class UserTest extends DBTestCase
{
    /**
     * @test
     */
    public function set_and_retrieve_object()
    {
        $name = "John Doe";

        $this->persistNewUser($name);

        $dbUser = $this->entityManager->find(User::class, 1);

        $this->assertEquals($name, $dbUser->getName());
    }

    /**
     * @test
     */
    public function set_and_change_object_in_db()
    {
        $name = "John Doe";
        $newName = "Joe Black";

        $this->persistNewUser($name);

        $dbUser = $this->entityManager->find(User::class, 1);

        $dbUser->setName($newName);

        $this->assertEquals($newName, $dbUser->getName());
    }

    protected function persistNewUser($name)
    {
        $User = new User();
        $User->setName($name);

        $this->entityManager->persist($User);
        $this->entityManager->flush();
    }
}
