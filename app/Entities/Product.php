<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as Doctrine;

/**
* Product class
*/
class Product
{
	protected $id;

	protected $name;

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
}