<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'homepage',
    'uses' => 'ShopLuxController@getHome'
]);
Route::get('product/{id}', [
    'as' => 'listProduct',
    'uses' => 'Shop\ProductController@getProductList'
]);
Route::get('product/detail/{id}', [
    'as' => 'productDetail',
    'uses' => 'Shop\ProductController@getProductDetail'
]);

Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', [
        'as' => 'addToCart',
        'uses' => 'Shop\CartController@getAddToCart'
    ]);
    Route::get('list', [
        'as' => 'cart',
        'uses' => 'Shop\CartController@getCart'
    ]);
    Route::get('remove/{id}', [
        'as' => 'removeFromCart',
        'uses' => 'Shop\CartController@getRemoveFromCart'
    ]);
});

Route::post('add-order', [
    'as' => 'addOrder',
    'uses' => 'Shop\CartController@postAddOrder'
]);
Route::get('order-success', [
    'as' => 'order-success',
    'uses' => 'ShopLuxController@getOrderSuccessPage'
]);
Route::get('sign-in', [
    'as' => 'sign-in',
    'uses' => 'Auth\LoginController@getSignIn'
]);
Route::post('sign-in', [
    'as' => 'sign-in',
    'uses' => 'Auth\LoginController@postSignIn'
]);
Route::get('sign-up', [
    'as' => 'sign-up',
    'uses' => 'Auth\LoginController@getSignUp'
]);
Route::get('sign-out', [
    'as' => 'sign-out',
    'uses' => 'Auth\LoginController@getSignOut'
]);
Route::post('post-add-user', [
    'as' => 'post-add-user',
    'uses' => 'ShopLuxController@postAddUser'
]);

Route::get('product/category/{id}', [
    'as' => 'pages.product',
    'uses' => 'Shop\ProductController@getProductListByCateId'
]);

Route::get('find', [
    'as' => 'pages.find',
    'uses' => 'Shop\ProductController@getFindProduct'
]);

Route::group(['prefix' => 'ajax'], function () {
    Route::get('bill-detail/{idBill}', [
        'as' => 'ajax.bill-detail',
        'uses' => 'AdminController@getAjaxBillDetail'
    ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [
            'as' => 'admin.index',
            'uses' => 'AdminController@getIndex'
        ]);
        Route::group(['prefix' => 'category'], function () {
            Route::get('/list', [
                'as' => 'admin.category.list',
                'uses' => 'Admin\CateController@getProductTypeList'
            ]);
            Route::post('/add', [
                'as' => 'admin.category.post.add',
                'uses' => 'Admin\CateController@postAddCategory'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'admin.category.post.edit',
                'uses' => 'Admin\CateController@postEditCategory'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'admin.category.delete',
                'uses' => 'Admin\CateController@getDeleteCategory'
            ]);
            Route::post('/find', [
                'as' => 'admin.category.find',
                'uses' => 'Admin\CateController@postFindCategories'
            ]);
            Route::get('/list/{id}', [
                'as' => 'admin.category.listProduct',
                'uses' => 'Admin\CateController@getListProductByCateId'
            ]);
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/list', [
                'as' => 'admin.product.list',
                'uses' => 'Admin\ProductController@getProductList'
            ]);
            Route::get('/add', [
                'as' => 'admin.product.add',
                'uses' => 'Admin\ProductController@getAddProduct'
            ]);
            Route::post('/add', [
                'as' => 'admin.product.post.add',
                'uses' => 'Admin\ProductController@postAddProduct'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'admin.product.edit',
                'uses' => 'Admin\ProductController@getEditProduct'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'admin.product.post.edit',
                'uses' => 'Admin\ProductController@postEditProduct'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'admin.product.delete',
                'uses' => 'Admin\ProductController@getDeleteProduct'
            ]);
            Route::post('/find', [
                'as' => 'admin.product.find',
                'uses' => 'Admin\ProductController@postFindProduct'
            ]);
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/list', [
                'as' => 'admin.user.list',
                'uses' => 'Admin\UserController@getUserList'
            ]);
            Route::get('/add', [
                'as' => 'admin.user.add',
                'uses' => 'Admin\UserController@getAddUser'
            ]);
            Route::post('/add', [
                'as' => 'admin.user.post.add',
                'uses' => 'Admin\UserController@postAddUser'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'admin.user.edit',
                'uses' => 'Admin\UserController@getEditUser'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'admin.user.post.edit',
                'uses' => 'Admin\UserController@postEditUser'
            ]);
            Route::get('/lock/{id}', [
                'as' => 'admin.user.lock',
                'uses' => 'Admin\UserController@getLockUser'
            ]);
            Route::post('/find', [
                'as' => 'admin.user.find',
                'uses' => 'Admin\UserController@postFindUser'
            ]);
        });
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/list', [
                'as' => 'admin.customer.list',
                'uses' => 'Admin\CustomerController@getCustomerList'
            ]);
            Route::get('/detail/{id}', [
                'as' => 'admin.customer.detail',
                'uses' => 'Admin\CustomerController@getCustomerBillDetail'
            ]);
            Route::get('/check/{status}/{id}', [
                'as' => 'admin.customer.check',
                'uses' => 'Admin\CustomerController@getCustomerCheck'
            ]);
            Route::post('/find', [
                'as' => 'admin.customer.find',
                'uses' => 'Admin\CustomerController@postFindCustomer'
            ]);
        });
        Route::group(['prefix' => 'slide'], function () {
            Route::get('/list', [
                'as' => 'admin.slide.list',
                'uses' => 'Admin\SlideController@getSlideList'
            ]);
            Route::post('add', [
                'as' => 'admin.slide.post.add',
                'uses' => 'Admin\SlideController@postAddSlide'
            ]);
            Route::get('delete/{id}', [
                'as' => 'admin.slide.delete',
                'uses' => 'Admin\SlideController@getDeleteSlide'
            ]);
        });
        Route::group(['prefix' => 'news'], function () {
            Route::get('/list', [
                'as' => 'admin.news.list',
                'uses' => 'AdminController@getNewsList'
            ]);
            Route::get('/add', [
                'as' => 'admin.news.add',
                'uses' => 'AdminController@getAddNews'
            ]);
            Route::post('/add', [
                'as' => 'admin.news.post.add',
                'uses' => 'AdminController@postAddNews'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'admin.news.edit',
                'uses' => 'AdminController@getEditNews'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'admin.news.post.edit',
                'uses' => 'AdminController@postEditNews'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'admin.news.delete',
                'uses' => 'AdminController@getDeleteNews'
            ]);
            Route::post('/find', [
                'as' => 'admin.news.find',
                'uses' => 'AdminController@postFindNews'
            ]);
        });
    });
});
