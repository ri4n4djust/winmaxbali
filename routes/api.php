<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

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
    $body1 = $request->getContent();
    // $path = $request->path();
    $body =json_decode($body1); 
    // $ref_id = $body->data->ref_id; //access key
    DB::table('pulsa')->insert([
        'ref_id' => $body->data->ref_id,
        'price' => $body->data->price,
        'message' => $body->data->message,
        'status' => $body->data->status
    ]);
    // echo $requests;
        Storage::disk('local')->put('pulsa', $body1);
        $data = file_get_contents('php://input');
        $my_file = 'pulsa1.json';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        fwrite($handle, $data);
        fclose($handle);
    // Session::put('pulsa', $body1);
        $response = Http::post($body, 'https://laravelnotif-default-rtdb.asia-southeast1.firebasedatabase.app/data.json');
        
}); 