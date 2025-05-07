<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\DestinationAttractionController;
use App\Http\Controllers\LocalExperienceController;
use App\Http\Controllers\CurrencyConverterController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\BookingEmailController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name("welcome");
Route::get('/hotels/search', [HomeController::class, 'search'])->name('hotel.search');


Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register']);

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('auth:admin')->name('admin.dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('admin/dashboard', [AdminAuthController::class, 'showDashboard'])->name('admin.dashboard');
        Route::get('/admin/hotel-bookings', [AdminAuthController::class, 'showHotelBookings'])->name('admin.hotel_bookings');
    });
    Route::delete('delete-user/{id}', [AdminAuthController::class, 'deleteUser'])->name('deleteUser');
    Route::patch('/admin/hotel-bookings/{id}/update-status', [AdminAuthController::class, 'updateBookingStatus'])->name('admin.update_booking_status');

});


Route::prefix('user')->group(function () {
    Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
    Route::post('/register', [UserAuthController::class, 'register']);

    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'login']);

    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->middleware('auth')->name('user.dashboard');
    
    
});


Route::get('/booking/check/{id}', [BookingController::class, 'checkLogin'])->name('booking.check');
Route::get('/booking/form/{id}', [BookingController::class, 'showForm'])->name('booking.form');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::middleware(['auth'])->get('/dashboard/bookings', [BookingController::class, 'showUserBookings'])->name('user.bookings');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/reviews', [ReviewController::class, 'index'])->name('user.reviews');
    Route::post('/dashboard/reviews', [ReviewController::class, 'store'])->name('user.reviews.store');
});


Route::get('packages', [TravelPackageController::class, 'index'])->name('packages.index');
Route::get('packages/{id}', [TravelPackageController::class, 'show'])->name('packages.show');
Route::get('currency-converter', [CurrencyConverterController::class, 'show'])->name('currency.converter');
Route::post('currency-converter/convert', [CurrencyConverterController::class, 'convert']);
Route::get('/weather', [WeatherController::class, 'showWeather'])->name('weather.show');
Route::get('/groups', [GroupController::class, 'index'])->name('group.index');

Route::get('/test-email/{bookingId}', [BookingEmailController::class, 'sendTestEmail'])->name('test.email');
Route::get('/destinations', [DestinationAttractionController::class, 'index'])->name('destinations.index');
Route::get('/local-experiences', [LocalExperienceController::class, 'index'])->name('local_experience.index');
Route::get('/local-experience/{id}/book', [LocalExperienceController::class, 'showBookingForm'])->name('local_experience.book');


// Route::post('/local-experience/{id}/book', [LocalExperienceController::class, 'storeBooking'])->name('local_experience.storeBooking');
Route::post('/local-experience/book/{id}', [LocalExperienceController::class, 'storeBooking'])->middleware('auth')->name('local_experience.storeBooking');

Route::middleware('auth')->group(function () {
    Route::get('/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
});

Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('/hotel/{id}', [HotelController::class, 'show'])->name('hotel.show');


Route::match(['get', 'post'], '/pay-sslcommerz', [PaymentController::class, 'payViaAjax']);
Route::post('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
Route::post('/payment-fail', [PaymentController::class, 'fail'])->name('payment.fail');
Route::post('/payment-cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');


Route::post('/checkout/session', [BookingController::class, 'createCheckoutSession'])->name('checkout.session');
Route::get('/checkout/success', [BookingController::class, 'paymentSuccess'])->name('checkout.success');
Route::get('/checkout/cancel', [BookingController::class, 'paymentCancel'])->name('checkout.cancel');


Route::get('/destination/{id}', [DestinationAttractionController::class, 'show'])->name('destination.show');



// Add this in routes/web.php
Route::get('/checkout', [BookingController::class, 'showCheckout'])->name('checkout');



Route::post('/checkout/create-session', [BookingController::class, 'createCheckoutSession'])->name('checkout.createSession');

