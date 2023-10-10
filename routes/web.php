<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\GoogleController;
use App\Models\Employee;
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
    $jumlahpegawai = Employee::count();
    $jumlahpegawaimale = Employee::where('gender','male')->count();
    $jumlahpegawaifemale = Employee::where('gender','female')->count();

    return view('welcome', compact('jumlahpegawai','jumlahpegawaimale','jumlahpegawaifemale'));
})->middleware('auth');



Route::group(['middleware' => ['auth','hakakses:admin']], function(){
    //routing pegawai
    Route::get('/pegawai',[EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');
    });


    
//search pegawai
Route::get('/pegawai/search',[EmployeeController::class, 'search'])->name('search');



//routing crudpegawai
Route::get('/tambahpegawai',[EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata',[EmployeeController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}',[EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[EmployeeController::class, 'updatedata'])->name('updatedata');
Route::get('/deletedata/{id}',[EmployeeController::class, 'deletedata'])->name('deletedata');



//import excel
Route::post('/importexcel',[EmployeeController::class, 'importexcel'])->name('importexcel');
//export pdf
Route::get('/exportpdf',[EmployeeController::class, 'exportpdf'])->name('exportpdf');
//export excel
Route::get('/exportexcel',[EmployeeController::class, 'exportexcel'])->name('exportexcel');



//routing login, logout, dan register
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registerprocess',[LoginController::class, 'registerprocess'])->name('registerprocess');
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginprocess',[LoginController::class, 'loginprocess'])->name('loginprocess');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');



//routing agama
Route::get('/dataagama',[ReligionController::class, 'dataagama'])->name('dataagama')->middleware('auth');
Route::get('/tambahagama',[ReligionController::class, 'tambahagama'])->name('tambahagama');
Route::post('/insertdataagama',[ReligionController::class, 'insertdataagama'])->name('insertdataagama');



//routing login google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');