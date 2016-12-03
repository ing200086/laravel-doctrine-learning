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

    /**
     * @test
     */
    public function create_bug_and_set_user_as_reporter()
    {
        $reporter = new \App\Entities\User();
        $reporter->setName("John Doe");

        $bug = $this->persistNewBug("SomethingHappened");
        $bug->setReporter($reporter);

        $this->entityManager->persist($reporter);
        $this->entityManager->persist($bug);
        $this->entityManager->flush();
    }

    /**
     * @test
     */
    public function create_bug_and_set_user_as_engineer()
    {
        $engineer = new \App\Entities\User();
        $engineer->setName("Engineering Jim");

        $bug = $this->persistNewBug("SomethingHappened");
        $bug->setEngineer($engineer);

        $this->entityManager->persist($engineer);
        $this->entityManager->persist($bug);
        $this->entityManager->flush();
    }

    protected function persistNewBug($description)
    {
        $Bug = new Bug();
        $Bug->setDescription($description);

        $this->entityManager->persist($Bug);
        $this->entityManager->flush();

        return $Bug;
    }
}
