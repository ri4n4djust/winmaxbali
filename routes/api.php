<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::any('/callback', function (Request $request) {
    // $data = file_get_contents('php://input');
    // dd($request->all());
    // $data = $request->all();
    // $arr = json_decode($data, true);
    // echo $arr ;
    $contents = $request->getContent();
    $requests = json_decode($contents);

}); 