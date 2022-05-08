<?php

namespace App\Traits;
use Illuminate\Support\Facades\Validator;


trait ValidationEngine
{
    public function validator($input,$rule){
        return Validator::make($input, $rule);
    }
}
