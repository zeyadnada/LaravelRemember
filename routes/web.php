<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;


Route::view('/', 'home');
Route::view('/contact', 'contact');

// Clasic Job Routes Style //
// Route::get('/jobs', [JobController::class, 'index']);
// Route::get('jobs/create' ,[JobController::class, 'create']);
// // any wildcard routes like jobs/{id} should come after specific routes like jobs/create to avoid conflicts.
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::post('/jobs' , [JobController::class, 'store']);
// Route::get('/jobs/{job}/edit',[JobController::class, 'edit']);
// Route::patch('/jobs/{job}',[JobController::class, 'update']);
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Job  Routes (easy clear Style) using Route::controller() //
// Route::controller(JobController::class)->group(function(){
//   Route::get('/jobs', 'index');
//   Route::get('jobs/create' ,'create');
//   Route::get('/jobs/{job}','show');
//   Route::post('/jobs' , 'store');
//   Route::get('/jobs/{job}/edit','edit');
//   Route::patch('/jobs/{job}','update');
//   Route::delete('/jobs/{job}','destroy');
// });

//  Authentication Routes  //
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//  Job Resourse Routes  //

// only index and show will be opened to anyone because there are hasn't any Gates/policy or Middlewares
Route::resource('jobs', JobController::class)->only(['edit', 'update','delete'])->middleware(['auth', 'can:edit,job']);
// the other job routes will able to authenticated person (because of auth middleware) and authorized person (the Gate/policy we create)
Route::resource('jobs', JobController::class)->except(['edit', 'update','delete']);