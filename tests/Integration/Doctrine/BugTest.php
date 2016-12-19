<?php

namespace Tests\Integration\Doctrine;

use App\Entities\Bug;

class BugTest extends TestCase
{
    /**
     * @test
     */
    public function set_and_retrieve_object()
    {
        $this->seedDb();

        $dbBug = $this->entityManager->find(Bug::class, 1);

        $this->assertEquals("Time has stopped!", $dbBug->getDescription());
        $this->assertEquals("open", $dbBug->getStatus());

        $dbEngineer = $dbBug->getEngineer();

        $this->assertEquals("George Orwell", $dbEngineer->getName());

    }

    /**
     * @test
     */
    public function set_and_change_object_in_db()
    {
        $this->seedDb();

        $dbBug = $this->entityManager->find(Bug::class, 1);

        $dbBug->setDescription("All is good.");
        $dbBug->closeBug();

        $this->assertEquals("All is good.", $dbBug->getDescription());
        $this->assertEquals("closed", $dbBug->getStatus());
    }
}