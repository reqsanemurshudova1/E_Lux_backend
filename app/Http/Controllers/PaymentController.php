<?php
namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        
        
        $validatedData = $request->validate([
            'paymentMethodId' => 'required|exists:payment_methods,id',
            'card_details.cardholderName' => 'required_if:paymentMethodId,1|string|max:255', // Credit Card Only
            'card_details.cardNumber' => 'required_if:paymentMethodId,1|string|max:16',
            'card_details.expirationDate' => 'required_if:paymentMethodId,1|string|max:5',
            'card_details.cvc' => 'required_if:paymentMethodId,1|string|max:4',
            'card_details.postalCode' => 'required_if:paymentMethodId,1|string|max:10',
            'totalAmount' => 'required|numeric|min:0',
            'products' => 'required|array',
            'products.*.id' => 'required|integer',
            'products.*.name' => 'required|string|max:255',
            'products.*.price' => 'required|numeric|min:0',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $paymentMethod = PaymentMethods::find($validatedData['paymentMethodId']);

        
        switch ($paymentMethod->name) {
            case 'PayPal':
               
                break;
            case 'Apple Pay':
          
                break;
            case 'Credit Card':
                $card_details = $validatedData['card_details'];
              
                break;
            default:
                return response()->json(['message' => 'Unsupported payment method'], 400);
        }

     
        $paymentInfo = [
            'payment_method' => $paymentMethod->name,
            'total_amount' => $validatedData['totalAmount'],
            'card_details' => $paymentMethod->name === 'Credit Card' ? json_encode($validatedData['card_details']) : null,
            'products' => json_encode($validatedData['products']),
        ];

        \DB::table('payments')->insert(array_merge($paymentInfo, [
            'created_at' => now(),
            'updated_at' => now(),
        ]));

        return response()->json([
            'status' => 'success',
            'message' => 'Payment processed successfully!',
        ], 200);
    }
    public function getPaymentMethods()
    {
        $methods = PaymentMethods::all();
        return response()->json(['data' => $methods]);
    }
}
