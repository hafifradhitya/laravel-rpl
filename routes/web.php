<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;

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

// url, [controller,function]
Route::middleware(['auth'])->group(function(){
    Route::get("home",[AppController::class,"home"]);
    Route::get("about", [AppController::class,"about"]);
    Route::get("data", [AppController::class,"data"]);
    Route::get("login", [AppController::class,"login"]);
    Route::get("tambah-data", [AppController::class, "tambah_data"]);
    Route::post("proses-tambah-data", [AppController::class, "proses_tambah_data"]);
    Route::get("data/{id}/hapus", [AppController::class, "proses_hapus_data"]);
    Route::post("proses-edit-data", [AppController::class, "proses_edit_data"]);
    Route::get("data/{id}/edit", [AppController::class, "edit_data"]);
});


Route::get("/", [AppController::class,"login"])->name("login");
Route::post("proses-login", [AuthController::class, "proses_login"]);
Route::get("logout", [AuthController::class, "proses_logout"]);
