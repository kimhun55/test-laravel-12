<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;

// ports
Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/post/home', [PostController::class, 'index'])->name('posts.index');
Route::get('post/show/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/post/store', [PostController::class, 'store'])->name('posts.store');
Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/post/update/{post}', [PostController::class, 'update'])->name('posts.update');


Route::get('/', function () {
    $name = 'chaiyaporn wama';
    $framework = '<h1 style="color:red;">laravel framework</h1>';
    return view('index',compact('name','framework'));

})->name('home');


Route::get('/page1', function () {
    return view('page1'); 
})->name('page1');


Route::get('/page2', function () {
    return view('page2'); 
})->name('page2');



