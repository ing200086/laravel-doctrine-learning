<?php

namespace App\ORM\Repositories;

use Doctrine\ORM\EntityRepository;

use App\Entities\Product;

/**
* Repository around the product class.
*/
class ProductRepository extends EntityRepository
{
	public function customFindAll()
	{
		//Nothing really custom about it,.... just shows an example
		$builder = app('Doctrine\ORM\EntityManagerInterface')->createQueryBuilder();
		
		$builder->select('products')
					->from(Product::class, 'products');

		$result = $builder->getQuery()->getResult();

		return $result;
	}
}