<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\Carbon;

class CashierDashboardController extends Controller
{
    public function index()
    {
        $todaySales = Sale::whereDate(
            'transaction_date',
            Carbon::today()
        )->count();

        $transactions = Sale::latest()
            ->take(10)
            ->get();

        return view(
            'dashboard.cashier',
            compact(
                'todaySales',
                'transactions'
            )
        );
    }
}