<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
         return view('admin.admin_index'); 
        })->name('dashboard');
});

//Admin Logout section
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');

});