<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateAppointomentForm extends Component
{
    public $state = [
        'status' => 'SCHEDULED'
    ];

    public function createAppointment()
    {
        // dd($this->state);
        Validator::make($this->state,[

            'client_id' => 'required',
            'members' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required|in:SCHEDULED,CLOSED',
        ],
        [
            'client_id.required' => 'This client field is required',
            'date.required' => 'This appointment date field is required',
            'time.required' => 'This appointment time field is required',
        ])->validate();
        // dd($this->state);
        // Date and Time $casts in the App/Models/Appointment for change there type
        Appointment::create($this->state);

        $this->dispatchBrowserEvent('alert',['message' => 'Appointment created successfully']);
        $this->reset();
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointoment-form',compact('clients'));
    }
}
