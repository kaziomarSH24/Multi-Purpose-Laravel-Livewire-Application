<?php

namespace App\Http\Livewire\Admin\Profile;

use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $image;
    public $state = [];


    public function mount()
    {
        $this->state = auth()->user()->only(['name','email']);
    }

    public function updatedImage()
    {
        // dd($this->image);
        $path = $this->image->store('/','avatars');
        if($this->image){
            Storage::disk('avatars')->delete(auth()->user()->avatar); //deleted old images
            auth()->user()->update(['avatar' => $path]);
        }

        $this->dispatchBrowserEvent('updated',['message' => 'Profile image changed successfully!']);
    }


    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        $updater->update(auth()->user(), [
            'name' => $this->state['name'],
            'email' => $this->state['email'],
        ]);

        $this->emit('nameChanged', auth()->user()->name);

        $this->dispatchBrowserEvent('updated',['message' => 'Profile updated Successfully!']);
    }


    public function changePassword(UpdatesUserPasswords $updater)
    {
      /*  $updater->update(auth()->user(), [
            'current_password' => $this->state['current_password'] ?? '',
            'password' => $this->state['password'] ?? '',
            'password_confirmation' => $this->state['password_confirmation'] ?? '',
        ]);
        $this->reset();
        */


        /** Refactoring code */
        $updater->update(
            auth()->user(),
          $attr = Arr::only($this->state, ['current_password','password','password_confirmation'])
        );
        
     /*   collect($attr)->map(function ($value, $key){
            $this->state[$key] = '';
        }); */
        collect($attr)->map(fn ($value, $key) => $this->state[$key] = ''); //this is short form...

        $this->dispatchBrowserEvent('updated',['message' => 'Password changed Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.profile.update-profile');
    }
}
