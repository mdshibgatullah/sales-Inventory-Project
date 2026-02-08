<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


// Fronend Rout
Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(TokenVerificationMiddleware::class);
Route::get('/customer', [CustomerController::class, 'customerPage'])->name('customer');
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/product', [ProductController::class, 'product'])->name('product');

Route::get('/registration', [UserController::class, 'registration']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/reset', [UserController::class, 'reset']);
Route::get('/sendOtp', [UserController::class, 'sendOtp']);
Route::get('/verify_otp', [UserController::class, 'verifyOtp']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/sale', [UserController::class, 'sale'])->name('sale')->middleware(TokenVerificationMiddleware::class);
Route::get('/invoice', [UserController::class, 'invoice'])->name('invoice')->middleware(TokenVerificationMiddleware::class);


// report
Route::get('/report', [ReportController::class, 'reportPage'])->name('report');
Route::get('/sales_report/{FormDate}/{ToDate}', [ReportController::class, 'salesReport'])->middleware(TokenVerificationMiddleware::class);


// Dashboard summery
Route::get('/summary', [DashboardController::class, 'summary'])->middleware(TokenVerificationMiddleware::class);

//Backend Route
// user create
Route::post('/user_reg', [UsersController::class, 'userRegistration']);
Route::post('/user_login', [UsersController::class, 'userLogin']);
Route::get('/logout', [UsersController::class, 'logout']);
Route::post('/send_otp', [UsersController::class, 'sendOtp']);
Route::post('/verifyOtp', [UsersController::class, 'verifyOtp']);
Route::post('/reset_password', [UsersController::class, 'resetPassword'])->middleware(TokenVerificationMiddleware::class);


// user profile Api
Route::get('/usrer_profile', [UsersController::class, 'userProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/update_profile', [UsersController::class, 'updateUserProfile'])->middleware(TokenVerificationMiddleware::class);

// Category Api
Route::get('/category_list', [CategoryController::class, 'CategoryList'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category_id', [CategoryController::class, 'categoryId'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category_create', [CategoryController::class, 'createCategory'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category_delete', [CategoryController::class, 'deleteCategory'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category_update', [CategoryController::class, 'updateCategory'])->middleware(TokenVerificationMiddleware::class);


// customer api
Route::post('/customer_create', [CustomerController::class, 'customer'])->middleware(TokenVerificationMiddleware::class);
Route::get('/customer_list', [CustomerController::class, 'CustomerList'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer_id', [CustomerController::class, 'customerId'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer_update', [CustomerController::class, 'updateCustomer'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer_delete', [CustomerController::class, 'deleteCustomer'])->middleware(TokenVerificationMiddleware::class);


// product api
Route::post('/product_create', [ProductController::class, 'CreateProduct'])->middleware(TokenVerificationMiddleware::class);
Route::get('/product_list', [ProductController::class, 'productList'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product_id', [ProductController::class, 'productId'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product_update', [ProductController::class, 'updateProduct'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product_delete', [ProductController::class, 'deleteProduct'])->middleware(TokenVerificationMiddleware::class);


// invoice api
Route::post('/invoice_create', [InvoiceController::class, 'InvoiceCreate'])->middleware(TokenVerificationMiddleware::class);
Route::get('/invoice_select', [InvoiceController::class, 'invoiceSelect'])->middleware(TokenVerificationMiddleware::class);
Route::post('/invoice_details', [InvoiceController::class, 'InvoiceDetails'])->middleware(TokenVerificationMiddleware::class);
Route::post('/invoice_delete', [InvoiceController::class, 'invoiceDelete'])->middleware(TokenVerificationMiddleware::class);
