<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

// ---------- HOME -------------- //
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::post('/tim-kiem', [HomeController::class, 'tim_kiem']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);


// ---------- DANH MỤC -------------- //
Route::get('/danh-muc-san-pham/{category_id}',[CategoryController::class, 'show_category_home']);
Route::get('/chi-tiet-san-pham/{product_id}',[ProductController::class, 'detail_product']);


// ---------- ADMIN -------------- //
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);


// ---------- CATEGOGY -------------- //
Route::get('/add_category_product',[CategoryController::class, 'add_category_product']);
Route::get('/all_category_product',[CategoryController::class, 'all_category_product']);
Route::get('/edit_category_product/{category_product_id}',[CategoryController::class, 'edit_category_product']);
Route::post('/update_category_product/{category_product_id}',[CategoryController::class, 'update_category_product']);
Route::get('/delete_category_product/{category_product_id}',[CategoryController::class, 'delete_category_product']);

Route::get('/unactive-category-product/{category_product_id}',[CategoryController::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryController::class, 'active_category_product']);

Route::post('/save_category',[CategoryController::class, 'save_category']);

// ---------- PRODUCT -------------- //
Route::get('/add_product',[ProductController::class, 'add_product']);
Route::get('/all_product',[ProductController::class, 'all_product']);
Route::get('/edit_product/{product_id}',[ProductController::class, 'edit_product']);
Route::post('/update_product/{product_id}',[ProductController::class, 'update_product']);
Route::get('/delete_product/{product_id}',[ProductController::class, 'delete_product']);

Route::get('/unactive-product/{product_id}',[ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class, 'active_product']);

Route::post('/save_product',[ProductController::class, 'save_product']);
Route::post('/save_comment',[ProductController::class, 'save_comment']);
Route::post('/save_contact',[ProductController::class, 'save_contact']);

// ---------- CART -------------- //
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);

// ---------- CHECKOUT -------------- //
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/signup', [CheckoutController::class, 'signup']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::get('/log-out', [CheckoutController::class, 'log_out']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);

// ---------- MANAGE ORDER -------------- //
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order']);