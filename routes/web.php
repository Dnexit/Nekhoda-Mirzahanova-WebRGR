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


Route::post('/dress', [CalcController::class,'dress']);
Route::get('/dress', function () {
    return view('dress');
});

Route::post('/top', [CalcController::class,'Top']);
Route::get('/top', function () {
    return view('top');
});

Route::post('/socks', [CalcController::class,'Socks']);
Route::get('/socks', function () {
    return view('socks');
});

Route::post('/hoodie', [CalcController::class,'hoodie']);
Route::get('/hoodie', function () {
    return view('hoodie');
});

Route::post('/pants', [CalcController::class,'Pants']);
Route::get('/pants', function () {
    return view('pants');
});

Route::post('/tee-shirt', [CalcController::class,'TeeShirt']);
Route::get('/tee-shirt', function () {
    return view('tee-shirt');
});

Route::get('/jeans', function () {
    return view('jeans');
});

Route::get('/fabrics', function () {
    return view('fabrics');
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
    return redirect()->back();
});

Route::get('/adminpanel',[DBController::class,'Adminpanel']);
Route::get('/moderpanel',[DBController::class,'Moderpanel']);

Route::get('/reviews_editor/{id}', [ReviewsController::class,'EditReview']);
Route::get('/reviews_editor/{id}/delete', [ReviewsController::class,'DeleteReview']);
Route::post('/reviews_editor/{id}', [ReviewsController::class,'EditReviewResult']);

Route::post('/moders_editor', [DBController::class,'CreateModerator']);
Route::get('/moders_editor', [DBController::class,'ModeratorEditor'])->name('moders_editor');
Route::get('/moders_editor/{nickname}/delete', [DBController::class,'DeleteModerator']);
