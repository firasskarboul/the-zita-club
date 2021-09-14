<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return Order::all();
    }

    public function store() {
        request()->validate([
            'orderCode' => 'required',
            'user_id' => 'required',
            'reservation_id' => 'required',
            // 'attendance' => 'required',
        ]);
    
        return Order::create([
            'orderCode' => request('orderCode'),
            'user_id' => request('user_id'),
            'reservation_id' => request('reservation_id'),
            'attendance' => request('attendance')
        ]);
    }

    public function show($orderCode) {
        return Order::where('orderCode', $orderCode)->get();
    }

    public function update(Order $order) {
        request()->validate([
            'orderCode' => 'required',
            'user_id' => 'required',
            'reservation_id' => 'required',
            // 'attendance' => 'required',
        ]);
    
        return $order->update([
            'orderCode' => request('orderCode'),
            'user_id' => request('user_id'),
            'reservation_id' => request('reservation_id'),
            'attendance' => true
        ]);
    }

    public function destroy(Order $order) {
        $success = $order->delete();

        return [
            'success' => $success
        ];
    }
}
