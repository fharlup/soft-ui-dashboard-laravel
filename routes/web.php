<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Models\SalesReport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesReportController;


// Remove ->middleware('auth') if it's there

// Group routes that require authentication
Route::group(['middleware' => 'auth'], function () {

    // Route for the Home page
    Route::get('/', [HomeController::class, 'home']);

    // Route for Dashboard
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route for Billing
    Route::get('billing', function () {
        return view('billing');
    })->name('billing');

    // Route for User Profile
    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    // Route for RTL (Right-to-Left)
    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');

    // Sales Reports Routes probabky u will only use 3
    Route::get('/sales-reports', [SalesReportController::class, 'index'])->name('sales-reports.index');
    Route::get('/sales-reports/create', [SalesReportController::class, 'create'])->name('sales-reports.create');
    Route::post('/sales-reports', [SalesReportController::class, 'store'])->name('sales-reports.store');
    Route::get('/sales-reports/{id}/edit', [SalesReportController::class, 'edit'])->name('sales-reports.edit');
    Route::put('/sales-reports/{id}', [SalesReportController::class, 'update'])->name('sales-reports.update');
    Route::delete('/sales-reports/{id}', [SalesReportController::class, 'destroy'])->name('sales-reports.destroy');

    // Route for Tables
    Route::get('tables', function () {
        return view('tables');
    })->name('tables');

    // Route for Virtual Reality
    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    // Route for Static Sign-in
    Route::get('static-sign-in', function () {
        return view('static-sign-in');
    })->name('sign-in');

    // Route for Static Sign-up
    Route::get('static-sign-up', function () {
        return view('static-sign-up');
    })->name('sign-up');

    // Logout route
    Route::get('/logout', [SessionsController::class, 'destroy']);
    
    // User Profile routes
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    
    // Attendance routes (GET & POST)
    Route::match(['get', 'post'], '/absen', [AttendanceController::class, 'showOrStoreAttendance'])->name('absen');
});

// Group routes that require guests (not logged in users)
Route::group(['middleware' => 'guest'], function () {

    // Registration routes
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    
    // Login routes
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
    
    // Password reset routes
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    //Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('sales-report', SalesReportController::class); //sebenerny g kepake, cuma edit delete ntar error jika dihapus
    });
    
});
