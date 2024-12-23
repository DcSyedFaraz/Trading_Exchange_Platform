<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminAuctionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EditProfileController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPageController;
use App\Http\Controllers\Admin\TeacherDashboardController;
use App\Http\Controllers\Admin\StudentDashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthController;
use Tighten\Ziggy\Ziggy;

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

Route::get('/login', function () {
    return view('auth/login');
});

require __DIR__ . '/auth.php';

Route::get('/ziggy', function () {
    return new Ziggy();
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'about_us')->name('about_us');
    Route::get('/contact-us', 'contact_us')->name('contact_us');
    Route::get('/faqs', 'faqs')->name('faqs');
    Route::get('/marketplace', 'marketplace')->name('marketplace');
    Route::get('/marketplace/details/{id}', 'details')->name('marketplace.details');
    Route::get('/marketplace/category/{slug}', 'showCategoryProducts')->name('category.products');
    Route::get('/search', 'search')->name('products.search');
});
Route::controller(AuctionController::class)->name('auction.')->group(function () {
    Route::get('/auction', 'index')->name('index');
    Route::get('/auction/{id}', 'show')->name('show');
});
Route::post('/{id}/bid', [AuctionController::class, 'placeBid'])->name('auction.placeBid')->middleware('auth');
// web.php


// Dashboard and Logout routes
Route::middleware(['auth'])->prefix('marketplace')->group(function () {
    Route::controller(ChatController::class)->group(function () {
        Route::get('/chat', 'index')->name('chat.index');
        Route::get('/chats/{id}', 'show')->name('chats.show');
        Route::post('/chats/{chat}/messages', 'storeMessage')->name('chats.messages.store');

        // Route to initiate chat from product page
        Route::get('/products/{product}/chat', 'initiateChat')->name('products.chat');
    });
    // routes/web.php

    Route::post('/chats/{chat}/interest', [ChatController::class, 'expressInterest'])->name('chats.interest.store');

    // Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    // Route::get('/home', [AuthenticatedSessionController::class, 'home'])->name('home');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:admin']], function () {

    // Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('user_manage', UserManageController::class);
    Route::resource('featured', FeatureController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('ad', AdController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('users', UserController::class);
    // Route::resource('product_page', ProductPageController::class);

    Route::delete('auction-products/{auctionProduct}/images/{image}', [AdminAuctionController::class, 'destroyImage'])->name('admin.auction_products.images.destroy');

    // Products
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:user|admin']], function () {


});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:user|admin']], function () {
    Route::resource('edit_profile', EditProfileController::class);
    Route::get('index', [UserController::class, 'user'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::delete('images/{id}', [ProductController::class, 'destroyImage'])->name('images.destroy');
    Route::resource('auction_products', AdminAuctionController::class);

});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
