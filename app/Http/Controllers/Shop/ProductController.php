<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getProductListByCateId($id) {
        $products = Product::getProductByCateId($id);
        $name = Category::find($id)->name;
        return view('pages.product', compact('products', 'name'));
    }
    public function getProductList($id) {
        return view('pages.product');
    }
    public function getProductDetail($id) {
        $detail = Product::find($id);
        $sameType = Product::getProductByCateId($detail->cate_id, 3);
        return view('pages.detail', compact('detail', 'sameType'));
    }
    public function getFindProduct(Request $request) {
        return view('pages.order-success');
    }
}
