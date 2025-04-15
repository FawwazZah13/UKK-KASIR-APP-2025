<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });

//ROUTE USER
Route::get('/dashboard', function(){
    return view('dashboard');
});
