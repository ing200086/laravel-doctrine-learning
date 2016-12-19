<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\ORM\Mapping as Doctrine;

/**
* Bug class to describe the issues with a product or service and disposition
*/
class Bug
{
	/**
	 * Bug Identifier in the database
	 */
	protected $id;

	/**
	 * Text description of bug issue
	 */
	protected $description;

	/**
	 * Status of the bug to describe the open/closed status
	 */
	protected $status = 0;

	/**
	 * The engineer tasked with fixing the bug
	 */
	protected $engineer = null;

	/**
	 * The user that reported the bug.
	 */
	protected $reporter = null;

	/**
	 * Products that the bug is associate with.
	 */
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

	public function getEngineer()
	{
		return $this->engineer;
	}

	public function getReporter()
	{
		return $this->reporter;
	}

	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	public function closeBug()
	{
		$this->status = 1;

		return $this;
	}

	public function setEngineer(User $engineer)
	{
		$engineer->assignedToBug($this);
		$this->engineer = $engineer;

		return $this;
	}

	public function setReporter(User $reporter)
	{
		$reporter->reporterOfBug($this);
		$this->reporter = $reporter;

		return $this;
	}
}