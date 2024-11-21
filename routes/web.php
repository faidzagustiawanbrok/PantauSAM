<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// website controller 
use App\Http\Controllers\SuperAdmin\SuperAdminController;






Route::get('/', function () {
    return view('welcome');
});



// normal user dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','NormalUser'])->name('dashboard');


// super admin dashboard 
Route::get('/super-admin/dashboard', function () {
    return view('super-admin.dashboard');
})->middleware(['auth', 'verified','SuperAdmin'])->name('super-admin.dashboard');


// admin dashboard 
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified','Admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// super admin route 
Route::get('/super-admin/dashboard/userrole',[SuperAdminController::class, 'userrole'])->name('user_role');
Route::get('/super-admin/dashboard/userrole/edit_user/{slug}',[SuperAdminController::class, 'edit_user'])->name('edit_user');
Route::post('/super-admin/dashboard/userrole/submit',[SuperAdminController::class, 'update_user'])->name('update_user');








require __DIR__.'/auth.php';
