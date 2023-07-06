<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
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
Route::prefix('users')->group(function(){
   Route::get('/view/user', [UserController::class, 'ViewUser'] )->name('view.user');
   Route::get('/add/user',  [UserController::class, 'AddUser'])->name('add.user');
   Route::post('/store/user',  [UserController::class, 'StoreUser'])->name('store.user');
   Route::get('/edit/user/{id}',  [UserController::class, 'EditUser'])->name('edit.user');
   Route::post('/update/user/{id}',  [UserController::class, 'UpdateUser'])->name('update.user');
   Route::get('/delete/user/{id}',  [UserController::class, 'DeleteUser'])->name('delete.user');
});

//Profile mgt all Route
Route::prefix('profile')->group(function(){
    Route::get('/view/profile',  [ProfileController::class, 'ViewProfile'])->name('view.profile');
    Route::get('/edit/profile',  [ProfileController::class, 'EditProfile'])->name('edit.profile');
    Route::post('/profile/update',  [ProfileController::class, 'ProfileUpdate'])->name('profile.update');
    Route::get('/change/password',  [ProfileController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password',  [ProfileController::class, 'UpdatePassword'])->name('update.password');
    
 });

 //Student Class setup mgt all Route
Route::prefix('setup')->group(function(){
    Route::get('/student/class/view',  [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
    Route::get('/add/student/class',  [StudentClassController::class, 'AddStudentClass'])->name('add.student.class');
    Route::post('/store/student/class',  [StudentClassController::class, 'StoreStudentClass'])->name('store.student.class');
    Route::get('/edit/student/class/{id}',  [StudentClassController::class, 'EditStudentClass'])->name('edit.student.class');
    Route::post('/student/class/update/{id}',  [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
    Route::get('/delete/student/class/{id}',  [StudentClassController::class, 'DeleteStudentClass'])->name('delete.student.class');
  
 });


