<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class UpdateSetting extends Component
{
    public $state = [];

    public function mount()
    {
        $settings = Setting::first();
        // dd($settings);
        if($settings){
            $this->state =  $settings->toArray();
        }
    }

    public function updateSetting()
    {
        // dd($this->state);
        $settings = Setting::first();
        if($settings){
            $settings->update($this->state);
        }else{
            Setting::create($this->state);
        }

        Cache::forget('setting');  // from Helpers.php file
        

        $this->dispatchBrowserEvent('updated',['message'=> 'Settings updated successfully']);
    }
    public function render()
    {
        return view('livewire.admin.settings.update-setting');
    }
}
