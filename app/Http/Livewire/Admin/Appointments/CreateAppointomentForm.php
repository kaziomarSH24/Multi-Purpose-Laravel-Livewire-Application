<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\Client;
use Livewire\Component;

class CreateAppointomentForm extends Component
{
    public $state = [];

    public function createAppointment()
    {
        // dd($this->state);
        $this->state['status'] = 'Open';
        // Date and Time $casts in the App/Models/Appointment for change there type
        Appointment::create($this->state);

        $this->dispatchBrowserEvent('alert',['message' => 'Appointment created successfully']);
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointoment-form',compact('clients'));
    }
}
