<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as Doctrine;

/**
 * @Doctrine\Entity
 * @Doctrine\Table(name="users")
 */
class User 
{
	/**
	 * @Doctrine\Id
	 * @Doctrine\Column(type="integer", name="id")
	 * @Doctrine\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id = null;

	/**
	 * @Doctrine\Column(type="string")
	 */
	protected $name = null;

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