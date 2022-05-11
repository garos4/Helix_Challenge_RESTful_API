<?php

use App\Traits\RefreshDatabaseForTesting;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     use RefreshDatabaseForTesting;

     
    public function test_authenticate_user()
    {
        $this->refresh_database_seed_passport_install();

        $formData=[
            'email'=>'kristoffer@helixsleep.com',
            'password'=>'letmein'
        ];

        $response= $this->post('/api/authenticate',$formData);

        $response->assertResponseStatus(200);
    }
}
