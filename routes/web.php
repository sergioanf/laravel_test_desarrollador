<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\LocationController;

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

/* Rutas de Location */ 
Route::controller(LocationController::class)->group(function(){
    Route::get("locations", "index")->name("locations.index");
    Route::get("locations/crear", "create")->name("locations.create");
    Route::post("locations", "store")->name("locations.store");
    Route::get("locations/{location}/edit", "edit")->name("locations.edit"); 
    Route::get("locations/{location}", "show")->name("locations.show");
    Route::put("locations/{location}/edit", "update")->name("locations.update");
    Route::delete("locations/{character}", "destroy")->name("locations.destroy");
    
});