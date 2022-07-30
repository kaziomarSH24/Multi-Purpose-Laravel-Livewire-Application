<?php
// <!-- Create Command: php artisan make:export AppointmentsExport -->
namespace App\Exports;

use App\Models\Appointment;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppointmentsExport implements FromQuery, WithMapping, WithHeadings   //remove FromCollection to FromQuery;
{
   use Exportable;

    protected $selectedRows;

    public function __construct($selectedRows)
    {
        $this->selectedRows = $selectedRows;

        // dd($this->selectedRows);
    }


    public function map($appointment): array
    {
        return[
            $appointment->id,
            $appointment->client->name,
            $appointment->date,
            $appointment->time,
            $appointment->status,
        ];
    }
    
    public function headings(): array
    {
        return[
            '#ID',
            'Client Name',
            'Date',
            'Time',
            'Status',
        ];
    }
    
    public function query()   //collection replace by query
    {
        return Appointment::with('client:id,name')->whereIn('id',$this->selectedRows);
    }
}
