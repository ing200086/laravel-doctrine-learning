<?php

namespace Tests\Acceptance\Api;

class UsersTest extends TestCase
{
    /**
     * @test
     */
    public function it_gives_a_good_response_to_all_users_uri()
    {
        $this->seedDB();
        $this->getJson('api/v1/user');
        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function it_gets_all_reported_bugs_with_users()
    {
        $this->seedDB();
    	$this->getJson('api/v1/user');

    	$users = $this->response->getData('data')['data'];

    	$this->seeJsonStructure([
					'*' => [
						'name',
                        'bugs' => [
                            'id', 'title'
                        ]
					]
    			], $users);
    }
}