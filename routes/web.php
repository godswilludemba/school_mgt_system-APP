<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeCategoryAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\StudentRegController;
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

    //Student Class Route
    Route::get('/student/class/view',  [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
    Route::get('/add/student/class',  [StudentClassController::class, 'AddStudentClass'])->name('add.student.class');
    Route::post('/store/student/class',  [StudentClassController::class, 'StoreStudentClass'])->name('store.student.class');
    Route::get('/edit/student/class/{id}',  [StudentClassController::class, 'EditStudentClass'])->name('edit.student.class');
    Route::post('/student/class/update/{id}',  [StudentClassController::class, 'StudentClassUpdate'])->name('update.student.class');
    Route::get('/delete/student/class/{id}',  [StudentClassController::class, 'DeleteStudentClass'])->name('delete.student.class');

    //Student Year Route
    Route::get('/student/year/view',  [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
    Route::get('/add/student/year',  [StudentYearController::class, 'AddStudentYear'])->name('add.student.year');
    Route::post('/store/student/year',  [StudentYearController::class, 'StoreStudentYear'])->name('store.student.year');
    Route::get('/edit/student/year/{id}',  [StudentYearController::class, 'EditStudentYear'])->name('edit.student.year');
    Route::post('/student/year/update/{id}',  [StudentYearController::class, 'StudentYearUpdate'])->name('update.student.year');
    Route::get('/delete/student/year/{id}',  [StudentYearController::class, 'DeleteStudentYear'])->name('delete.student.year');
  
    //Student Group Route
    Route::get('/student/group/view',  [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
    Route::get('/add/student/group',  [StudentGroupController::class, 'AddStudentGroup'])->name('add.student.group');
    Route::post('/store/student/group',  [StudentGroupController::class, 'StoreStudentGroup'])->name('store.student.group');
    Route::get('/edit/student/group/{id}',  [StudentGroupController::class, 'EditStudentGroup'])->name('edit.student.group');
    Route::post('/student/group/update/{id}',  [StudentGroupController::class, 'StudentGroupUpdate'])->name('update.student.group');
    Route::get('/delete/student/group/{id}',  [StudentGroupController::class, 'DeleteStudentGroup'])->name('delete.student.group');

    //Student Group Route
    Route::get('/student/shift/view',  [StudentShiftController::class, 'StudentShiftView'])->name('student.shift.view');
    Route::get('/add/student/shift',  [StudentShiftController::class, 'AddStudentShift'])->name('add.student.shift');
    Route::post('/store/student/shift',  [StudentShiftController::class, 'StoreStudentShift'])->name('store.student.shift');
    Route::get('/edit/student/shift/{id}',  [StudentShiftController::class, 'EditStudentShift'])->name('edit.student.shift');
    Route::post('/student/shift/update/{id}',  [StudentShiftController::class, 'StudentShiftUpdate'])->name('update.student.shift');
    Route::get('/delete/student/shift/{id}',  [StudentShiftController::class, 'DeleteStudentShift'])->name('delete.student.shift');

    //Fee Category Route
    Route::get('/fee/category/view',  [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.category.view');
    Route::get('/add/fee/category',  [FeeCategoryController::class, 'AddFeeCategory'])->name('add.fee.category');
    Route::post('/store/fee/category',  [FeeCategoryController::class, 'StoreFeeCategory'])->name('store.fee.category');
    Route::get('/edit/fee/category/{id}',  [FeeCategoryController::class, 'EditFeeCategory'])->name('edit.fee.category');
    Route::post('/fee/category/update/{id}',  [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('update.fee.category');
    Route::get('/delete/fee/category/{id}',  [FeeCategoryController::class, 'DeleteFeeCategory'])->name('delete.fee.category');

    //Fee Category Amount Route
    //much relationship was created here please study it.
    Route::get('/fee/amount/view',  [FeeCategoryAmountController::class, 'ViewFeeCategoryAmount'])->name('fee.amount.view');
    Route::get('/add/fee/amount',  [FeeCategoryAmountController::class, 'AddFeeAmount'])->name('add.fee.amount');
    Route::post('/store/fee/amount',  [FeeCategoryAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');
    Route::get('/edit/fee/amount/{fee_category_id}',  [FeeCategoryAmountController::class, 'EditFeeAmount'])->name('edit.fee.amount');
    Route::post('/update/fee/amount/{fee_category_id}',  [FeeCategoryAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
    Route::get('/fee/amount/details{fee_category_id}',  [FeeCategoryAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');

    //exam type all route
    Route::get('/exam/type/view',  [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::get('/add/exam/type',  [ExamTypeController::class, 'AddExamType'])->name('add.exam.type');
    Route::post('/store/exam/type',  [ExamTypeController::class, 'StoreExamType'])->name('store.exam.type');
    Route::get('/edit/exam/type/{id}',  [ExamTypeController::class, 'EditExamType'])->name('edit.exam.type');
    Route::post('/exam/type/update/{id}',  [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');
    Route::get('/delete/exam/type/{id}',  [ExamTypeController::class, 'DeleteExamType'])->name('delete.exam.type');


    //School subject all route
    Route::get('/school/subject/view',  [SchoolSubjectController::class, 'ViewSchSubj'])->name('school.subject.view');
    Route::get('/add/school/subject',  [SchoolSubjectController::class, 'AddSchSubj'])->name('add.school.subject');
    Route::post('/store/school/subject',  [SchoolSubjectController::class, 'StoreSchSubj'])->name('store.school.subject');
    Route::get('/edit/school/subject/{id}',  [SchoolSubjectController::class, 'EditSchSubj'])->name('edit.school.subject');
    Route::post('/school/subject/update/{id}',  [SchoolSubjectController::class, 'SchSubjUpdate'])->name('update.school.subject');
    Route::get('/delete/school/subject/{id}',  [SchoolSubjectController::class, 'DeleteSchSubj'])->name('delete.school.subject');  

    //Assign Subject Route
    //much relationship was created here please study it.
    Route::get('/assign/subject/view',  [AssignSubjectController::class, 'ViewAssignSubj'])->name('assign.subject.view');
    Route::get('/assign/subject/add',  [AssignSubjectController::class, 'AssignSubjAdd'])->name('assign.subject.add');
    Route::post('/store/assign/subject',  [AssignSubjectController::class, 'StoreAssignSubj'])->name('store.assign.subject');
    Route::get('/edit/assign/subject/{class_id}',  [AssignSubjectController::class, 'EditAssignSubj'])->name('assign.subject.edit');
    Route::post('/update/assign/subject/{class_id}',  [AssignSubjectController::class, 'UpdateAssignSubj'])->name('update.assign.subject');
    Route::get('/assign/subject/details{class_id}',  [AssignSubjectController::class, 'AssignSubjDetails'])->name('assign.subject.details');

     //Designation all route
     Route::get('/designation/view',  [DesignationController::class, 'ViewDesignation'])->name('designation.view');
     Route::get('/add/designation',  [DesignationController::class, 'AddDesignation'])->name('add.designation');
     Route::post('/store/designation',  [DesignationController::class, 'StoreDesignation'])->name('store.designation');
     Route::get('/edit/designation/{id}',  [DesignationController::class, 'EditDesignation'])->name('edit.designation');
     Route::post('/designation/update/{id}',  [DesignationController::class, 'DesignationUpdate'])->name('update.designation');
     Route::get('/delete/designation/{id}',  [DesignationController::class, 'DeleteDesignation'])->name('delete.designation');  
 

 });

 //Student Management All Route
 Route::prefix('students')->group(function(){
    Route::get('/registration/view',  [StudentRegController::class, 'ViewStudentRegistration'])->name('student.registration.view');
   
    
 });


