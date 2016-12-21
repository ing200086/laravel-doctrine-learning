<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

use App\EntityContracts as Contract;

/**
 */
class User implements Contract\UserInterface
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

	/**
	 */
	protected $email;

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

	public function reporterOfBug(Contract\BugInterface $bug)
	{
		$this->reportedBugs[] = $bug;
	}

	public function assignedToBug(Contract\BugInterface $bug)
	{
		$this->assignedBugs[] = $bug;
	}

	public function getBugs()
	{
		return $this->reportedBugs;
	}
}