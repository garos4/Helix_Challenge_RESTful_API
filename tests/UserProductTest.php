<?php

use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
use App\Traits\RefreshDatabaseForTesting;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use RefreshDatabaseForTesting;
    
    

    public function test_attach_user_to_product()
    {
        $this->refresh_database_seed_passport_install();

        $user = User::factory()->create();

        $product = Product::factory()->create();

        $headers = ['Accept' => 'application/json'];

        $token = $user->createToken('ChallengeApp')->accessToken;

        $headers['Authorization'] = 'Bearer ' . $token;

        $response=$this->json('get','/api/user/products/attach/'.$product->id, [], $headers);


        $response->assertResponseStatus(200);
    }

    
    public function test_remove_user_to_product()
    {
        $this->refresh_database_seed_passport_install();

        $user = User::factory()->create();

        $product = Product::factory()->create();

        $headers = ['Accept' => 'application/json'];

        $token = $user->createToken('ChallengeApp')->accessToken;

        $headers['Authorization'] = 'Bearer ' . $token;

        $insert_statement='insert into `user_products` (`product_id`, `user_id`) values ('.$product->id.', '.$user->id.')';
        
        DB::statement($insert_statement);

        $response=$this->json('get','/api/user/products/remove/'.$product->id, [], $headers);


        $response->assertResponseStatus(200);
    }

}
