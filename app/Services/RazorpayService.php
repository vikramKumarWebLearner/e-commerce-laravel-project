<?php

namespace App\Services;


use Illuminate\Http\Request;

/**
 * Class RazorpayService
 */
class RazorpayService
{
    public $api_key;
    public $sec_key;
    public $url;
    public function __construct()
    {
        if(!empty(config('services.razorpay.key_id')) && !empty(config('services.razorpay.key_secret'))){
            $this->api_key = config('services.razorpay.key_id');
            $this->sec_key = config('services.razorpay.key_secret');
            $this->url     = 'https://api.razorpay.com/v1/orders';
        }
    }


    public function processTransactions(Request $request)
    {
            dd('HEllo');
        if(!empty($this->api_key) && !empty($this->sec_key)){
            
        }
    }

}