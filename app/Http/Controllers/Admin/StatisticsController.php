<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index() {
        $orders = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(views.date) as month_name"))
            // ->where('apartment_id', $order_id)
            // ->leftJoin('views', 'apartments.id', '=', 'views.apartment_id')
            ->whereYear('orders.payment_date', date('Y'))
            ->groupBy(DB::raw("MONTH(orders.payment_date)"), DB::raw("MONTHNAME(orders.payment_date)"))
            ->pluck('count', 'month_name');

        $monthsLabels = $orders->keys();
        $monthValues = $orders->values();

        // $months = $this->viewsByMonthAndDay($order)->values();

        // Calculate the maximum month views
        // $maxMonthViews = $months->max(function ($collection) {
        //     return $collection->flatten()->sum();
        // });

        return view('admin.statistics.index', compact('monthsLabels', 'monthValues'));
    }
}
