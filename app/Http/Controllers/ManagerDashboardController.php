<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        $totalSales = Sale::sum('total_amount');

        $salesPerBranch = Sale::select(
                'branches.name',
                DB::raw('SUM(total_amount) as total')
            )
            ->join('branches','sales.branch_id','=','branches.id')
            ->groupBy('branches.name')
            ->get();

        $lowStocks = Product::where('stock','<=',10)
            ->with('branch')
            ->get();

        return view('manager.dashboard',compact(
            'totalSales',
            'salesPerBranch',
            'lowStocks'
        ));
    }
}