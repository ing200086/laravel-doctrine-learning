<?php

namespace App\EntityContracts;

interface UserInterface {
	public function getId();

	public function getName();
	public function setName($name);

	public function reporterOfBug(BugInterface $bug);
	public function assignedToBug(BugInterface $bug);

	public function getBugs();
}