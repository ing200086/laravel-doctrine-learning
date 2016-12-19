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
        $this->seedDb();

        $dbProduct = $this->entityManager->getRepository(Product::class)->find(1);

        $this->assertEquals("The Book of Time", $dbProduct->getName());
    }

    /**
     * @test
     */
    public function set_and_change_object_in_db()
    {
        $this->seedDb();

        $products = $this->entityManager->getRepository(Product::class)->customFindAll();

        $this->assertNotEmpty($products);
    }
}
