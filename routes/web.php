<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\SupervisorDashboardController;
use App\Http\Controllers\CashierDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StockMovementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Dashboard Role
    |--------------------------------------------------------------------------
    */

    Route::get('/manager/dashboard',
        [ManagerDashboardController::class, 'index']
    )->middleware('role:manager')
     ->name('manager.dashboard');

    Route::get('/supervisor/dashboard',
        [SupervisorDashboardController::class, 'index']
    )->middleware('role:supervisor')
     ->name('supervisor.dashboard');

    Route::get('/cashier/dashboard',
        [CashierDashboardController::class, 'index']
    )->middleware('role:cashier')
     ->name('cashier.dashboard');

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->middleware('role:owner');

    /*
    |--------------------------------------------------------------------------
    | Master Data
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'branches',
        BranchController::class
    )->middleware('role:owner');

    Route::resource(
        'users',
        UserManagementController::class
    )->middleware('role:owner');

    Route::resource(
        'products',
        ProductController::class
    )->middleware(
        'role:owner,manager,supervisor,warehouse'
    );

    /*
    |--------------------------------------------------------------------------
    | Transactions
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'transactions',
        TransactionController::class
    )->middleware(
        'role:owner,manager,cashier'
    );

    /*
    |--------------------------------------------------------------------------
    | Stock Movement
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/stock-movements',
        [StockMovementController::class, 'index']
    )
    ->middleware(
        'role:owner,manager,supervisor,warehouse'
    )
    ->name('stock-movements.index');

    Route::get(
        '/stock-movements/create',
        [StockMovementController::class, 'create']
    )
    ->middleware(
        'role:owner,manager,supervisor,warehouse'
    )
    ->name('stock-movements.create');

    Route::post(
        '/stock-movements',
        [StockMovementController::class, 'store']
    )
    ->middleware(
        'role:owner,manager,supervisor,warehouse'
    )
    ->name('stock-movements.store');

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reports/sales',
        [ReportController::class, 'index']
    )
    ->middleware('role:owner,manager')
    ->name('reports.sales');

    Route::get(
        '/reports/sales/pdf',
        [ReportController::class, 'pdf']
    )
    ->middleware('role:owner,manager')
    ->name('reports.sales.pdf');

    Route::get(
        '/reports/users',
        [ReportController::class, 'usersPdf']
    )
    ->middleware('role:owner')
    ->name('reports.users');

    Route::get(
        '/reports/branches',
        [ReportController::class, 'branchesPdf']
    )
    ->middleware('role:owner')
    ->name('reports.branches');

    Route::get(
        '/reports/activity-log',
        [ReportController::class, 'activityLogPdf']
    )
    ->middleware('role:owner')
    ->name('reports.activity-log');

    /*
    |--------------------------------------------------------------------------
    | Activity Log
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'activity-logs',
        ActivityLogController::class
    )
    ->only(['index'])
    ->middleware('role:owner');
});

require __DIR__.'/auth.php';