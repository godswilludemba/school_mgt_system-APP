<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
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

//User management All Route
Route::controller(UserController::class)->group(function(){
   Route::get('/view/user', 'ViewUser')->name('view.user');
   Route::get('/add/user', 'AddUser')->name('add.user');
   Route::post('/store/user', 'StoreUser')->name('store.user');
   Route::get('/edit/user/{id}', 'EditUser')->name('edit.user');
   Route::post('/update/user/{id}', 'UpdateUser')->name('update.user');
   Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
});