<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookingController;

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BarberController;
use App\Http\Controllers\Admin\DateOffController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CashController;
use App\Http\Controllers\BarbersController;

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



Route::get('/', function () {
    return view('client.pages.indexpage');
})->name('indexpage');


Route::get('/aboutus', function () {
    return view('client.pages.aboutus');
})->name('aboutus');

Route::get('/blog', function () {
    return view('client.pages.blog');
})->name('blog');

Route::get('/contactus', function () {
    return view('client.pages.contactus');
})->name('contactus');

Route::get('/services', function () {
    return view('client.pages.services');
})->name('services');




Route::prefix('/')->name('client.')->group(function () {
    Route::prefix('booking')->controller(BarbersController::class)->name('booking.')->group(function () {
        Route::get('create', 'booking_create')->name('booking_create');
        Route::post('store', 'booking_store')->name('booking_store');
        Route::post('gettime', 'getTime')->name('getTime');
        Route::post('getBarber', 'getBarber')->name('getBarber');
        Route::post('getDate', 'getDate')->name('getDate');
        Route::post('getValue', 'getValue')->name('getValue');
        Route::post('getPhone_Email', 'getPhone_Email')->name('getPhone_Email');
        Route::post('booking_store', 'booking_store')->name('booking_store');
        Route::post('getPrice','getPrice')->name('getPrice');


    });
});
Route::middleware(['check_login'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('booking')->controller(BookingController::class)->name('booking.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
            Route::post('gettime', 'getTime')->name('getTime');
            Route::post('getPrice','getPrice')->name('getPrice');
            Route::post('getProduct','getProduct')->name('getProduct');
            Route::post('getBarber', 'getBarber')->name('getBarber');
            Route::post('getDate', 'getDate')->name('getDate');
            Route::post('getValue', 'getValue')->name('getValue');
            Route::post('getPhone_Email', 'getPhone_Email')->name('getPhone_Email');
            Route::post('approve/{id}', 'approve')->name('approve');


        });
        Route::prefix('service')->controller(ServiceController::class)->name('service.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
      
        Route::prefix('history')->controller(HistoryController::class)->name('history.')->group(function () {
            Route::get('history', 'history')->name('history');
            Route::post('approve/{id}', 'approve')->name('approve');
        });
        Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('showalluser', 'showalluser')->name('showalluser');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('approve/{id}', 'approve')->name('approve');
            Route::post('firer/{id}', 'firer')->name('firer');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');

        });
        Route::prefix('barber')->controller(BarberController::class)->name('barber.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
            Route::post('getPhone_Email_Barber', 'getPhone_Email_Barber')->name('getPhone_Email_Barber');
        });
        Route::prefix('date_off')->controller(DateOffController::class)->name('date_off.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
            Route::post('getPhone_Email_Barber', 'getPhone_Email_Barber')->name('getPhone_Email_Barber');
            Route::post('approve/{id}', 'approve')->name('approve');

        });
        Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('destroy/{id}', 'destroy')->name('destroy');
        });
        Route::prefix('bill')->controller(BillController::class)->name('bill.')->group(function(){
            Route::get('index','index')->name('index');
            Route::get('create/{id}','create')->name('create');
            Route::post('store/{id}','store')->name('store');
            Route::get('bill','bill')->name('bill');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}','destroy')->name('destroy');
            Route::post('getPrice','getPrice')->name('getPrice');
            Route::post('getProduct','getProduct')->name('getProduct');
        });
        Route::prefix('cash')->controller(CashController::class)->name('cash.')->group(function(){
            Route::get('index','index')->name('index');
            Route::get('create/{id}','create')->name('create');
            Route::post('store/{id}','store')->name('store');
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('update/{id}','update')->name('update');
            Route::get('destroy/{id}','destroy')->name('destroy');
            Route::post('check/{id}', 'check')->name('check');

        });
    });
});



Route::get('send-mail', [SendMailController::class, 'send'])->name('send');
Route::get('login', [LoginController::class, 'templateLogin'])->name('templateLogin');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'Logout'])->name('logout');
Route::post('signin', [UserController::class, 'store'])->name('signin');
Route::get('dang_ky', [UserController::class, 'dang_ky'])->name('dang_ky');


Route::get('updated-activity', [TelegramController::class, 'updatedActivity'])->name('updatedActivity');

//Route::get('/updated-activity', 'TelegramController@updatedActivity');
Route::get('contact', [TelegramController::class, 'contactForm'])->name('contactForm');
Route::post('send-message', [TelegramController::class, 'sendMessage'])->name('sendMessage');



Route::get('test', [TestController::class, 'test'])->name('test');
Route::get('test01', [TestController::class, 'test01'])->name('test1');
Route::get('test02', [TestController::class, 'test02'])->name('test1');