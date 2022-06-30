<?php

namespace App\Http\Livewire\Admin\Appointment;

use App\Http\Livewire\Admin\AdminComponent; //my own component

class ListAppointments extends AdminComponent
{
    public function render()
    {
        return view('livewire.admin.appointment.list-appointments');
    }
}
