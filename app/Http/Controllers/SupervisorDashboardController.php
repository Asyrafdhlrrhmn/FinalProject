<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\ActivityLog;

class SupervisorDashboardController extends Controller
{
    public function index()
    {
        $latestTransactions = Sale::latest()
            ->take(10)
            ->get();

        $activities = ActivityLog::latest()
            ->take(10)
            ->get();

        return view(
            'supervisor.dashboard',
            compact(
                'latestTransactions',
                'activities'
            )
        );
    }
}