<?php

namespace App\ORM\Generators;

use Doctrine\ORM\Id\AbstractIdGenerator;

/**
* 
*/
class BugId extends AbstractIdGenerator
{
    static $counter = 0;

	public function generate(\Doctrine\ORM\EntityManager $em, $entity)
    {
        return self::$counter+=2;

    }
}