<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/data', function () {
    return view('data');
});
Route::get('/', [StudentController::class, 'show'])->name('index');
Route::get('/home', [StudentController::class, 'home'])->name('home')->middleware('employeemanagementsystem');
Route::get('/aboutus', [UserController::class, 'aboutus'])->name('aboutus')->middleware('employeemanagementsystem');
Route::get('/contactus', [UserController::class, 'contactus'])->name('contactus')->middleware('employeemanagementsystem');
Route::get('/gallery', [StudentController::class, 'index'])->name('gallery')->middleware('employeemanagementsystem');
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registerr', [EmployeeController::class, 'store'])->name('registerr');
Route::get('/create', [StudentController::class, 'create'])->name('create')->middleware('employeemanagementsystem');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/checklogin', [EmployeeController::class, 'index'])->name('checklogin');
Route::get('/sessioncreate', [EmployeeController::class, 'sessioncreate'])->name('sessioncreate');
Route::get('/logout',[EmployeeController::class,'logout']);
Route::get('/student/{sid}/{sname?}', function ($sid, $sname = NULL) {
    echo "Student Id=" . $sid . "<br>Student Name=" . $sname;
})->where(['sid' => '[0-9]+', 'sname' => '[A-Za-z]+']);

// Route::get('/age/{age}', function ($age) {
//     return view();
// });

// Route::get('/session', function () {
//     $session=session()->all();
//     echo '<pre>';
//     print_r($session);
//     echo '</pre>';
// });


Route::get('/checkage', [UserController::class, 'checkagefun'])->middleware('checkage');

// Route::get('/admin', [UserController::class, 'admin']);

Route::prefix('admin')->group(function () {
    route::resource('/student', StudentController::class);
});
