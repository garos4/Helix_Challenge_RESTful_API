<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\ImageOperations;
use App\Traits\Response;
use App\Traits\ValidationEngine;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Response, ValidationEngine, ImageOperations;




    
    private $validation_rules = [
        'create' => [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'mimes:jpeg,png,bmp'],
        ],
        'update' => [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['mimes:jpeg,png,bmp'],
        ]
    ];


    /**
     *  list of all products
     *
     * 
     */
    public function index()
    {
        try {
            $products = Product::all();

            return $this->successResponse($products);
        } catch (Exception $error) {
            return $this->errorResponse($error->getMessage());
        }
    }


    public function show($id)
    {
        if (!$data = Product::find($id)) {
            return $this->notFoundResponse();
        }

        return $this->successResponse($data);
    }


    //delete product
    public function destroy($id)
    {

        if (!$data = Product::find($id)) {
            return $this->notFoundResponse();
        }

        $data->delete();

        return $this->deleteResponse('Product deleted');
    }


    //create a new product
    public function store(Request $request)
    {
        $validation = $this->validator($request->all(), $this->validation_rules['create']);

        if ($validation->fails()) {
            return $this->errorResponse(['errors' => $validation->errors()->all()], 422);
        }

        $upload_image = $this->uploadImage($request);

        if ($upload_image['status'] == 'error') {
            return $this->errorResponse($upload_image['errorMessage'], 200);
        }


        $image_link = $upload_image['data'];

        try {
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->image_link = $image_link;
            $product->save();

            return $this->successResponse($product);
        } catch (Exception $error) {
            return $this->errorResponse($error->getMessage(), 200);
        }
    }


    //update a new product
    public function update(Request $request, $id)
    {
        $validation= $this->validator($request->all(), $this->validation_rules['update']);

        if ($validation->fails()) {
            return $this->errorResponse(['errors' => $validation->errors()->all()], 422);
        }


        try {

            if (!$product = Product::find($id)) {
                return $this->notFoundResponse();
            }

            if ($request->hasFile('image')) {

                $this->removeImage(($product->image_link));

                $upload_image = $this->uploadImage($request);

                if ($upload_image['status'] == 'error') {
                    return $this->errorResponse($upload_image['errorMessage']);
                }

                $image_link = $upload_image['data'];
                
                $product->image_link = $image_link;

            }

            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->save();

            return $this->successResponse($product);
        } catch (Exception $error) {
            return $this->errorResponse($error->getMessage(), 200);
        }
    }

}
