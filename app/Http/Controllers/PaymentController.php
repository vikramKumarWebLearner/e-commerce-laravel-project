<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payment;

    public function __construct(PaymentGateway $payment)
    {
        $this->payment = $payment;
    }

    public function processTransaction(Request $request)
    {
        return $this->payment->processTransaction($request);
    }

    public function successTransaction(Request $request)
    {
        return $this->payment->successTransaction($request);
    }

    public function cancelTransaction(Request $request)
    {
        return $this->payment->cancelTransaction($request);
    }
}
