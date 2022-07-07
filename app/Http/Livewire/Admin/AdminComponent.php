<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class AdminComponent extends Component
{
    use WithFileUploads;
    use WithPagination; //Use for livewire pagination

    protected $paginationTheme = "bootstrap";
    

}