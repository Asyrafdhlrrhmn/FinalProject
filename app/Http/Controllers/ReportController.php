<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Branch;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function activityLogPdf()
    {
        $logs = ActivityLog::with('user')
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'reports.activity-log-pdf',
            compact('logs')
        );

        return $pdf->download('activity-log.pdf');
    }

    public function usersPdf()
    {
        $users = User::with('branch')
            ->orderBy('name')
            ->get();

        $pdf = Pdf::loadView(
            'reports.users-pdf',
            compact('users')
        );

        return $pdf->download('data-user.pdf');
    }

    public function branchesPdf()
    {
        $branches = Branch::orderBy('name')
            ->get();

        $pdf = Pdf::loadView(
            'reports.branches-pdf',
            compact('branches')
        );

        return $pdf->download('data-cabang.pdf');
    }
}