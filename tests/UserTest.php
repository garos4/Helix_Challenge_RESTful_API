<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_authenticate_user()
    {
        $formData=[
            'email'=>'kristoffer@helixsleep.com',
            'password'=>'letmein'
        ];

        $response= $this->post('/api/authenticate',$formData);

        $response->assertResponseStatus(200);
    }
}
