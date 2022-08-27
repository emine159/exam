<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\UserController;
//use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('exam/detay/{slug}', [MainController::class, 'exam_detail'])->name('exam.detail');
    Route::get('exam/{slug}', [MainController::class, 'exam'])->name('exam.join');
    Route::post('exam/{slug}', [MainController::class, 'result'])->name('exam.result');
});

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('exams/{id}', [ExamController::class, 'destroy'])->whereNumber('id')->name('exams.destroy');
    Route::get('exam/{exam_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('exams', ExamController::class);
    Route::resource('exam/{exam_id}/questions', QuestionController::class);
    Route::resource('admin_users', UserController::class);
 // Route::get('user_users', [UserController::class,'user_index'])->name('user_users');
});


