<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
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

	/**
	 * @Doctrine\OneToMany(targetEntity="\App\Entities\Bug", mappedBy="engineer")
	 */
	protected $assignedBugs = null;

	/**
	 * @Doctrine\OneToMany(targetEntity="\App\Entities\Bug", mappedBy="reporter")
	 */
	protected $reportedBugs = null;

	public function __construct()
	{
		$this->reportedBugs = new ArrayCollection();
		$this->assignedBugs = new ArrayCollection();
	}

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

	public function reporterOfBug(Bug $bug)
	{
		$this->reportedBugs[] = $bug;
	}

	public function assignedToBug(Bug $bug)
	{
		$this->assignedBugs[] = $bug;
	}

	public function getBugs()
	{
		return $this->reportedBugs;
	}
}