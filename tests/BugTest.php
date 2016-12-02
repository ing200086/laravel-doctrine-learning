<?php

use App\Entities\Bug;

class BugTest extends DBTestCase
{
    /**
     * @test
     */
    public function set_and_retrieve_object()
    {
        $description = "There is something wrong.";

        $this->persistNewBug($description);

        $dbBug = $this->entityManager->find(Bug::class, 1);

        $this->assertEquals($description, $dbBug->getDescription());
        $this->assertEquals("open", $dbBug->getStatus());
    }

    /**
     * @test
     */
    public function set_and_retrieve_object_through_repository()
    {
        $description = "There is something wrong.";

        $this->persistNewBug($description);

        $dbBug = $this->entityManager->getRepository(Bug::class)->find(1);

        $this->assertEquals($description, $dbBug->getDescription());
        $this->assertEquals("open", $dbBug->getStatus());
    }

    /**
     * @test
     */
    public function set_and_change_object_in_db()
    {
        $description = "There is something wrong.";
        $newDescription = "I know what is wrong!";

        $this->persistNewBug($description);

        $dbBug = $this->entityManager->find(Bug::class, 1);

        $dbBug->setDescription($newDescription);
        $dbBug->closeBug();

        $this->assertEquals($newDescription, $dbBug->getDescription());
        $this->assertEquals("closed", $dbBug->getStatus());
    }

    protected function persistNewBug($description)
    {
        $Bug = new Bug();
        $Bug->setDescription($description);

        $this->entityManager->persist($Bug);
        $this->entityManager->flush();
    }
}
