<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\CreateAppointomentForm;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Admin\Messages\ListConversationAndMessages;
use App\Http\Livewire\Admin\Profile\UpdateProfile;
use App\Http\Livewire\Admin\Settings\UpdateSetting;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Analytics;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('users', ListUsers::class)->name('users');

Route::get('appointment', ListAppointments::class)->name('appointment');
Route::get('appointment/create', CreateAppointomentForm::class)->name('appointments.create');

Route::get('appointment/{appointment}/edit', UpdateAppointmentForm::class)->name('appointments.edit');

Route::get('profile',UpdateProfile::class)->name('profile.edit');

Route::get('analytics', Analytics::class)->name('analytics');

Route::get('settings',UpdateSetting::class)->name('settings');

Route::get('messages', ListConversationAndMessages::class)->name('messages');