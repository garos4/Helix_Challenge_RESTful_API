<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Response;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Response;

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

}
