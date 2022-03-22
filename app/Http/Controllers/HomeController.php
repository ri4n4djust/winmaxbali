<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function saveDeviceToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['Token stored.']);
    }
  
    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $DeviceToekn = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $FcmKey = 'AAAAtBT6v3Q:APA91bHXqUBywXhIYdRNfHIUFfUvXy9SYHgugh63djHH9Rd3AZF6bl_ob4QVpf7k3TSQwGdC4rs_WOX_ShyJVInMsSLGiD2qd8O3mtOO6Zl9kKgKVyKol5M4blQnJNqw-EByN83HvWlc ';
  
        $data = [
            "registration_ids" => $DeviceToekn,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
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
    }
}
