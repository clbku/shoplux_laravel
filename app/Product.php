<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';

    public function Category () {
        return $this->hasMany('App\Category', 'cate_id', 'id');
    }
    public function ProductImages () {
        return $this->hasMany('App\ProductImage', 'product_id', 'id');
    }

    public function getProduct () {
        return self::leftjoin('categories', 'categories.id', '=', 'products.cate_id')
            ->where('products.status', 0)->get(['products.*', 'categories.name as cate_name']);
    }

    public function findProduct ($request) {
        return self::leftjoin('categories', 'categories.id', '=', 'products.cate_id')
            ->where('products.status', 0)
            ->where('products.name', 'like', '%' . $request->keyword . '%')
            ->orWhere('description', 'like', '%' . $request->keyword . '%')
            ->orWhere('technical', 'like', '%' . $request->keyword . '%')
            ->orWhere('unit_price', 'like', '%' . $request->keyword . '%')
            ->orWhere('promotion_price',  'like', '%' . $request->keyword . '%')
            ->get(['products.*', 'categories.name as cate_name']);
    }

    static public function getNewProduct () {
        return self::leftjoin('product_images', 'product_id', '=', 'products.id')
            ->orderBy('products.updated_at', 'desc')
            ->groupBy('product_id')
            ->where('products.updated_at', '>', time()-7*86400)
            ->paginate(8);

    }

    static public function getProductByCateId($id, $paginate = 16) {
        return self::leftjoin('product_images', 'product_id', '=', 'products.id')
            ->orderBy('products.updated_at', 'desc')
            ->groupBy('product_id')
            ->where('products.cate_id', '=', $id)
            ->paginate($paginate);
    }

}
