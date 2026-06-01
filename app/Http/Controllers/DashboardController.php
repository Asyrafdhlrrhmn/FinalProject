<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role === 'owner') {

            $totalBranches = Branch::count();
            $totalUsers = User::count();

            $recentActivities = ActivityLog::with('user')
                ->latest()
                ->take(5)
                ->get();

            return view('dashboard.owner', compact(
                'totalBranches',
                'totalUsers',
                'recentActivities'
            ));
        }

        return match ($role) {
            'manager' => view('dashboard.manager'),
            'supervisor' => view('dashboard.supervisor'),
            'cashier' => view('dashboard.cashier'),
            'warehouse' => view('dashboard.warehouse'),
            default => abort(403)
        };
    }
}