<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [SiteController::class,'home'])->name('home');
Route::get('/products', [SiteController::class,'products'])->name('products');
Route::post('/contact', [SiteController::class,'contact'])->name('contact');
Route::get('/admin/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class,'login'])->name('login.submit');
Route::post('/admin/logout', [AuthController::class,'logout'])->name('logout');
Route::prefix('admin')->name('admin.')->group(function(){
 Route::get('/', [AdminController::class,'dashboard'])->name('dashboard');
 Route::get('/products', [AdminController::class,'products'])->name('products');
 Route::get('/products/create', [AdminController::class,'productCreate'])->name('products.create');
 Route::post('/products', [AdminController::class,'productStore'])->name('products.store');
 Route::get('/products/{product}/edit', [AdminController::class,'productEdit'])->name('products.edit');
 Route::put('/products/{product}', [AdminController::class,'productUpdate'])->name('products.update');
 Route::delete('/products/{product}', [AdminController::class,'productDelete'])->name('products.delete');
 Route::get('/services', [AdminController::class,'services'])->name('services');
 Route::get('/services/create', [AdminController::class,'serviceCreate'])->name('services.create');
 Route::post('/services', [AdminController::class,'serviceStore'])->name('services.store');
 Route::get('/services/{service}/edit', [AdminController::class,'serviceEdit'])->name('services.edit');
 Route::put('/services/{service}', [AdminController::class,'serviceUpdate'])->name('services.update');
 Route::delete('/services/{service}', [AdminController::class,'serviceDelete'])->name('services.delete');
 Route::get('/inquiries', [AdminController::class,'inquiries'])->name('inquiries');
 Route::patch('/inquiries/{inquiry}/status', [AdminController::class,'inquiryStatus'])->name('inquiries.status');
 Route::get('/reports', [AdminController::class,'reports'])->name('reports');
});
