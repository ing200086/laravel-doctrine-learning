<?php

namespace App\EntityContracts;

interface ProductInterface {
	public function getId();

	public function setName($name);
	public function getName();
}