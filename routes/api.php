<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/album', [App\Http\Controllers\masterController::class, 'indexAlbum']);
// Route::post('/callback', [App\Http\Controllers\masterController::class, 'callback']);
Route::post('/callback', function (Request $request) {
    $body = $request->getContent();
    // $path = $request->path();
    $body =json_decode($body); 
    // $ref_id = $body->data->ref_id; //access key
    DB::table('pulsa')->insert([
        'ref_id' => $body->data->price,
        'price' => $body->data->price,
        'message' => $body->data->message,
        'status' => $body->data->status
    ]);
    // echo $requests;
}); 