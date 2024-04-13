<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


// Route::get('/', function () {
//     return view('home.index');
// });

Route::get("/", [AdminController::class,"home"]);

 // Route này chỉ được truy cập bởi người dùng có vai trò 'admin'
 Route::get('/home', [AdminController::class, 'index'])->name('home');
 Route::get('/create_blog', [AdminController::class, 'create_blog']);
 Route::post('add_blog', [AdminController::class,'add_blog']);
 Route::get('/view_blog', [AdminController::class, 'view_blog']);
 Route::get('/delete_blog/{id}', [AdminController::class, 'delete_blog']);
 
 
 Route::get('/create_room', [AdminController::class, 'create_room']);
 Route::post('/add_room', [AdminController::class, 'add_room']);
 Route::get('/view_room', [AdminController::class, 'view_room']);
 Route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);
 
 Route::get('/update_room/{id}', [AdminController::class, 'update_room']);
 Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);


 Route::get('/bookings', [AdminController::class, 'bookings']);
 Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);
 Route::get('/approve_book/{id}', [AdminController::class,'approve_book']);
 Route::get('/reject_book/{id}', [AdminController::class,'reject_book']);

 Route::get('/view_gallary', [AdminController::class,'view_gallary']);
 Route::post('/upload_gallary', [AdminController::class,'upload_gallary']);






// Home
 Route::get('/room_detail/{id}', [HomeController::class, 'room_detail']);
 Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
 Route::post('/contact', [HomeController::class,'contact']);

