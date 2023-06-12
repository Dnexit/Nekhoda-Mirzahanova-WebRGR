<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\DBController;

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

Route::get('/', [MainController::class, 'Main']);

Route::get('/main', [MainController::class, 'Main'])->name('main');

Route::get('/payment', function () {
    return view('payment');
});

Route::post('/reviews', [ReviewsController::class,'AddReview']);
Route::get('/reviews', [ReviewsController::class,'Reviews'])->name('reviews');

Route::post('/trench', [CalcController::class,'Trench']);
Route::get('/trench', function () {
    return view('trench');
});

Route::post('/pit', [CalcController::class,'Pit']);
Route::get('/pit', function () {
    return view('pit');
});

Route::post('/planning', [CalcController::class,'Planning']);
Route::get('/planning', function () {
    return view('planning');
});

Route::post('/terracing', [CalcController::class,'Terracing']);
Route::get('/terracing', function () {
    return view('terracing');
});

Route::post('/hydrodrill', [CalcController::class,'Hydrodrill']);
Route::get('/hydrodrill', function () {
    return view('hydrodrill');
});

Route::post('/foundation_pit', [CalcController::class,'FoundationPit']);
Route::get('/foundation_pit', function () {
    return view('foundation_pit');
});

Route::get('/hydrohammer', function () {
    return view('hydrohammer');
});

Route::get('/price', function () {
    return view('price');
});

Route::get('/logout',[DBController::class,'Logout']);

Route::get('/adminlogout',[DBController::class,'Adminlogout']);

Route::post('/login', [DBController::class,'CreateUser']);
Route::get('/login', function () {
    return view('login', ['login' => 0]);
});

Route::post('/signin', [DBController::class,'Signin']);
Route::get('/signin', function () {
    return view('signin');
});

Route::post('/adminsignin', [DBController::class,'Adminsignin']);
Route::get('/adminsignin', function () {
    return view('adminsignin');
});

Route::get('/adminpanel',[DBController::class,'Adminpanel']);
Route::get('/moderpanel',[DBController::class,'Moderpanel']);

Route::get('/reviews_editor/{id}', [ReviewsController::class,'EditReview']);
Route::get('/reviews_editor/{id}/delete', [ReviewsController::class,'DeleteReview']);
Route::post('/reviews_editor/{id}', [ReviewsController::class,'EditReviewResult']);

Route::post('/moders_editor', [DBController::class,'CreateModerator']);
Route::get('/moders_editor', [DBController::class,'ModeratorEditor'])->name('moders_editor');
Route::get('/moders_editor/{nickname}/delete', [DBController::class,'DeleteModerator']);
