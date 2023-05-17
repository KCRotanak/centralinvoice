<?php

use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SearchController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactUsController::class, 'create'])->name('contactus.create');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contactus.store');

// Route::get('/search', [HomeController::class, 'search'])->name('search');

// Route::get('/', function () {
//     return view('frontend.home');
// });
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/contacts', ContactController::class);
    
    Route::get('/admin/users/status/{user_id}/{status_code}', [UserController::class,'updateStatus'])->name('users.status.update');

});
  
/*------------------------------------------
--------------------------------------------    
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:merchant'])->group(function () {
  
    Route::get('/merchant/home', [HomeController::class, 'merchantHome'])->name('merchant.home');

    Route::resource('/merchant/invoices', InvoiceController::class);
    Route::resource('/merchant/customers', CustomerController::class);
    Route::resource('/merchant/items', ItemController::class);
    Route::resource('/merchant/company', CompanyController::class);
    Route::resource('/admin/companies', CompanyController::class);

    
});

// Search

Route::get('/search-invoice', [SearchController::class, 'search'])->name('search.invoice');
Route::get('/search-pin', [SearchController::class, 'pin'])->name('pin.invoice');
 