<?php

namespace MyCustomPayment\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;

class PaymentController extends Controller
{
    public function processPayment(Request $request, Response $response)
    {
        $data = $request->all();
        // Process payment data
        // Validate the payment data and perform necessary actions
        return $response->json(['status' => 'success', 'message' => 'Payment processed successfully']);
    }
}
