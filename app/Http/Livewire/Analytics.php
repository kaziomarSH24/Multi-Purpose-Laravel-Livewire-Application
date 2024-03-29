<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Analytics extends Component
{

    public $days = [];

    public $subscribers = [30,40,35,50,49,60,70,91,125,205,556];

    public $recentSubscribers = 556;

    public function mount()
    {
        $this->days = collect(range(13,24))->map(function($number) {
            return 'jun' . $number;
        });

        // dd($this->days);
    }

    public function fetchData()
    {
        // $this->recentSubscribers += 10;
        $subscribers = array_replace($this->subscribers, [10 => $this->recentSubscribers += 10]);
        // dd($subscribers);

        $this->emit('refreshChart', ['seriesData' => $subscribers]);
    }

    public function render()
    {
        return view('livewire.analytics')->layout('layouts.realtime');
    }
}
