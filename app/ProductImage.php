<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function Product () {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    static public function getProductImageByProductID($id) {
        return self::where('product_id', $id)->first()->image;
    }
}


