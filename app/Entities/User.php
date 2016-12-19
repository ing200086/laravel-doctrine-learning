<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

use \App\EntityContracts\BugInterface;

/**
 */
class User implements \App\EntityContracts\UserInterface
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

	public function __construct($name)
	{
		$this->setName($name);
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

	public function reporterOfBug(BugInterface $bug)
	{
		$this->reportedBugs[] = $bug;
	}

	public function assignedToBug(BugInterface $bug)
	{
		$this->assignedBugs[] = $bug;
	}

	public function getBugs()
	{
		return $this->reportedBugs;
	}
}