<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\PatientsController;
use App\Http\Controllers\Patient\PatientDashboard;
use App\Http\Controllers\Patient\ProfileController;
use App\Http\Controllers\Patient\InvoicesController;
use App\Http\Controllers\Patient\PasswordController;
use App\Http\Controllers\Admin\AppointmentsController;
use App\Http\Controllers\Admin\SpecialitiesController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Patient\PatientAppointmentsController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/forgot_password', [ForgotPasswordController::class, 'index'])->name('forgotPassword');

// Patient Dashboard routes

Route::prefix('patient')->group(function () {

    Route::get('/', [PatientDashboard::class, 'index'])->name('patientDashboard');
    Route::get('/appointments', [PatientAppointmentsController::class, 'index'])->name('patientAppointments');
    Route::get('/invoices', [InvoicesController::class, 'index'])->name('patientInvoices');
    Route::get('/profile_settings', [ProfileController::class, 'index'])->name('patientProfile');
    Route::get('/change_password', [PasswordController::class, 'index'])->name('patientChangePassword');
    
});

//  Admin Dashboard Routes

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('/appointments', [AppointmentsController::class, 'index'])->name('admin.appointments');
    Route::get('/doctors', [DoctorsController::class, 'index'])->name('admin.doctors');
    Route::get('/patients', [PatientsController::class, 'index'])->name('admin.patients');
    Route::get('/reviews', [ReviewsController::class, 'index'])->name('admin.reviews');
    Route::get('/specialities', [SpecialitiesController::class, 'index'])->name('admin.specialities');
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('admin.transactions');
    
});
