<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController; // controller added for chatbot


// route for home page
Route::get('/', function () {
    return view('welcome');
});

// route for BotMan
Route::match(['get', 'post'], '/botman', [BotManController::class, "handle"]);