<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Braintree\Gateway;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    public function index(Request $request) {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function generate(Request $request,Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        
        $data = [
            'success' => true,
            'token' => $token
        ];
        
        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request,Gateway $gateway){

        $order = Order::find($request->order);

        $result = $gateway->transaction()->sale([
            'amount' => $order->total_price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data,401);
        }
    }
}
