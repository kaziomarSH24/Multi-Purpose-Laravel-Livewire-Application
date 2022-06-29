<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListUsers extends Component
{
    // public $name;
    // public $email;
    // public $password;
    // public $password_confirmation;

    public $state = []; //All data collected over here

    public function addNew()
    {
        $this->dispatchBrowserEvent('show-form'); // Show Modal form
    }

    public function createUser()
    {
       $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        session()->flash('message','User added successfully.'); //for bootstrap alert

        $this->dispatchBrowserEvent('hide-form',['message' => 'User added successfully!']); // "Message" argument for toastr notifacation alert
        return redirect()->back();
        
    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users',compact('users'));
    }
}
