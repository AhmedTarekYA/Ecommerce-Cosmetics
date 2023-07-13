<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

// Get the price of completed orders this month
        $currentMonthSalePrice = Order::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status','completed')
            ->sum('total_price');

// Get the price of completed orders last month
        $lastMonth = Carbon::now()->subMonth();
        $lastMonthSalePrice = Order::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->where('status','completed')
            ->sum('total_price');

// Calculate the percentage change
        if ($lastMonthSalePrice > 0) {
            $percentageChange = ($currentMonthSalePrice - $lastMonthSalePrice) / $lastMonthSalePrice * 100;
        } else {
            $percentageChange = ($currentMonthSalePrice - $lastMonthSalePrice);
        }

// Round the percentage to two decimal places
        $percentageChange = round($percentageChange, 2);
        $monthComplectedOrdersCount = Order::whereMonth('created_at', $currentMonth)
            ->where('status','completed')->whereYear('created_at', $currentYear)->count();
        $monthNewOrdersCount = Order::whereMonth('created_at', $currentMonth)
                ->where('status','new')->whereYear('created_at', $currentYear)->count();
        $dataOfOrder = $this->getOrderStatics();
        $usersCount = User::count();
        return view('Admin.index',compact('usersCount','percentageChange','monthComplectedOrdersCount','monthNewOrdersCount','monthComplectedOrdersCount','currentMonthSalePrice','dataOfOrder'));
    }

    public function getOrderStatics(){
        $currentYear = Carbon::now()->year;

        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count, status,SUM(total_price) AS total_price')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month', 'status')
            ->get();

        $completedOrders = [];
        $acceptedOrders = [];
        $refusedOrders = [];

        foreach ($orders as $order) {
            switch ($order->status) {
                case 'completed':
                    $completedOrders[$order->month] = $order->total_price;
                    break;
                case 'accepted':
                    $acceptedOrders[$order->month] = $order->total_price;
                    break;
                case 'refused':
                    $refusedOrders[$order->month] = $order->total_price;
                    break;
            }
        }


        $months = collect([
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ]);

        $completedData = [];
        $acceptedData = [];
        $refusedData = [];

        foreach ($months as $i => $month) {
            $index = $i + 1;
            $completedData[] = $completedOrders[$index] ?? 0;
            $acceptedData[] = $acceptedOrders[$index] ?? 0;
            $refusedData[] = $refusedOrders[$index] ?? 0;
        }

        return compact('completedData','acceptedData','refusedData');
    }
}
