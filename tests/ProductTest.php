<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\WithoutMiddleware;


class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function test_get_products()
    {

        $user = User::factory()->create();

        $headers = ['Accept' => 'application/json'];

        $token = $user->createToken('ChallengeApp')->accessToken;
        $headers['Authorization'] = 'Bearer ' . $token;

        $response=$this->json('get','/api/products', [], $headers);


        $response->assertResponseStatus(200);
    }

    public function test_get_products_by_id()
    {

        $user = User::factory()->create();

        $product = Product::factory()->create();

        $headers = ['Accept' => 'application/json'];

        $token = $user->createToken('ChallengeApp')->accessToken;
        $headers['Authorization'] = 'Bearer ' . $token;

        $response=$this->json('get','/api/products/'.$product->id, [], $headers);


        $response->assertResponseStatus(200);
    }

    
    public function test_update_products()
    {

        $user = User::factory()->create();

        $product = Product::factory()->create();

        $headers = ['Accept' => 'application/json'];

        $formData= [
            'name'=>'Iphone',
            'description'=>'Latest iphone',
            'price'=>'25',
        ];

        $token = $user->createToken('ChallengeApp')->accessToken;
        $headers['Authorization'] = 'Bearer ' . $token;

        $response=$this->json('put','/api/products/'.$product->id, $formData, $headers);


        $response->assertResponseStatus(200);
    }

    
    public function test_delete_products_by_id()
    {

        $user = User::factory()->create();

        $product = Product::factory()->create();

        $headers = ['Accept' => 'application/json'];

        $token = $user->createToken('ChallengeApp')->accessToken;
        $headers['Authorization'] = 'Bearer ' . $token;

        $response=$this->json('delete','/api/products/'.$product->id, [], $headers);

        $response->assertResponseStatus(200);
    }
}
