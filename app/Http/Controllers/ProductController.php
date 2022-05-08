<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Response;
use App\Traits\ValidationEngine;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Response, ValidationEngine;




    private $product_validation_rules = [
        'name' => ['required'],
        'description' => ['required'],
        'price' => ['required'],
        'image' => ['required', 'mimes:jpeg,png,bmp'],
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
        
        $this->validator($request->all(),$this->product_validation_rules)->validate();

    }

    
    

}
