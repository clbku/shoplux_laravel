<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Category;
use App\Customer;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\StoreUserRequest;
use App\Product;
use App\ProductImage;
use App\Slide;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopLuxController extends Controller
{
    public function getHome () {
        $newProduct = Product::getNewProduct();
        $slides = Slide::all();
        return view('pages.home', compact('newProduct', 'slides'));
    }

    public function getOrderSuccessPage () {
        return view('pages.order-success');
    }


}
