<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\upload;
use Illuminate\Support\Facades\Storage;

Route::post('/upload',upload::class)->middleware('auth');
Route::view('/upload','upload')->middleware('auth');


Route::get('/photo', function () {
    $userFolder = auth()->id();

    $files = Storage::files($userFolder);


    // if (empty($files)) {
    //     abort(404, 'No file found in the storage.');
    // }

    $filePath = $files[0];

    $data = Storage::get($filePath);
    $mimeType = Storage::mimeType($filePath);

    return response($data)->header('Content-Type', $mimeType);
})->middleware('auth');

Route::get('/locale/{locale?}',function($locale='en'){
    App::setLocale($locale);
    return __('hello');
});

Route::get("/setcookie", function () {
    Cookie::queue('name','David',1);
});

Route::get('/getcookie', function () {
    return Cookie::get('name');
});


Route::view("/test",'test');
Route::get('/cart',function(){
    return view('cart');
})->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
