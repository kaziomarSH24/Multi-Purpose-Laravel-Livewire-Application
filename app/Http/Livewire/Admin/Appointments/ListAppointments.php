<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent; //my own component
use App\Models\Appointment;

class ListAppointments extends AdminComponent
{
    public function render()
    {
        $appointments = Appointment::with('client')
                        ->latest()
                        ->paginate();
        return view('livewire.admin.appointments.list-appointments',compact('appointments'));
    }
}
