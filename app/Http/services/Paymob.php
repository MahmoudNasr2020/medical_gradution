<?php


namespace App\Http\services;


use App\Models\Order_note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class Paymob
{

    public function credit($price,$first_name,$last_name,$mobile_phone,$email,$address,$notes)
    {
        $token = $this->getToken();
        $order = $this->sendOrder($token,$price);
        $payment_token = $this->getPaymentToken($token,$order->id,$price,$first_name,$last_name,$mobile_phone,$email,$address);
        if($notes != null)
        {
            Order_note::create(['order_id'=>$order->id,'notes'=>$notes]);
        }
        return Redirect::away('https://accept.paymob.com/api/acceptance/iframes/395023?payment_token='.$payment_token);

    }

    public function getToken()
    {
        $response = Http::post('https://accept.paymob.com/api/auth/tokens',[
            'api_key'=>'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2libUZ0WlNJNkltbHVhWFJwWVd3aUxDSndjbTltYVd4bFgzQnJJam94T1RNeE5qaDkuNzNWNzZ5clJqVzBNTE9oRnFFcF9Qejd2cWRuYWVqYURFME94UkR1UVFZR3BhZ3Rwb0V3MERCbmJDLWxuN1MzbWl0V3hzSm9xMzJBX1UySVpUV19ZcFE='
        ]);
        $response = json_decode($response);
        return $response->token;
    }

    public function sendOrder($token,$price)
    {
        $data = [
            'auth_token'=>$token,
            'delivery_needed' => false,
            'amount_cents' => $price,
            'currency' => 'EGP',
            'items' => [],
        ];
        $response = Http::post('https://accept.paymob.com/api/ecommerce/orders',$data);
        return json_decode($response);
    }

    public function getPaymentToken($token,$order_id,$price,$first_name,$last_name,$mobile_phone,$email,$address)
    {
        $billing_data = [
            'apartment' => 8212,
            'email' => $email,
            'floor'=>"NA",
            'first_name' => $first_name,
            'street' => "NA",
            'building' => "NA",
            'phone_number' => $mobile_phone,
            'shipping_method' => "NA",
            'postal_code' => "NA",
            'city' => $address,
            'country' =>"NA",
            'last_name' => $last_name,
            'state' => "NA"
        ];

        $data = [
            'auth_token' => $token,
            'amount_cents' => $price,
            'expiration' => 3600,
            'order_id' => $order_id,
            'billing_data' =>$billing_data,
            'currency' => "EGP",
            'integration_id' => 2193530

        ];

        $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys',$data);
        $response =  json_decode($response);
        return $response->token;
    }


    public function callback($request)
    {

        $data =  $request->all();
         ksort($data);
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];
        $connectedString ='';
        foreach($data as $k=>$v)
        {
            if(in_array($k,$array))
            {
                $connectedString .= $v;
            }
        }
        $secret = 'DE85DFDCCD5DAE9B5C94DB2111B4DADF';
        $hashed = hash_hmac('sha512',$connectedString,$secret);
        if($hashed == $hmac)
        {
            return ['process'=>'secret','total_price'=>$data['amount_cents']/100,'order_id'=>$data['order']];
        }
        return ['process'=>'not_secret'];
    }

}
