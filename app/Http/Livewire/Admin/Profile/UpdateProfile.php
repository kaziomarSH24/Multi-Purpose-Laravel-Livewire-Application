<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $image;

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

    protected function cleanupOldUploads()  //Livewire tmp file delete automatically
    {
    
        $storage = Storage::disk('local');

        // dd($storage->allFiles('livewire-tmp'));

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (! $storage->exists($filePathname)) continue;

            $yesterdaysStamp = now()->subSecond(10)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.profile.update-profile');
    }
}
