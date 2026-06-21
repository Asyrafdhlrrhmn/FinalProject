<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Branch;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Core System
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Sales Report
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        $sales = Sale::query()

            ->when($start, function ($q) use ($start) {
                $q->whereDate(
                    'transaction_date',
                    '>=',
                    $start
                );
            })

            ->when($end, function ($q) use ($end) {
                $q->whereDate(
                    'transaction_date',
                    '<=',
                    $end
                );
            })

            ->latest()
            ->get();

        return view(
            'reports.index',
            compact('sales')
        );
    }

    public function pdf(Request $request)
    {
        $sales = Sale::query()

            ->when($request->start_date, function ($q) use ($request) {
                $q->whereDate(
                    'transaction_date',
                    '>=',
                    $request->start_date
                );
            })

            ->when($request->end_date, function ($q) use ($request) {
                $q->whereDate(
                    'transaction_date',
                    '<=',
                    $request->end_date
                );
            })

            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'reports.pdf',
            compact('sales')
        );

        return $pdf->download(
            'laporan-penjualan.pdf'
        );
    }
}