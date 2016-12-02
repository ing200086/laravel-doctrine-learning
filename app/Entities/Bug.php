<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\ORM\Mapping as Doctrine;

/**
* Bug class to describe the issues with a product or service and disposition
* @Doctrine\Entity
* @Doctrine\Table(name="bugs")
*/
class Bug
{
	/**
	 * Bug Identifier in the database
	 * @Doctrine\Id
	 * @Doctrine\Column(type="integer")
	 * @Doctrine\GeneratedValue
	 */
	protected $id;

	/**
	 * Text description of bug issue
	 * @Doctrine\Column(type="string")
	 */
	protected $description;

	/**
	 * Status of the bug to describe the open/closed status
	 * @Doctrine\Column(type="boolean")
	 */
	protected $status = 0;

	protected $products = null;

	public function __construct()
	{
		$this->products = new ArrayCollection();
	}

	public function getId()
	{
		return $this->id;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getStatus()
	{
		return $this->status ? "closed" : "open";
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function closeBug()
	{
		$this->status = 1;
	}
}