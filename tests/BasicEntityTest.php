<?php

use App\Entities\Product;

class BasicEntityTest extends DBTestCase
{
    /**
     * @test
     */
    public function Example()
    {
        $name = "Widget";

        $product = new Product();
        $product->setName($name);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $this->assertEquals($name, $product->getName());

        $dbProduct = $this->entityManager->find(Product::class, 1);

        $this->assertEquals($name, $dbProduct->getName());
    }
}
