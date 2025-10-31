<?php

use App\Models\Pet;
use Illuminate\Support\Facades\Route;

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
// Welcome.
Route::view('/', 'welcome')->name('home');

// Battle.
Route::view('/battle', 'battle')->name('battle');

// Rankings.
Route::get('/rankings', function () {
    $pets = Pet::query()
        ->withCount('likes')
        ->orderByDesc('likes_count')
        ->orderBy('name')
        ->get();

    return view('rankings', compact('pets'));
})->name('rankings');

// API Calls
Route::get('/pets', function () {
    return Pet::all();
});
