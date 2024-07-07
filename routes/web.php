<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

route::get('/', [AdminController::class, 'home']);

route::get('/home', [AdminController::class, 'index'])->name('home');

route::get('/create_venue', [AdminController::class, 'create_venue'])->middleware(['auth', 'admin']);

route::post('/add_venue', [AdminController::class, 'add_venue'])->middleware(['auth', 'admin']);

Route::get('/view_venue', [AdminController::class, 'view_venue'])->name('admin.view_venue')->middleware(['auth', 'admin']);


route::get('/venue_delete/{id}', [AdminController::class, 'venue_delete'])->middleware(['auth', 'admin']);

route::get('/venue_update/{id}', [AdminController::class, 'venue_update'])->middleware(['auth', 'admin']);

route::post('/edit_venue/{id}', [AdminController::class, 'edit_venue'])->middleware(['auth', 'admin']);

route::get('/venue_details/{id}', [HomeController::class, 'venue_details']);

route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth', 'admin']);

route::get('/approve_book/{id}', [AdminController::class, 'approve_book'])->middleware(['auth', 'admin']);

route::get('/reject_book/{id}', [AdminController::class, 'reject_book'])->middleware(['auth', 'admin']);

route::get('/approve_venue/{id}', [AdminController::class, 'approve_venue'])->middleware(['auth', 'admin']);

route::get('/reject_venue/{id}', [AdminController::class, 'reject_venue'])->middleware(['auth', 'admin']);

route::post('/contact', [HomeController::class, 'contact']);

route::get('/all_messages', [AdminController::class, 'all_messages'])->middleware(['auth', 'admin']);

route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->middleware(['auth', 'admin']);

route::post('/mail/{id}', [AdminController::class, 'mail'])->middleware(['auth', 'admin']);

route::get('/all_venues', [HomeController::class, 'all_venues']);

route::get('/contact_us', [HomeController::class, 'contact_us']);

route::get('/register_host', [HomeController::class, 'register_host']);

route::get('/my_bookings', [HomeController::class, 'my_bookings']);

route::post('/add_payment', [HomeController::class, 'add_payment']);

route::post('/add_review', [HomeController::class, 'add_review']);

route::get('/venue_admin_details/{id}', [AdminController::class, 'venue_admin_details'])->middleware(['auth', 'admin']);

route::get('/view_users', [AdminController::class, 'view_users'])->middleware(['auth', 'admin']);

route::get('/add_admin', [AdminController::class, 'add_admin'])->middleware(['auth', 'admin']);

route::post('/store_admin', [AdminController::class, 'store_admin'])->middleware(['auth', 'admin']);

route::get('/delete_admin/{id}', [AdminController::class, 'delete_admin'])->middleware(['auth', 'admin']);

Route::get('/payment_details/{id}', [AdminController::class, 'payment_details'])->middleware(['auth', 'admin']);

Route::get('/booking_details/{id}', [AdminController::class, 'booking_details'])->middleware(['auth', 'admin']);

Route::get('getBookedDates/{venue_id}', [HomeController::class, 'getBookedDates'])->name('getBookedDates');
