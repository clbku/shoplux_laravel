<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProductList() {
        $products = $this->product->getProduct();
        return view('admin.product.list', compact('products'));
    }

    public function getAddProduct() {
        return view('admin.product.add');
    }

    public function postAddProduct(Request $request) {
        $product = new Product();
        $product->name = $request->name;
        $product->cate_id = $request->type;
        $product->description = $request->description;
        $product->shortDescription = $request->shortDescription;
        $product->technical = $request->detail;
        $product->unit_price = $request->unitPrice;
        $product->promotion_price = $request->promotionPrice ?? $product->unit_price;
        $product->unit = $request->unit;
        $product->save();
        $img = new ProductImage();
        $image = $request->image;
        $img->product_id = Product::max('id');
        $img->image = $image->move('upload/product/', $image->getClientOriginalName());
        $img->save();
        return redirect()->route('admin.product.list')->with('success', 'Thêm sản phẩm mới thành công');
    }

    public function getEditProduct($id) {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }
    public function postEditProduct($id, Request $request) {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->cate_id = $request->type;
        $product->description = $request->description;
        $product->shortDescription = $request->shortDescription ?? "sản phẩm chất lượng cao";
        $product->technical = $request->detail;
        $product->unit_price = $request->unitPrice;
        $product->promotion_price = $request->promotionPrice ?? $product->unit_price;
        $product->unit = $request->unit;
        $product->save();

        if ($request->image) {
            $img = new ProductImage();
            $image = $request->image;
            $img->product_id = $id;
            $img->image = $image->move('upload/product/', $image->getClientOriginalName());
            $img->save();
        }

        return redirect()->route('admin.product.list')->with('success', 'Sửa sản phẩm thành công');
    }
    public function getDeleteProduct($id) {
        $product = Product::find($id);
        if (file_exists($product->image)) unlink($product->image);
        $product->status = 1;
        $product->save();
        return redirect()->route('admin.product.list')->with('success', 'Xoá sản phẩm thành công');
    }
    public function postFindProduct(Request $request) {
        $products = $this->product->findProduct($request);
        return view('admin.product.list', compact('products'));
    }
}
