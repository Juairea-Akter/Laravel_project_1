<?php

use App\Http\Controllers\admin_dashboard\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\makeupartist\ArtistController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// ----BACKEND----

// ADMIN
Route::get('admin/login', [BackendController::class, 'admin_login'])->name('admin_login');
Route::post('/login', [BackendController::class, 'login'])->name('login');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('signout', [BackendController::class, 'signout'])->name('signout');

Route::middleware(['admin_check'])->group(function () {

    // ORDER
    Route::get('order', [BackendController::class, 'order'])->name('order');


    // MAKEUPARTIS
    Route::get('makeupartist/list', [BackendController::class, 'makeupartist_list'])->name('makeupartist_list');
    Route::get('makeupartist/list/edit/{id}', [BackendController::class, 'makeupartist_list_edit'])->name('makeupartist_list_edit');
    Route::put('makeupartist/list/upadate/{id}', [BackendController::class, 'makeupartist_list_update'])->name('makeupartist_list_update');
    Route::get('makeupartist/list/delete/{id}', [BackendController::class, 'makeupartist_list_delete'])
        ->name('makeupartist_list_delete');

    // CO-ARTIST
    Route::get('co_artist/list', [BackendController::class, 'co_artist_list'])->name('co_artist_list');


    // CUSTOMER
    Route::get('customer/list', [BackendController::class, 'customer_list'])->name('customer_list');
    Route::get('customer/list/edit/{id}', [BackendController::class, 'customer_list_edit'])->name('customer_list_edit');
    Route::put('customer/list/upadate/{id}', [BackendController::class, 'customer_list_update'])->name('customer_list_update');
    Route::get('customer/list/delete/{id}', [BackendController::class, 'customer_list_delete'])->name('customer_list_delete');



    // CATEGORIES
    Route::get('category/list', [CategoryController::class, 'cat_list'])->name('cat_list');
    Route::post('category/add', [CategoryController::class, 'cat_add'])->name('cat_add');
    Route::get('category/edit/{id}', [CategoryController::class, 'cat_edit'])->name('cat_edit');
    Route::put('category/update/{id}', [CategoryController::class, 'cat_update'])->name('cat_update');
    Route::get('category/delete/{id}', [CategoryController::class, 'cat_delete'])->name('cat_delete');



    // SUB CATEGORIES
    Route::get('sub_category/list', [CategoryController::class, 'sub_cat_list'])->name('sub_cat_list');
    Route::post('sub_category/add', [CategoryController::class, 'sub_cat_add'])->name('sub_cat_add');
    Route::get('sub_category/edit/{id}', [CategoryController::class, 'sub_cat_edit'])->name('sub_cat_edit');
    Route::put('sub_category/update/{id}', [CategoryController::class, 'sub_cat_update'])->name('sub_cat_update');
    Route::get('sub_category/delete/{id}', [CategoryController::class, 'sub_cat_delete'])->name('sub_cat_delete');




    // PACKAGE LIST
    Route::get('package/list', [BackendController::class, 'package_list'])->name('package_list');
    // PAYMENT LIST
    Route::get('payment/list', [BackendController::class, 'payment_list'])->name('payment_list');
    Route::put('payment/list/upadate/{id}', [BackendController::class, 'payment_list_update'])->name('payment_list_update');
});

// ---FRONTEND----

// INDEX
Route::get('/', [FrontendController::class, 'index'])->name('index');


// CUSTOMER LOGIN 
Route::get('customer/login', [FrontendController::class, 'customer_login'])->name('customer_login');


// CREATE USER
Route::post('create/customer', [FrontendController::class, 'create_customer'])->name('create_customer');
Route::post('create/artist', [FrontendController::class, 'create_artist'])->name('create_artist');


// USER REGISTRATION
Route::get('customer/registration', [FrontendController::class, 'cus_registration'])->name('cus_registration');
Route::get('makeup/artist/registration', [FrontendController::class, 'makeup_artist_registration'])->name('makeup_artist_registration');

// ---MAKEUP ARTIST PANEL----

// LOGIN
Route::post('makeup/login', [ArtistController::class, 'makeup_login'])->name('makeup_login');
Route::get('makeup/artist/login', [ArtistController::class, 'makeup_artist_login'])->name('makeup_artist_login');
Route::get('makeup/artist/dashboard', [ArtistController::class, 'makeup_artist_dashboard'])->name('makeup_artist_dashboard');

// SIGN OUT
Route::get('makeup/artist/signout', [ArtistController::class, 'makeup_artist_signout'])->name('makeup_artist_signout');

// VIEW DETAILS
Route::get('view/details/{id}', [FrontendController::class, 'view_details'])->name('view_details');

// CHOOSE ARTIST

Route::get('choose/artist/{id}', [FrontendController::class, 'choose_artist'])->name('choose_artist');

// VIEW MORE 

Route::get('view/more/{id}', [FrontendController::class, 'view_more'])->name('view_more');

// ADD TO CART

Route::get('add/cart/{id}', [FrontendController::class, 'add_cart'])->name('add_cart');
Route::get('cart/list', [FrontendController::class, 'cart_list'])->name('cart_list');
Route::get('cart/checkout', [FrontendController::class, 'cart_checkout'])->name('cart_checkout');
Route::get('cart/remove/{rowId}', [FrontendController::class, 'destroy'])->name('destroy');

// PLACE ORDER
Route::post('place/order', [FrontendController::class, 'place_order'])->name('place_order');


// PAYMENT
Route::get('customer/payment/details', [FrontendController::class, 'customer_payment_details'])->name('customer_payment_details');
Route::get('/payment/{time}/{date}/{packageId}/{orderId}', [FrontendController::class, 'payment'])->name('payment');
Route::post('/payment/{packageId}/{orderId}', [FrontendController::class, 'payment_submit'])->name('payment_submit');
Route::get('/sub_order/delete/{value}', [FrontendController::class, 'sub_order_delete'])->name('sub_order_delete');

// SUBMIT PAYMENT Update
Route::post('submit/{id}/{subtotal}/{qty}', [FrontendController::class, 'submit'])->name('submit');




// SERVICE- AS PACKAGES
Route::get('makeup/artist/service/list', [ArtistController::class, 'makeup_artist_service'])->name('makeup_artist_service');
Route::post('makeup/artist/service/add', [ArtistController::class, 'makeup_artist_service_add'])->name('makeup_artist_service_add');
Route::get('makeup/artist/service/edit/{id}', [ArtistController::class, 'makeup_artist_service_edit'])->name('makeup_artist_service_edit');
Route::put('makeup/artist/service/update/{id}', [ArtistController::class, 'makeup_artist_service_update'])->name('makeup_artist_service_update');
Route::get('makeup/artist/service/delete/{id}', [ArtistController::class, 'makeup_artist_service_delete'])->name('makeup_artist_service_delete');


// ARTIST CO-ARTIST LIST
Route::get('makeup/artist/co_artist/list', [ArtistController::class, 'makeup_artist_co_artist_list'])->name('makeup_artist_co_artist_list');

Route::post('makeup/artist/co_artist/add', [ArtistController::class, 'makeup_artist_co_artist_add'])->name('makeup_artist_co_artist_add');

Route::get('makeup/artist/co_artist/list/edit/{id}', [ArtistController::class, 'makeup_artist_co_artist_list_edit'])->name('makeup_artist_co_artist_list_edit');

Route::put('makeup/artist/co_artist/list/upadate/{id}', [ArtistController::class, 'makeup_artist_co_artist_list_update'])->name('makeup_artist_co_artist_list_update');

Route::get('makeup/artist/co_artist/list/delete/{id}', [ArtistController::class, 'makeup_artist_co_artist_list_delete'])
    ->name('makeup_artist_co_artist_list_delete');



// APPOINTMENT LIST
Route::get('appointment/list', [ArtistController::class, 'makeup_artist_appointment_list'])->name('makeup_artist_appointment_list');
// Appointment order action
Route::get('appointment/order/action/{id}/{value}', [ArtistController::class, 'makeup_artist_appointment_order_action'])->name('makeup_artist_appointment_order_action');

// PROFILE EDIT
Route::get('makeup/artist/profile/edit', [ArtistController::class, 'makeup_artist_profile'])->name('makeup_artist_profile');

// invoice generator
Route::get('/generate-invoice/{id}/{value}', [PdfController::class, 'generate_invoice'])->name('generate_invoice');
// Route::get('/download-invoice', [PdfController::class, 'download_invoice']);


// Customer feedback
Route::post('/customer/feedback/{sub_order_id}', [FrontendController::class, 'customer_feedback_create'])->name('customer_feedback_create');
Route::get('/customer/feedback/{sub_order_id}', [FrontendController::class, 'customer_feedback_form'])->name('customer_feedback_form');

// Customer customer feedback list
Route::get('makeup/artist/customer/feedback', [ArtistController::class, 'makeup_artist_customer_feedback'])->name('makeup_artist_customer_feedback');