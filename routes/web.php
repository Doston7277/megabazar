<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\LikeListController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\ShoppingController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ProductController as FrondProduct;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\OrderController as FrontOrder;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Front\UserController as FrontUser;

Route::group(['middleware' => ['language']], function () {

    Route::get('/lang/{lang}',                          [LanguageController::class, 'index']);

    Route::get('/',                                     [FrontController::class, 'index'])->name('home');

    Route::get('/contact',                              [ContactController::class, 'index'])->name('contact');
    Route::post('/contact',                             [ContactController::class, 'create'])->name('create-contact');

    Route::get('/about',                                [AboutController::class, 'index'])->name('about');

    Route::get('/wishlist',                             [LikeListController::class, 'index'])->name('wishlist');

    Route::get('/login',                                [LoginController::class, 'login'])->name('login');
    Route::post('/login',                               [LoginController::class, 'login_check']);
    Route::get('/register',                             [LoginController::class, 'register'])->name('register');

    Route::get('/shopping-cart',                        [ShoppingController::class, 'shopping_card'])->name('shopping-cart');

    Route::get('/checkout',                             [CheckoutController::class, 'index'])->name('checkout');

    Route::get('/products/{subject_id}',                [FrondProduct::class, 'index']);
    Route::get('/product/{product_id}',                 [FrondProduct::class, 'detail']);
    Route::post('/product/search',                      [FrondProduct::class, 'search']);
    Route::get('/view/{product_id}',                    [FrondProduct::class, 'view']);

    Route::post('/product/addCart',                     [CartController::class, 'create']);
    Route::get('/product/deleteCart/{rowId}',           [CartController::class, 'delete']);

    Route::get('/product/addList/{product_id}',         [LikeListController::class, 'create']);
    Route::get('/product/delList/{rowId}',              [LikeListController::class, 'delete']);

    Route::get('/blog',                                 [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{blog_id}',                       [BlogController::class, 'detail']);

    Route::get('/order',                                [FrontOrder::class,'index'])->middleware('auth');
    Route::post('/order',                               [FrontOrder::class,'order'])->middleware('auth');

    Route::post('/user/create',                         [FrontUser::class, 'create']);
    Route::post('/user/upload',                         [FrontUser::class, 'upload']);
    Route::get('/user/{user_id}',                       [FrontUser::class, 'account'])->middleware('auth');

});

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController as AdminLogin;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\BlogController as AdminBlog;
use App\Http\Controllers\Admin\OrderController as AdminOrder;

Route::get('/subject/select',                       [SubjectController::class, 'select']);
Route::get('/category/select/{subject_id}',         [CategoryController::class, 'select']);

Route::get('/admin/login',                          [AdminLogin::class, 'login'])->name('admin-login');
Route::post('/admin/login',                         [AdminLogin::class, 'login_check'])->name('admin-login-check');

Route::group(['prefix' => 'admin','as'=>'admin.', 'middleware' => ['isAdmin']], function () {

    Route::get('/',                                 [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin',                            [AdminController::class, 'index_admin'])->name('admin');
    Route::get('/admins',                           [AdminController::class, 'index_admin_create'])->name('admin-create');
    Route::post('/admin/create',                    [AdminController::class, 'admin_create']);
    Route::get('/admin/delete/{user_id}',           [AdminController::class, 'admin_delete']);
    Route::get('/admin/update/{user_id}',           [AdminController::class, 'admin_edit']);
    Route::post('/admin/update',                    [AdminController::class, 'update'])->name('admin-update');
    Route::post('/admin/datatable',                 [AdminController::class, 'datatable']);
    Route::post('/admin/upload',                    [AdminController::class, 'upload']);

    Route::get('/users',                            [AdminUser::class, 'index'])->name('users');
    Route::get('/user',                             [AdminUser::class, 'index_create'])->name('user-create');
    Route::post('/user/upload',                     [AdminUser::class, 'upload']);
    Route::get('/user/update/{user_id}',            [AdminUser::class, 'edit']);
    Route::post('/user/update',                     [AdminUser::class, 'update'])->name('user-update');
    Route::post('/user/create',                     [AdminUser::class, 'create']);
    Route::post('/users/datatable',                 [AdminUser::class, 'datatable']);
    Route::get('/user/delete/{user_id}',            [AdminUser::class, 'delete']);

    Route::get('/subject',                          [SubjectController::class, 'index'])->name('subject');
    Route::post('/subject/datatable',               [SubjectController::class, 'datatable']);
    Route::get('/subject/create',                   [SubjectController::class, 'index_create'])->name('subject-create');
    Route::post('/subject/create',                  [SubjectController::class, 'create']);
    Route::get('/subject/delete/{subject_id}',      [SubjectController::class, 'delete']);
    Route::get('/subject/update/{subject_id}',      [SubjectController::class, 'edit']);
    Route::post('/subject/update',                  [SubjectController::class, 'update'])->name('subject-update');
    Route::get('/subject/select',                   [SubjectController::class, 'select'])->name('subject-select');

    Route::get('/category',                         [CategoryController::class, 'index'])->name('category');
    Route::post('/category/datatable',              [CategoryController::class, 'datatable']);
    Route::get('/category/create',                  [CategoryController::class, 'index_create'])->name('category-create');
    Route::post('/category/create',                 [CategoryController::class, 'create']);
    Route::get('/category/delete/{category_id}',    [CategoryController::class, 'delete']);
    Route::get('/category/update/{category_id}',    [CategoryController::class, 'edit']);
    Route::post('/category/update',                 [CategoryController::class, 'update'])->name('category-update');
    Route::get('/category/select/{subject_id}',     [CategoryController::class, 'select']);

    Route::get('/product',                          [AdminProduct::class, 'index'])->name('product');
    Route::get('/product/create',                   [AdminProduct::class, 'index_create'])->name('product-create');
    Route::post('/product/create',                  [AdminProduct::class, 'create']);
    Route::post('/product/datatable',               [AdminProduct::class, 'datatable']);
    Route::post('/product/upload',                  [AdminProduct::class, 'upload']);
    Route::get('/product/update/{product_id}',      [AdminProduct::class, 'edit']);
    Route::post('/product/update',                  [AdminProduct::class, 'update'])->name('product-update');
    Route::get('/product/delete/{product_id}',      [AdminProduct::class, 'delete']);


    Route::get('/blog',                             [AdminBlog::class, 'index'])->name('blog');
    Route::post('/blog/datatable',                  [AdminBlog::class, 'datatable']);
    Route::get('/blog/create',                      [AdminBlog::class, 'index_create'])->name('blog-create');
    Route::post('/blog/update',                     [AdminBlog::class, 'update'])->name('blog-update');
    Route::get('/blog/update/{blog_id}',            [AdminBlog::class, 'edit']);
    Route::post('/blog/create',                     [AdminBlog::class, 'create']);
    Route::get('/blog/delete/{blog_id}',            [AdminBlog::class, 'delete']);
    Route::post('/blog/upload',                     [AdminBlog::class, 'upload']);

    Route::get('/orders',                           [AdminOrder::class, 'orders'])->name('orders');
    Route::post('/order/datatable',                 [AdminOrder::class, 'datatable']);
    Route::get('/order/{order_id}',                 [AdminOrder::class, 'detail']);
});

Route::get('/logout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return back();
})->name('logout');
