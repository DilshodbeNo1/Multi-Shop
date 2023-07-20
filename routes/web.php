<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/* Admin ROUTES */

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\Product_AttributesController;
use App\Http\Controllers\Admin\Product_ImagesController;
use App\Http\Controllers\Admin\Product_VariantsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\VariantsController;

/* Client Routes */

use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\ClientController;   
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

require __DIR__.'/auth.php';

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/detail', [DetailController::class, 'index'])->name('detail');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('clientAuth')->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('clientAuth')->name('checkout');

Route::get('/category/{slug}', [ShopController::class, 'productByCategory'])->name('category.products');
Route::get('/product/{slug}', [ShopController::class, 'productDetail'])->name('product.detail');

Route::prefix('client')->name('client.')->group(function () {

    Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('dashboard')->middleware('clientAuth');

    Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.save');

    Route::get('/login', [RegisterController::class, 'loginForm'])->name('login');
    Route::post('/login', [RegisterController::class, 'login'])->name('login.save');

    Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
    
});


Route::prefix('product')->name('product.')->group(function () {

    Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('add.cart');
    Route::get('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove');
    Route::post('/update-from-cart', [CartController::class, 'update'])->name('update');
   
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
    
   
    //message sahifasi(Message Page)
        
    // Route::get('/messages', [MessagesController::class, 'messages'])->name('message');
    // Route::get('/message/delete/{id}', [MessagesController::class, 'delete'])->name('message.delete');
    
    //Category 

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::put('/category/create', [CategoryController::class, 'store'])->name('category.create');
    Route::get('/category/take/{id}', [CategoryController::class, 'show'])->name('category.view');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/upload/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Attribute 

    Route::get('/attribute', [AttributesController::class, 'index'])->name('attribute.index');
    Route::get('/attribute/add', [AttributesController::class, 'create'])->name('attribute.add');
    Route::put('/attribute/create', [AttributesController::class, 'store'])->name('attribute.create');
    Route::get('/attribute/take/{id}', [AttributesController::class, 'show'])->name('attribute.view');
    Route::get('/attribute/edit/{id}', [AttributesController::class, 'edit'])->name('attribute.edit');
    Route::put('/attribute/upload/{id}', [AttributesController::class, 'update'])->name('attribute.update');
    Route::delete('/attribute/delete/{id}', [AttributesController::class, 'destroy'])->name('attribute.destroy');

    //Products 

    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/add', [ProductsController::class, 'create'])->name('products.add');
    Route::put('/products/create', [ProductsController::class, 'store'])->name('products.create');
    Route::get('/products/take/{id}', [ProductsController::class, 'show'])->name('products.view');
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/upload/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

    //Product_Attribute

    Route::get('/product_attribute', [Product_AttributesController::class, 'index'])->name('product_attribute.index');
    Route::get('/product_attribute/add', [Product_AttributesController::class, 'create'])->name('product_attribute.add');
    Route::put('/product_attribute/create', [Product_AttributesController::class, 'store'])->name('product_attribute.create');
    Route::get('/product_attribute/take/{id}', [Product_AttributesController::class, 'show'])->name('product_attribute.view');
    Route::get('/product_attribute/edit/{id}', [Product_AttributesController::class, 'edit'])->name('product_attribute.edit');
    Route::put('/product_attribute/upload/{id}', [Product_AttributesController::class, 'update'])->name('product_attribute.update');
    Route::delete('/product_attribute/delete/{id}', [Product_AttributesController::class, 'destroy'])->name('product_attribute.destroy');

    //Product_Images

    Route::get('/product_images', [Product_ImagesController::class, 'index'])->name('product_images.index');
    Route::get('/product_images/add', [Product_ImagesController::class, 'create'])->name('product_images.add');
    Route::put('/product_images/create', [Product_ImagesController::class, 'store'])->name('product_images.create');
    Route::get('/product_images/take/{id}', [Product_ImagesController::class, 'show'])->name('product_images.view');
    Route::get('/product_images/edit/{id}', [Product_ImagesController::class, 'edit'])->name('product_images.edit');
    Route::put('/product_images/upload/{id}', [Product_ImagesController::class, 'update'])->name('product_images.update');
    Route::delete('/product_images/delete/{id}', [Product_ImagesController::class, 'destroy'])->name('product_images.destroy');

    
    //Product_Variants

    Route::get('/product_variants', [Product_VariantsController::class, 'index'])->name('product_variants.index');
    Route::get('/product_variants/add', [Product_VariantsController::class, 'create'])->name('product_variants.add');
    Route::put('/product_variants/create', [Product_VariantsController::class, 'store'])->name('product_variants.create');
    Route::get('/product_variants/take/{id}', [Product_VariantsController::class, 'show'])->name('product_variants.view');
    Route::get('/product_variants/edit/{id}', [Product_VariantsController::class, 'edit'])->name('product_variants.edit');
    Route::put('/product_variants/upload/{id}', [Product_VariantsController::class, 'update'])->name('product_variants.update');
    Route::delete('/product_variants/delete/{id}', [Product_VariantsController::class, 'destroy'])->name('product_variants.destroy');

    //Variants

    Route::get('/variants', [VariantsController::class, 'index'])->name('variants.index');
    Route::get('/variants/add', [VariantsController::class, 'create'])->name('variants.add');
    Route::put('/variants/create', [VariantsController::class, 'store'])->name('variants.create');
    Route::get('/variants/take/{id}', [VariantsController::class, 'show'])->name('variants.view');
    Route::get('/variants/edit/{id}', [VariantsController::class, 'edit'])->name('variants.edit');
    Route::put('/variants/upload/{id}', [VariantsController::class, 'update'])->name('variants.update');
    Route::delete('/variants/delete/{id}', [VariantsController::class, 'destroy'])->name('variants.destroy');


});

