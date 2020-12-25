<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

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
// route::get('/', function(){
//     return view('welcome');
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/category/{slug}/{id}',[
    'as'=>'category.product',
    'uses'=>'App\Http\Controllers\CategoryController@index'
]);

Route::get('product/product_detail/{id}',[ProductController::class,'viewproduct']);
Route::get('product/search',[ProductController::class,'query'])->name('searchdetail');


// đăng nhập
Route::get('user/login', [
     'as' => 'getLogin',
     'uses' => 'App\Http\Controllers\UserctController@getLogin'
     ]);

Route::post('user/login', [
        'as' => 'postLogin',
         'uses' => 'App\Http\Controllers\UserctController@postLogin'
         ]);
Route::get('user/logout', [
            'as' => 'getLogout',
             'uses' => 'App\Http\Controllers\UserctController@getLogout'
             ]);

Route::group(['middleware' => 'App\Http\Middleware\checkUserLogin', 'prefix' => 'user', 'namespace' => 'usercustomer'], function() {
                Route::get('/', function() {
                    return view('home.home');
                });
            });
   //////////////////   user register
   Route::get('user/register','App\Http\Controllers\UserctController@register')->name('register');
// route::get('home','App\Http\Controllers\UserctController@indexhome');
Route::view('home', 'home.home');



/////// thêm vào rỏ hàng
Route::get('/homecart', 'App\Http\Controllers\ProductController@index')->name('homecart');

route::get('/cart', 'App\Http\Controllers\ProductController@cart');

route::get('add-to-cart/{id}','App\Http\Controllers\ProductController@addToCart');

Route::patch('update-cart', 'App\Http\Controllers\ProductController@update');

Route::delete('remove-from-cart', 'App\Http\Controllers\ProductController@remove');

//////   checkout
Route::group(['middleware' => ['auth']], function () {
route::get('/checkout', 'App\Http\Controllers\ProductController@getCheckOut')->name('checkout.get');
route::post('checkout/post', 'App\Http\Controllers\ProductController@postCheckOut')->name('checkout.post');
});


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Auth::routes();


