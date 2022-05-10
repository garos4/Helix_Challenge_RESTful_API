<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    
    public function attached_user(){
        return $this->hasMany('App\Models\UserProduct');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($product) { 
             $product->attached_user()->each(function($attached_user) {
                $attached_user->delete(); 
             });
        });
    }
}
