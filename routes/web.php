<?php

use App\Http\Controllers\DemoController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [DemoController::class, 'DemoAction']);
Route::get('/hello/{name}/{age}', [DemoController::class, 'parameter']);
Route::post('/hello', [DemoController::class, 'json'])->withoutMiddleware(ValidateCsrfToken::class);

Route::post('/header', [DemoController::class, 'data_pass_header'])->withoutMiddleware(ValidateCsrfToken::class);

Route::post('/data/{name}/{age}', [DemoController::class, 'data_pass_header_and_body'])->withoutMiddleware(ValidateCsrfToken::class)->withoutMiddleware(ValidateCsrfToken::class);

Route::post('/multipart-form-data',[DemoController::class, 'multipart_form_data'])->withoutMiddleware(ValidateCsrfToken::class);

Route::post('/photo',[DemoController::class, 'photo_upload'])->withoutMiddleware(ValidateCsrfToken::class);
