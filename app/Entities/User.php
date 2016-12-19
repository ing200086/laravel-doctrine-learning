<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\ORM\Mapping as Doctrine;

/**
 */
class User 
{
	/**
	 */
	protected $id = null;

	/**
	 */
	protected $name = null;

	/**
	 */
	protected $assignedBugs = null;

	/**
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