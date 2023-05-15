<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/aboutus', [UserController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [UserController::class, 'contactus'])->name('contactus');
Route::get('/gallery', [UserController::class, 'gallery'])->name('gallery');
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/student/{sid}/{sname?}', function ($sid, $sname = NULL) {
    echo "Student Id=" . $sid . "<br>Student Name=" . $sname;
})->where(['sid' => '[0-9]+', 'sname' => '[A-Za-z]+']);

Route::get('/age/{age}', function ($age) {
    return view();
});

Route::get('/checkage', [UserController::class, 'checkagefun'])->middleware('checkage');

// Route::get('/admin', [UserController::class, 'admin']);

Route::prefix('admin')->group(function () {
    route::resource('/student', StudentController::class);
});