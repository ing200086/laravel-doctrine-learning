<?php
namespace App\Transformers;

use League\Fractal;

use App\Entities\Bug;

class BugTransformer extends Fractal\TransformerAbstract
{
	public function transform(Bug $bug)
	{
	    return [
	        'id'      => (int) $bug->getId(),
	        'title'   => $bug->getDescription()
	    ];
	}
}