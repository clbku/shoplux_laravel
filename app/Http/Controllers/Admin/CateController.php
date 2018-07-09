<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    function __construct(Category $cate) {
        $this->cate = $cate;
    }

    public function getProductTypeList() {
        $categories = $this->cate->getCateList();
        return view('admin.category.list', compact( 'categories'));
    }

    public function getListProductByCateId($cateID) {
        $products = $this->cate->getProductList($cateID);
        return view('admin.product.list', compact('products'));
    }

    public function getDeleteCategory($id) {
        $this->cate->deletecate($id);
        return redirect()->route('admin.category.list')->with('success', 'Xóa thành công');
    }

    public function postFindCategories(Request $request) {
        $categories = $this->cate->findProduct($request);
        return view('admin.category.list', compact('categories'));
    }

    public function postEditCategory($id, Request $request) {
        $productType = Category::find($id);
        $productType->name = $request->name;
        $productType->shortDescription = $request->shortDescription;
        $productType->cate_parent = $request->cateParent ?? null;
        $productType->save();
        return redirect()->route('admin.category.list')->with('success', 'Sửa thành công');
    }

    public function postAddCategory(Request $request) {
        $productType = new Category();
        $productType->name = $request->name;
        $productType->shortDescription = $request->shortDescription;
        $productType->cate_parent = $request->cateParent ?? null;
        $productType->save();
        return redirect()->route('admin.category.list')->with('success', 'Thêm loại sản phẩm mới thành công');
    }
}
