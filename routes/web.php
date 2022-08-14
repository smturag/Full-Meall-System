<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::get('/add_sheet', [App\Http\Controllers\MealStorageController::class, 'add_sheet'])->name('addSheet');
    Route::post('/add_member_meal', [App\Http\Controllers\MealStorageController::class, 'addData'])->name('addMM');
    Route::get('/view_sheet', [App\Http\Controllers\MealStorageController::class, 'view_sheet'])->name('viewSheet');
    Route::post('/add_ym', [App\Http\Controllers\YearMonthController::class, 'addData'])->name('addYm');
    Route::post('/insert_member', [App\Http\Controllers\MemberController::class, 'addData'])->name('addMember');
    Route::get('/get_member_by_month', [App\Http\Controllers\MemberController::class, 'findAllMemberByMonth'])->name('getMemberByMonth');
    Route::get('/add_member', [App\Http\Controllers\MemberController::class, 'viewLayout'])->name('insertMember');

});
