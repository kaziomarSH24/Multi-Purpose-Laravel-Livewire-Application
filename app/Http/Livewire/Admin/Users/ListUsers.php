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
    public $user;

    public $showEditModal = false; // For Edit data with same modal

    public function addNew()
    {
        $this->showEditModal = false;  // For Edit data with same modal
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

        // session()->flash('message','User added successfully.'); //for bootstrap alert

        $this->dispatchBrowserEvent('hide-form',['message' => 'User added successfully!']); // "Message" argument for toastr notifacation alert
        
    }

    public function edit(User $user)
    {
        $this->showEditModal = true;  // For Edit data with same modal

        $this->user = $user;
        $this->dispatchBrowserEvent('show-form'); // Show Modal form

        // dd($user->toArray());

        $this->state = $user->toArray();
    }

    public function updateUser()
    {
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|confirmed'
        ])->validate();
        
        
            if(!empty($validatedData['password'])){
                $validatedData['password'] = bcrypt($validatedData['password']);
            }

        $this->user->update($validatedData);

        // session()->flash('message','User updated successfully.'); //for bootstrap alert

        $this->dispatchBrowserEvent('hide-form',['message' => 'User updated successfully!']); // "Message" argument for toastr notifacation alert
    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users',compact('users'));
    }
}
