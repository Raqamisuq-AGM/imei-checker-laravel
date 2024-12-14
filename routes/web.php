<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImeiController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Imei\ImeiController as ImeiImeiController;
use App\Http\Controllers\Payment\PayPalController;
use App\Http\Controllers\Payment\StripePaymentController;
use App\Http\Controllers\UniversalImeiCheckFreeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ImeiController as UserImeiController;
use App\Http\Controllers\User\SettingController as UserSettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Route
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::post('/contact-us-submit', [FrontendController::class, 'contactUsSubmit'])->name('contactUsSubmit');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [FrontendController::class, 'termsCondition'])->name('terms-conditions');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.detail');
Route::get('/imei-check', [FrontendController::class, 'imeiCheck'])->name('imei-check');
Route::post('/imei-check-uni', [UniversalImeiCheckFreeController::class, 'check'])->name('imei-check-uni');
// Login Route
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/auth-user', [AuthController::class, 'authUser'])->name('auth.user');
    Route::post('/create-user', [AuthController::class, 'createUser'])->name('create.user');

    Route::prefix('auth')->group(function () {
        Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('auth.forget.password');
        Route::get('/otp', [AuthController::class, 'forgetPasswordOtp'])->name('auth.forget.password.otp');
        Route::get('/change-password', [AuthController::class, 'forgetUpdatePassword'])->name('auth.forget.password.change');
        Route::post('/change-password/check-email', [AuthController::class, 'forgetPasswordCheckEmail'])->name('auth.forget.password.check.email');
        Route::post('/change-password/check-otp', [AuthController::class, 'forgetPasswordCheckOtp'])->name('auth.forget.password.check.otp');
        Route::post('/change-password/update', [AuthController::class, 'forgetPasswordUpdatePWD'])->name('auth.forget.password.update');
    });
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/checking-imei', [ImeiImeiController::class, 'checkingImei'])->name('imei.checking');
Route::get('/imei-result', [ImeiImeiController::class, 'checkingResult'])->name('imei.checking.result');
Route::get('/imei-result-uni', [UniversalImeiCheckFreeController::class, 'checkingResultUni'])->name('imei.checking.result-uni');
Route::get('/out-of-credit', [ImeiImeiController::class, 'outOfCredit'])->name('imei.out.credit');
Route::get('/add-fund', [FrontendController::class, 'buyCredit'])->name('buy.credit');
Route::post('/add-fund', [FrontendController::class, 'addFund'])->name('buy.credit.fund');
// Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
// Strip Route
Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
Route::get('/stripe/success/{amount}', [StripePaymentController::class, 'success'])->name('stripe.success');

// Paypal Route
Route::post('/paypal/pay', [PayPalController::class, 'pay'])->name('paypal.pay');
Route::get('/paypal/success', [PayPalController::class, 'paypal.success']);
Route::get('/paypal/error', [PayPalController::class, 'paypal.error']);


// Admin Route
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

    Route::prefix('admin')->group(function () {
        // User Route
        Route::prefix('user')->group(function () {
            Route::get('/all', [UserController::class, 'all'])->name('admin.user.all');
        });

        // IMEI List Route
        Route::prefix('imei')->group(function () {
            Route::get('/all', [ImeiController::class, 'all'])->name('admin.imei.all');
        });

        // Blog Route
        Route::prefix('blog')->group(function () {
            Route::get('/all', [BlogController::class, 'all'])->name('admin.blog.all');
            Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
            Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
            Route::post('/store', [BlogController::class, 'store'])->name('admin.blog.store');
            Route::post('/update', [BlogController::class, 'update'])->name('admin.blog.update');
            Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('admin.blog.delete');
        });

        // Settings Route
        Route::prefix('setting')->group(function () {
            Route::get('/change-email', [SettingController::class, 'changeEmail'])->name('admin.setting.change-email');
            Route::get('/change-password', [SettingController::class, 'changePassword'])->name('admin.setting.change-password');
            Route::post('/update-email', [SettingController::class, 'updateEmail'])->name('admin.setting.update-email');
            Route::post('/update-password', [SettingController::class, 'updatePassword'])->name('admin.setting.update-password');
        });

        // Contact Message Route
        Route::prefix('contact')->group(function () {
            Route::get('/all', [ContactMessageController::class, 'all'])->name('admin.contact.message');
        });
    });
});


// User Route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard.index');
    Route::prefix('dashboard')->group(function () {

        // IMEI List Route
        Route::prefix('imei')->group(function () {
            Route::get('/all', [UserImeiController::class, 'all'])->name('dashboard.imei.all');
            // Route::get('/check-new', [UserImeiController::class, 'checkNew'])->name('dashboard.imei.check-new');
        });
        // Settings Route
        Route::prefix('setting')->group(function () {
            Route::get('/change-email', [UserSettingController::class, 'changeEmail'])->name('dashboard.setting.change-email');
            Route::get('/change-password', [UserSettingController::class, 'changePassword'])->name('dashboard.setting.change-password');
            Route::post('/update-email', [UserSettingController::class, 'updateEmail'])->name('dashboard.setting.update-email');
            Route::post('/update-password', [UserSettingController::class, 'updatePassword'])->name('dashboard.setting.update-password');
        });
    });
});