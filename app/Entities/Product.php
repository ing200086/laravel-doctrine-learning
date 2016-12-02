<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as Doctrine;

/**
* Product class
* @Doctrine\Entity
* @Doctrine\Table(name="products")
*/
class Product
{
	/**
	 * @Doctrine\Id
	 * @Doctrine\Column(type="integer")
	 * @Doctrine\GeneratedValue
	 */
	protected $id;

	/**
	 * @Doctrine\Column(type="string")
	 */
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