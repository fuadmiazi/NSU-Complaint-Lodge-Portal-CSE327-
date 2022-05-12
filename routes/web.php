<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleAuthController;

use App\Http\Controllers\MasterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/redirects',[MasterController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/google',[GoogleAuthController::class,'redirectToGoogle']);

Route::get('auth/google/callback',[GoogleAuthController::class,'handleGoogleCallback']);

// Route::get('usertype', function(){
//     return view('usertype');
// });

// Route::post('/updateuser/{google_id}',[GoogleAuthController::class,'updateUserType']);

// Route::get('studentsdashboard', function(){
//     return view('students.dashboard');
// });

// Route::get('/',[MasterController::class,'index']);

// Route::get('/redirect',[MasterController::class,'redirect']);


Route::post('/lodgeComplaints',[MasterController::class,'lodgeComplaints']);

Route::get('/updateStatus/{id}',[MasterController::class,'updateStatus']);

Route::get('/mycomplaints',[MasterController::class,'myComplaints']);

Route::get('/dashboard/action', [MasterController::class,'action'])->name('dashboard.action');

