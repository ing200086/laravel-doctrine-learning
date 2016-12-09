<?php

/**
* This class was made to extend the TestCase and proved a structure to ensure
* the database is created with the correct schema and seeded values.
*/
class DBTestCase extends TestCase
{
	protected $entityManager;

    public function setUp() {
    	parent::setUp();

        Artisan::call('doctrine:schema:create');
        $this->entityManager = app('Doctrine\ORM\EntityManagerInterface');
    }

    protected function seedDB()
    {
    	Artisan::call('db:seed');
    }
}