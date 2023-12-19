<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;



Route::get('/', [SubjectController::class,'index']);
//Route::get('/subjects/create/', [SubjectController::class,'create']);
//Route::post('/subjects/add/', [SubjectController::class,'store']);

//Route::get('/subjects/edit/{id}', [SubjectController::class,'edit']);
//Route::post('/subjects/update/', [SubjectController::class,'update']);

//Route::delete('/subjects/delete/{id}', [SubjectController::class,'destroy'])->name('subject.destroy');

Route::resource('/subjects','\App\Http\Controllers\SubjectController');

Route::resource('/users','\App\Http\Controllers\UserController');

Route::get('/user_subjects/{id}', [UserController::class,'user_subjects']);
Route::get('/user_subjects/add/{id}', [UserController::class,'add_user_subjects']);
Route::post('/user_subjects/post', [UserController::class,'post_user_subjects'])->name('user_subjects.add');
Route::delete('/user_subjects/{user}/delete_subject/{subjects}', [UserController::class, 'delete_user_subjects'])->name('user_delete_subjects');



