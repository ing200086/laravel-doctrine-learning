<?php

namespace Tests\Integration\Doctrine;

use App\Entities\Product;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function set_and_retrieve_object()
    {
        // $this->seedDb();

        // $dbProduct = $this->entityManager->find(Product::class, 1);

        // $this->assertEquals("The Book of Time", $dbProduct->getName());
    }

    /**
     * @test
     */
    public function set_and_change_object_in_db()
    {
        // $name = "Widget";
        // $this->seedDb();

        // $dbProduct = $this->entityManager->find(Product::class, 1);

        // $dbProduct->setName($name);

        // $this->assertEquals($name, $dbProduct->getName());
    }
}
