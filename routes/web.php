<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('index',[
    //     'name' => 'chaiyaporn wama',
    //     'framework' => '<h1 style="color:red;">laravel framework</h1>',
    //     'age' => 20,
    // ]); 


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



