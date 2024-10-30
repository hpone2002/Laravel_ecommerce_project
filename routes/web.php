<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripePaymentController;



// Added lines
Route::get('/index', [HomeController::class, 'index']);
Route::redirect('/', '/index');
Route::get('product_detail/{id}', [HomeController::class, 'product_detail']);
Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('why_us', [HomeController::class, 'why_us'])->name('why_us');
Route::get('testimonial', [HomeController::class, 'testimonial'])->name('testimonial');
Route::get('contact_us', [HomeController::class, 'contact_us'])->name('contact_us');

Route::middleware(['auth'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('login_home', [HomeController::class, 'login_home'])->name('dashboard');
    Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
    Route::get('mycart', [HomeController::class, 'mycart'])->name('mycart');
    Route::delete('remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');
    Route::post('confirm_order', [HomeController::class, 'confirm_order'])->name('confrim_order');
    Route::get('myorder', [HomeController::class, 'myorder'])->name('myorder');
    
});

// for striped payment
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe/{total_price}', 'index');
    Route::post('stripe/{total_price}', 'stripe')->name('stripe.post');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
    Route::get('view_category', [AdminController::class, 'view_category'])->name('view_category');
    Route::post('add_category', [AdminController::class, 'add_category'])->name('delete_category');
    Route::delete('delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
    Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->name('edit_category');
    Route::put('update_category/{id}', [AdminController::class, 'update_category'])->name('update_category');
    Route::get('add_product', [AdminController::class, 'add_product'])->name('add_product');
    Route::post('upload_product', [AdminController::class, 'upload_product'])->name('upload_product');
    Route::get('view_product', [AdminController::class, 'view_product'])->name('view_product');
    Route::delete('delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
    Route::get('edit_product/{slug}', [AdminController::class, 'edit_product'])->name('edit_product');
    Route::put('update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');
    Route::get('search_products', [AdminController::class, 'search_products'])->name('search_products');
    Route::get('view_order', [AdminController::class, 'view_order'])->name('view_order');
    Route::get('ontheway/{id}', [AdminController::class, 'ontheway'])->name('ontheway');
    Route::get('delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
    Route::get('denied/{id}', [AdminController::class, 'denied'])->name('denied');
    Route::get('inprogress/{id}', [AdminController::class, 'inprogress'])->name('inprogress');
    Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf');
    Route::get('view_users', [AdminController::class, 'view_users'])->name('view_users');
});

require __DIR__.'/auth.php';