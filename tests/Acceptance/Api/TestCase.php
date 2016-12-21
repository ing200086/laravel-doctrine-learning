<?php

namespace Tests\Acceptance\Api;

/**
* This class was made to extend the TestCase and proved a structure to ensure
* the database is created with the correct schema and seeded values.
*/
class TestCase extends \Tests\TestCase
{
	protected $entityManager;

    public function setUp() {
    	parent::setUp();

        $this->buildSchema();
        
    }
}