<?php

namespace Tests\Acceptance\Api;

class UsersTest extends TestCase
{
    /**
     * @test
     */
    public function it_loads_all_users()
    {
        $this->getJson('api/v1/user');

        $this->assertResponseOk();
    }
}