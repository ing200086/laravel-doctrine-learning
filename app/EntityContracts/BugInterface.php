<?php

namespace App\EntityContracts;

interface BugInterface {
	public function getId();

	public function setDescription($description);
	public function getDescription();

	public function closeBug();
	public function getStatus();

	public function setEngineer(UserInterface $engineer);
	public function getEngineer();

	public function setReporter(UserInterface $reporter);
	public function getReporter();
}