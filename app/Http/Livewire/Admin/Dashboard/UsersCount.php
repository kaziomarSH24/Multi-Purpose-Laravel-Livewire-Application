<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;

class UsersCount extends Component
{
    public $usersCount;



    public function mount()
    {
        $this->getUsersCount();
    }

    public function getUsersCount($option = "allMembers")
    {
        // dump($option);
        if($option === "allMembers"){
            $this->usersCount = User::count();
        }elseif($option === "admin" || $option === 'user'){
            $this->usersCount = User::whereRole($option)->count();
        }else{
            $this->usersCount = User::query()
                          ->whereBetween('created_at',$this->getDateRange($option))
                          ->count();
        }
        
    }


    public function getDateRange($option)
    {
        if($option == 'TODAY') {
            return [now()->today(), now()];
        }
        if($option == 'MTD') {
            return [now()->firstOfMonth(), now()];
        }
        if($option == 'YTD') {
            return [now()->firstOfYear(), now()];
        }
        

            return [now()->subDay($option), now()];
    }


    public function render()
    {
        return view('livewire.admin.dashboard.users-count');
    }
}
