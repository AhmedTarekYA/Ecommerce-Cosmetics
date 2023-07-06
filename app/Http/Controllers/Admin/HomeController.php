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

// Get the number of users who registered this month
        $currentMonthUserCount = User::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();

// Get the number of users who registered last month
        $lastMonth = Carbon::now()->subMonth();
        $lastMonthUserCount = User::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

// Calculate the percentage change
        if ($lastMonthUserCount > 0) {
            $percentageChange = ($currentMonthUserCount - $lastMonthUserCount) / $lastMonthUserCount * 100;
        } else {
            $percentageChange = 100;
        }

// Round the percentage to two decimal places
        $percentageChange = round($percentageChange, 2);
        $allUserCount = User::count();
        $dataOfOrder = $this->getOrderStatics();
        return view('Admin.index',compact('percentageChange','allUserCount','currentMonthUserCount','dataOfOrder'));
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
