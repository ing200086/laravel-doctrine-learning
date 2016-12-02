<?php

use App\Entities\Product;

class ProductTest extends DBTestCase
{
    /**
     * @test
     */
    public function set_and_retrieve_object()
    {
        $name = "Widget";

        $this->persistNewProduct($name);

        $dbProduct = $this->entityManager->find(Product::class, 1);

        $this->assertEquals($name, $dbProduct->getName());
    }

    /**
     * @test
     */
    public function set_and_change_object_in_db()
    {
        $name = "Widget";
        $newName = "Dongle";

        $this->persistNewProduct($name);

        $dbProduct = $this->entityManager->find(Product::class, 1);

        $dbProduct->setName($newName);

        $this->assertEquals($newName, $dbProduct->getName());
    }

    protected function persistNewProduct($name)
    {
        $product = new Product();
        $product->setName($name);

        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }
}
