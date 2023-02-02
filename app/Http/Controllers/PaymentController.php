<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pays;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        return view("page.payment");
    }

    public function verify(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$request->transaction_id}/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-3cc17f8f3c882e1a306b88940f07c814-X"
            ),
            
        ));
        $response = curl_exec($curl);

        //    { examlpe of value i will call in student when pass real user value $customeraddress->name =  $user->name;
        // in the $student_id get the user model and use it to call out in the studentid that will help to pass the value once the payment is done}

        $student_id = 'umeh';
        $student_name = 'umehonyedika0@gmail.com';
        $student_amount = $request->amount;
        $student_number = '09032491755';

        $booking = new Pays;
        $booking->name = $student_id;
        $booking->email = $student_name;
        $booking->amount =  $student_amount;
        $booking->number = $student_number;
        $booking->save();
        curl_close($curl);
        $res = json_decode($response);
        return [$res];
        return response()->json(['bool' => true]);
    }
}
