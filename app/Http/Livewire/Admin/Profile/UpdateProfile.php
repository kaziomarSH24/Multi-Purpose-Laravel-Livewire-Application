<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $image;
    public $state = [];

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

    public function render()
    {
        return view('livewire.admin.profile.update-profile');
    }
}
