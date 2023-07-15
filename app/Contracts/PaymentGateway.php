<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface PaymentGateway
{
    public function createTransaction();

    public function processTransaction(Request $request);

    public function successTransaction(Request $request);

    public function cancelTransaction(Request $request);
}
