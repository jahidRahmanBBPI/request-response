<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PersonController;
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

Route::post('/ip',[DemoController::class, 'read_ip_address'])->withoutMiddleware(ValidateCsrfToken::class);

Route::post('/cookie',[DemoController::class, 'cookie_set'])->withoutMiddleware(ValidateCsrfToken::class);

Route::post('/multi_return_Type',[DemoController::class, 'return_type'])->withoutMiddleware(ValidateCsrfToken::class);

Route::post('/JsonResponse',[DemoController::class, 'json_return'])->withoutMiddleware(ValidateCsrfToken::class);

Route::get('/route1', [DemoController::class, 'redirect_response']);
Route::get('/route2', [DemoController::class, 'redirect_response2']);


Route::get('/file_binary', [DemoController::class, 'res_File_Binary']);
Route::get('/file_download', [DemoController::class, 'res_file_download']);


Route::get('cookieResponse', [DemoController::class, 'cookie_response']);

Route::get('headerResponse', [DemoController::class, 'response_header']);

Route::get('viewResponse', [DemoController::class, 'response_view']);

// LCH-1
Route::get("person/{name?}", [PersonController::class, "getPerson"])->whereAlpha("name");
Route::get("person/{name?}", [PersonController::class, "getPerson"])->whereAlphaNumeric("name");
Route::get("/personid/{id?}", [PersonController::class, "getPersonById"])->whereNumber("id");

//person/jahid/account/123
// Route::get("/person/{name}/account/{accountId}", [PersonController::class,"personAccount"]);  // Without condition.
Route::get("/person/{name}/account/{accountId}", [PersonController::class,"personAccount"])->whereAlpha("name")->whereNumber("accountId");

// Query string
// http://127.0.0.1:8000/queryString/Jahid?display=Video&limit=10
// http://127.0.0.1:8000/queryString/Jahid?limit=10
// http://127.0.0.1:8000/queryString/Jahid
// http://127.0.0.1:8000/queryString/Jahid?limit=20&display=accounts&page=2
Route::post('/queryString/{name}',[PersonController::class, 'query_string'])->withoutMiddleware(ValidateCsrfToken::class);

Route::get("person/{name}/account/{accountId}", [PersonController::class,"createAPerson"])->withoutMiddleware(ValidateCsrfToken::class);

Route::get("/persons",[PersonController::class, "person_form"]);
Route::post("/persons",[PersonController::class, "createAPerson"])->withoutMiddleware(ValidateCsrfToken::class);

// Route::post("/api/persons", [ApiController::class,"createAPerson"])->withoutMiddleware(ValidateCsrfToken::class);