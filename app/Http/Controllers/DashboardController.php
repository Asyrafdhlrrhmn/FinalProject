<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        return match ($role) {

            'owner' => $this->ownerDashboard(),

            'manager' => view('dashboard.manager'),
            'supervisor' => view('dashboard.supervisor'),
            'cashier' => view('dashboard.cashier'),
            'warehouse' => view('dashboard.warehouse'),

            default => abort(403)
        };
    }

    private function ownerDashboard()
    {
        $stats = [

            'users' => User::count(),

            'branches' => Branch::count(),

            'logs' => ActivityLog::count(),

            'manager' => User::where('role','manager')->count(),

            'supervisor' => User::where('role','supervisor')->count(),

            'cashier' => User::where('role','cashier')->count(),

            'warehouse' => User::where('role','warehouse')->count(),
        ];

        $roleChart = [

            User::where('role', 'owner')->count(),

            User::where('role', 'manager')->count(),

            User::where('role', 'supervisor')->count(),

            User::where('role', 'cashier')->count(),

            User::where('role', 'warehouse')->count(),
        ];

        $activities = ActivityLog::with('user')
            ->latest()
            ->take(5)
            ->get();

        
        $activityLabels = [];
        $activityData = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = Carbon::now()->subDays($i);

            $activityLabels[] = $date->format('D');

            $activityData[] = ActivityLog::whereDate(
                'created_at',
                $date->format('Y-m-d')
            )->count();
        }

        return view(
            'dashboard.owner',
            compact(
                'stats',
                'activities',
                'roleChart',
                'activityLabels',
                'activityData'
            )
        );
    }
}