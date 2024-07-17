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
use App\Http\Controllers\Doctor\DoctorDashboard;
use App\Http\Controllers\Patient\PatientAppointmentsController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/auth/login', [LoginController::class, 'index'])->name('account.login');
Route::post('/auth/user/login', [LoginController::class, 'login2'])->name('login.user');

Route::get('/auth/logout', [LoginController::class, 'logout'])->name('account.logout');

Route::get('/auth/register', [RegisterController::class, 'index'])->name('account.register');
Route::post('/auth/register/user', [RegisterController::class, 'register'])->name('account.registerUser');

Route::get('/auth/forgot_password', [LoginController::class, 'forgotPassword'])->name('account.forgotPassword');
Route::post('/auth/forgot_password/send_password_reset_link', [LoginController::class, 'sendResetPasswordLink'])->name('account.sendResetPasswordLink');
Route::get('/auth/reset_password/{token}', [LoginController::class, 'resetPassword'])->name('password.reset');
Route::post('/auth/reset_password/password/update', [LoginController::class, 'updatePassword'])->name('password.change');

// Patient Dashboard routes

Route::middleware(['auth'])->prefix('patient')->group(function () {

    Route::get('/', [PatientDashboard::class, 'index'])->name('patientDashboard');
    Route::get('/appointments', [PatientAppointmentsController::class, 'index'])->name('patientAppointments');
    Route::get('/doctor/{doctorId}/available-times', [PatientAppointmentsController::class, 'getAvailableTimes']);
    Route::post('/appointments', [PatientAppointmentsController::class, 'storeAppointment'])->name('appointments.store');
    Route::get('/invoices', [InvoicesController::class, 'index'])->name('patientInvoices');
    Route::get('/profile_settings', [ProfileController::class, 'index'])->name('patientProfile');
    Route::put('/profile_update', [ProfileController::class, 'update'])->name('patientProfileUpdate');
    Route::get('/profile', [PasswordController::class, 'index'])->name('patientChangePassword');
});

Route::middleware(['auth'])->prefix('doctor')->group(function () {

    Route::get('/', [DoctorDashboard::class, 'index'])->name('doctorDashboard');
    Route::get('/appointments', [DoctorDashboard::class, 'appointments'])->name('doctor.appointments');
    Route::get('/reviews', [DoctorDashboard::class, 'reviews'])->name('doctor.reviews');
});

//  Admin Dashboard Routes

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    Route::get('/appointments', [AppointmentsController::class, 'index'])->name('admin.appointments');
    Route::get('/doctors', [DoctorsController::class, 'index'])->name('admin.doctors');
    Route::post('/doctors', [DoctorsController::class, 'addDoctor'])->name('admin.addDoctor');
    Route::get('/patients', [PatientsController::class, 'index'])->name('admin.patients');
    Route::get('/reviews', [ReviewsController::class, 'index'])->name('admin.reviews');
    Route::get('/specialities', [SpecialitiesController::class, 'index'])->name('admin.specialities');
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('admin.transactions');
});
