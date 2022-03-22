<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;
use App\Models\User;

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
        // $response = Http::post($body, 'https://laravelnotif-default-rtdb.asia-southeast1.firebasedatabase.app/data.json');
        $response = Curl::to('https://laravelnotif-default-rtdb.asia-southeast1.firebasedatabase.app/pulsa.json')
        ->withData( array( $body ) )
        ->asJson( true )
        ->post();
        // notif
        $url = 'https://fcm.googleapis.com/fcm/send';
        $DeviceToekn = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $FcmKey = 'AAAAtBT6v3Q:APA91bHXqUBywXhIYdRNfHIUFfUvXy9SYHgugh63djHH9Rd3AZF6bl_ob4QVpf7k3TSQwGdC4rs_WOX_ShyJVInMsSLGiD2qd8O3mtOO6Zl9kKgKVyKol5M4blQnJNqw-EByN83HvWlc ';
  
        $data = [
            "registration_ids" => $DeviceToekn,
            "notification" => [
                "title" => 'Transaksi Sukses',
                "body" => 'Selamat',  
            ]
        ];

        $RESPONSE = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $FcmKey,
            'Content-Type: application/json',
        ];
    
        // CURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $RESPONSE);

        $output = curl_exec($ch);
        if ($output === FALSE) {
            die('Curl error: ' . curl_error($ch));
        }        
        curl_close($ch);
        dd($output); 
}); 