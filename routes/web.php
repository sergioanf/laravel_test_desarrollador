<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

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


/* Rutas de Character */ 
Route::controller(CharacterController::class)->group(function(){
    Route::get("characters", "index")->name("characters.index");
    Route::get("characters/crear", "create")->name("characters.create");
    Route::post("characters", "store")->name("characters.store");
    Route::get("characters/{character}/edit", "edit")->name("characters.edit"); 
    Route::get("characters/{character}", "show")->name("characters.show");
    Route::put("characters/{character}/edit", "update")->name("characters.update");
    Route::delete("characters/{character}", "destroy")->name("characters.destroy");
    
});