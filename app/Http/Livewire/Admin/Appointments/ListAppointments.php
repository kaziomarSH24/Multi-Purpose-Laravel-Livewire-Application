<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent; //my own component
use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;

class ListAppointments extends AdminComponent
{
    protected $listeners = ['deleteConfirmed' => 'deleteAppointment']; //'deleteConfirmed' listen from js code

    public $appointmentIdBeingRemoved = null;

    public $searchAppointment = null;

    public function confirmAppointmentRemobval($appointmentId)
    {
        // dd($appointmentId);
        $this->appointmentIdBeingRemoved = $appointmentId;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteAppointment()
    {
        $appointment = Appointment::findOrFail($this->appointmentIdBeingRemoved);

        $appointment->delete();

        $this->dispatchBrowserEvent('deleted',['message' => 'Appointment deleted successfully']);
    }

    public function render()
    {
        $appointments = Appointment::with('client')
                        ->whereHas('client',function(Builder $query){           //whereHas for join with clients table
                            $query->where('name','LIKE','%'.$this->searchAppointment.'%');
                        })
                        ->latest()
                        ->paginate();
                        // dd($appointments);
        return view('livewire.admin.appointments.list-appointments',compact('appointments'));
    }
}
