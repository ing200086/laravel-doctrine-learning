<?php

namespace App\Entities\Embeddables;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use App\EntityContracts as Contract;

/**
* Bug class to describe the issues with a product or service and disposition
*/
class Email
{
	/**
	 * @string
	 */
	protected $address;

	public function __construct(string $address)
	{
		 if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("Given email [$address] is not valid.");
        }

        $this->address = $address;
    }

    public function getAddress(): string
    {
        return $this->address; 
    }

	
}