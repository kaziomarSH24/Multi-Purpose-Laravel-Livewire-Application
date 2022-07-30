<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminComponent; //my own component
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ListUsers extends AdminComponent
{
    // public $name;
    // public $email;
    // public $password;
    // public $password_confirmation;


    public $state = []; //All data collected over here
    public $user;

    public $showEditModal = false; // For Edit data with same modal

    public $userIdBeingRemoved = null; //for delete user

    public $searchTerm = null;

    public $photo;

    public function changeRole(User $user, $role)
    {
        Validator::make(['role' => $role],[
            'role' => [
                'required',
                Rule::in(User::ROLE_ADMIN, User::ROLE_USER),
            ],
        ])->validate();
        $user->update(['role' => $role]);

        $this->dispatchBrowserEvent('updated',['message' => "Role changed to {$role} successfully!"]);
    }

    public function addNew()
    {
        //$this->state = []; // Use for form reset
        //$this->photo = ''; //use for image input reset
        $this->reset(); //This is livewire building function. It will reset all field
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

        if($this->photo){
            $validatedData['avatar'] = $this->photo->store('/','avatars');
        }

        User::create($validatedData);

        // session()->flash('message','User added successfully.'); //for bootstrap alert

        $this->dispatchBrowserEvent('hide-form',['message' => 'User added successfully!']); // "Message" argument for toastr notifacation alert
        
    }

    public function edit(User $user)
    {
        $this->reset(); //This is livewire building function. It will reset all field

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

            if($this->photo){

                Storage::disk('avatars')->delete($this->user->avatar); //deleted old images
                $validatedData['avatar'] = $this->photo->store('/','avatars');
            }

        $this->user->update($validatedData);

        // session()->flash('message','User updated successfully.'); //for bootstrap alert

        $this->dispatchBrowserEvent('hide-form',['message' => 'User updated successfully!']); // "Message" argument for toastr notifacation alert
    }

    public function confirmUserRemoval($userID)
    {
        $this->userIdBeingRemoved = $userID;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved)->delete();

        $this->dispatchBrowserEvent('hide-delete-modal',['message' => 'User deleted successfully']);
    }

    public function render()
    {
        // dd($this->searchTerm);
        $users = User::query()
                ->inRandomOrder()
                ->where('name','LIKE','%'.$this->searchTerm.'%')
                ->orWhere('email','LIKE','%'.$this->searchTerm.'%')
                ->latest()
                ->paginate(5);
        return view('livewire.admin.users.list-users',compact('users'));
    }
}
