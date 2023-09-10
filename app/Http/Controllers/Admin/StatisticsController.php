<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function year(int $restaurantId) {
        $restaurant = Restaurant::findOrFail($restaurantId);
        $orders = Restaurant::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(orders.payment_date) as month_name"))
            ->where('restaurant_id', $restaurantId)
            ->leftJoin('orders', 'restaurants.id', '=', 'orders.restaurant_id')
            ->whereYear('payment_date', date('Y'))
            ->groupBy(DB::raw("MONTH(orders.payment_date)"), DB::raw("MONTHNAME(orders.payment_date)"))
            ->pluck('count', 'month_name');

        $labels = $orders->keys();
        $data = $orders->values();

        return view('admin.statistics.index', compact('restaurant', 'labels', 'data'));
    }

    public function months(int $restaurantId, Request $request) {
        $restaurant = Restaurant::findOrFail($restaurantId);
        $month = $request->input('month');
        $year = date('Y'); // Ottieni l'anno corrente
    
        $ordersQuery = DB::table('orders')
            ->select(DB::raw('DAY(payment_date) as day'), DB::raw('COUNT(*) as count'))
            ->where('restaurant_id', $restaurantId)
            ->whereYear('payment_date', $year);
    
        if ($month) {
            $ordersQuery->whereMonth('payment_date', $month);
        }
    
        $orders = $ordersQuery->groupBy(DB::raw('DAY(payment_date)'))
            ->orderBy(DB::raw('DAY(payment_date)'))
            ->pluck('count', 'day');
    
        $labels = $orders->keys();
        $data = $orders->values();

        dd($labels, $data);
    
        return view('admin.statistics.months', compact('restaurant', 'labels', 'data'));
    }
    

}
