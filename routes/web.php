<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('users', UserManagementController::class); 
    
    Route::resource('activity-logs', ActivityLogController::class)
    ->only(['index']);

    Route::get('/reports/activity-log', [ReportController::class, 'activityLogPdf'])
    ->name('reports.activity-log');

    Route::get(
        '/reports/users',
        [ReportController::class, 'usersPdf']
    )->name('reports.users');

    Route::get(
        '/reports/branches',
        [ReportController::class, 'branchesPdf']
    )->name('reports.branches');

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::resource('branches', BranchController::class);
});

require __DIR__.'/auth.php';