<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index() {
        $orders = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(orders.payment_date) as month_name"))
            // ->where('apartment_id', $order_id)
            // ->leftJoin('views', 'apartments.id', '=', 'views.apartment_id')
            ->whereYear('orders.payment_date', date('Y'))
            ->groupBy(DB::raw("MONTH(orders.payment_date)"), DB::raw("MONTHNAME(orders.payment_date)"))
            ->pluck('count', 'month_name');

        $labels = $orders->keys();
        $data = $orders->values();

        $months = $this->ordersByMonthAndDay()->values();

        $maxMonthOrders = $months->max(function ($collection) {
            return $collection->flatten()->sum();
        });

        // $months = $this->viewsByMonthAndDay($order)->values();

        // Calculate the maximum month views
        // $maxMonthViews = $months->max(function ($collection) {
        //     return $collection->flatten()->sum();
        // });

        return view('admin.statistics.index', compact('labels', 'data', 'maxMonthOrders'));
    }

    public function ordersByMonthAndDay()
    {
        $orders = DB::table('orders')
            ->selectRaw('YEAR(payment_date) as year, MONTH(payment_date) as month, DAY(payment_date) as day, COUNT(*) as count')
            ->groupBy(DB::raw('YEAR(payment_date), MONTH(payment_date), DAY(payment_date)'))
            ->get();
        $ordersByMonthAndDay = collect([]);
        foreach ($orders as $order) {
            $year = $order->year;
            $month = $order->month;
            $day = $order->day;
            $count = $order->count;
            $monthName = date('F', mktime(0, 0, 0, $month, 1, $year)); // Get month name from the numeric month
            // Initialize the month data if it doesn't exist
            if (!$ordersByMonthAndDay->has($monthName)) {
                $ordersByMonthAndDay[$monthName] = collect([]);
            }
            // Add the daily views to the month's collection
            $ordersByMonthAndDay[$monthName][$day] = $count;
        }
        return $ordersByMonthAndDay;
    }
}
