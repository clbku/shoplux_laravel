<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Product;
use App\ProductImage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function getCart() {
        $cart = Cart::content();
        return view('pages.shoppingCart', compact('cart'));
    }
    public  function getAddToCart($id) {
        $product = Product::find($id);
        Cart::add(array(
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->promotion_price,
            'options' => [
                'unit_price' => $product->unit_price,
                'image' => ProductImage::getProductImageByProductID($id),
                'unit' => $product->unit,
                'cate' => Category::getCategoryNameByID($product->cate_id),
            ]
        ));
        return redirect()->back();
    }
    public function getRemoveFromCart($rowid) {
        Cart::remove($rowid);
        return redirect()->back();
    }
    public function postAddOrder(Request $request) {
        $existed =  Customer::where('name', $request->name)->where('gender', $request->gender)->where('email', $request->email)->where('phone', $request->phone)->where('address', $request->address)->first();
        if ($existed) $customer = Customer::find($existed->id);
        else $customer = new Customer();
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        $bill = new Bill();
        $bill->customer_id = $customer->id;
        $bill->date_order = date('Y-m-d', time());
        $bill->total = Cart::total();
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->save();
        foreach (Cart::content() as $item) {
            $billDetail = new BillDetail();
            $billDetail->bill_id = $bill->id;
            $billDetail->quantity = $item->qty;
            $billDetail->product_id = $item->id;
            $billDetail->save();
        }
        Cart::destroy();
        return redirect()->route('order-success');
    }
}
