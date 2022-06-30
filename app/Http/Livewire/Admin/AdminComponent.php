<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class AdminComponent extends Component
{
    use WithPagination; //Use for livewire pagination

    protected $paginationTheme = "bootstrap";
    

}