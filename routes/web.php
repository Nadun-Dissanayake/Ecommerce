<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\CategoriesPage;
use App\Livewire\ProductPage;
use App\Livewire\CartPage;
use App\Livewire\ProductetailPage;
use App\Livewire\CheckOutPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\MyOrdersDetailPage;
use App\Livewire\auth\LoginPage;
use App\Livewire\auth\RegisterPage;
use App\Livewire\auth\ForgotPasswordPage;
use App\Livewire\auth\ResetPasswordPage;
use App\Livewire\SuccessPage;
use App\Livewire\CancelPage;

Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products' , ProductPage::class);
Route::get('/cart' , CartPage::class);
Route::get('/products/{slug}' , ProductetailPage::class); 
Route::get('/checkout' , CheckOutPage::class);
Route::get('/my-orders' , MyOrdersPage::class);
Route::get('/my-orders/three' , MyOrdersDetailPage::class);

Route::get('/login' , LoginPage::class);
Route::get('/register' , RegisterPage::class);
Route::get('/forgot' , ForgotPasswordPage::class);
Route::get('/reset' , ResetPasswordPage::class);

Route::get('success' , SuccessPage::class);
Route::get('cancle' , CancelPage::class);

