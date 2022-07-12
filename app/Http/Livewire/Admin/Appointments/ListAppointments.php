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

    public $status = null;

    protected $queryString = ['status']; //For automatic select the query string in link

    public $searchAppointment = null;

    public $selectedRows = [];

    public $selectPageRows = false;







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

    public function filterAppointmentByStatus($status = null)
    {
        $this->resetPage(); //For fixing page reset date  not showing problem
        $this->status = $status;
        
    }

    public function updatedSelectPageRows($value)   //'updated' is livewire build in houk
    {
        // dd($value); $value return true or false;
        // dd($this->appointments);
        if($value){
            $this->selectedRows = $this->appointments->pluck('id')->map(function ($id){  //this is a computer property
                return (string) $id;
            }); 
        } else{
            $this->reset(['selectedRows','selectPageRows']);
        }
        // dd($this->selectedRows);

    }

    public function getAppointmentsProperty() // Make this computer property
    {
        // dd('here');
        return Appointment::with('client')
                           ->when($this->status, function($query, $status){
                               // dd($status);
                               return $query->where('status', $status);
                           })
                           ->whereHas('client',function(Builder $query){           //whereHas for join with clients table
                               $query->where('name','LIKE','%'.$this->searchAppointment.'%');
                           })
                           ->latest()
                           ->paginate(3);
    }

    public function deleteSelectedRows()
    {
        // dd('here');
        Appointment::whereIn('id',$this->selectedRows)->delete();

        $this->dispatchBrowserEvent('deleted',['message' => 'All selected appointment got deleted.']);

        $this->reset(['selectedRows','selectPageRows']);
    }

    public function markAllAsScheduled()
    {
        Appointment::whereIn('id',$this->selectedRows)->update(['status' => 'SCHEDULED']);

        $this->dispatchBrowserEvent('updated',['message' => 'Appointments marked as scheduled']);

        $this->reset(['selectedRows','selectPageRows']);
    }
    public function markAllAsClosed()
    {
        Appointment::whereIn('id',$this->selectedRows)->update(['status' => 'CLOSED']);

        $this->dispatchBrowserEvent('updated',['message' => 'Appointments marked as closed']);

        $this->reset(['selectedRows','selectPageRows']);
    }

    public function render()
    {
        $appointments = $this->appointments;

        $appointmentsCount = Appointment::count();
        $scheduledAppointmentsCount = Appointment::where('status', 'scheduled')->count();
        $closedAppointmentsCount = Appointment::where('status', 'closed')->count();
        return view('livewire.admin.appointments.list-appointments',compact('appointments','appointmentsCount','scheduledAppointmentsCount','closedAppointmentsCount'));
        
    }
}
