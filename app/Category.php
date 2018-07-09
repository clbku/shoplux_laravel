<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    public function Product () {
        return $this->hasMany('App\Product', 'cate_id', 'id');
    }

    public function productImage() {
        return $this->hasManyThrough('App\ProductImage', 'App\Product', 'cate_id', 'product_id', 'id');
    }

    public function getCateList () {
        return self::select()
            ->selectSub('select count(id) from products where products.cate_id = categories.id' , 'count')
            ->where('status', 0)
            ->get();

    }

    public function getProductList ($id) {
        return DB::table('products')
            ->leftjoin('categories', 'categories.id', '=', 'products.cate_id')
            ->where('products.status', 0)
            ->where('cate_id', $id)
            ->get(['products.*', 'categories.name as cate_name']);


    }

    public function deletecate($id)
    {
        // xóa toàn bộ sản phẩm của cate
        // thay status của product thành 1
        $products = DB::table('products')->where('cate_id' , $id)->get();
        foreach ($products as $product) {
            $data = Product::find($product->id);
            $data->status = 1;
            $data->save();
        }
        // xóa cate
        // thay status của cate thành 1
        $type = self::find($id);
        $type->status = 1;
        $type->save();
        // đưa các cate con thành cate chính
        foreach (self::get() as $cate) {
            if ($cate->cate_parent == $id) {
                $subcate = self::find($cate->id);
                $subcate->cate_parent = null;
                $subcate->save();
            }
        }

    }

    public function findProduct ($request) {
        return self::select()
            ->selectSub('select count(id) from products where products.cate_id = categories.id' , 'count')
            ->where('status', 0)
            ->where('name', 'like', '%' . $request->keyword . '%')
            ->orWhere('shortDescription', 'like', '%' . $request->keyword . '%')
            ->get();
    }

    static public function getCategoryNameByID($id) {
        return self::where('id', $id)->first()->name;
    }

}
