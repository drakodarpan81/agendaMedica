<?php

namespace App\Livewire\Admin;

use App\Models\Speciality;
use App\Services\AppointmentServices;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;

use function Symfony\Component\Clock\now;

class AppointmentManager extends Component
{
    public $search = [
        'date' => '',
        'hour' => '',
        'speciality_id' => '',
    ];

    public $specialities = [];
    public $availabilities = [];
    public $selectedSchedules = [
        'doctor_id' => '',
        'schedules' => []
    ];
    public $appointment = [
        "patient_id" => '',
        "doctor_id" => '',
        "date" => '',
        "start_time" => '',
        "end_time" => '',
        "duration" => '',
        "reason" => '',
        "status" => ''
    ];

    public function mount()
    {
        $this->specialities = Speciality::all();
        $this->search['date'] = Carbon::now()->hour >= 18
            ? Carbon::now()->addDay()->format("Y-m-d")
            : now()->format('Y-m-d');
    }

    #[Computed()]
    public function hourBlocks()
    {
        return CarbonPeriod::create(
            Carbon::createFromTimeString(config('schedule.start_time')),
            '1 hour',
            Carbon::createFromTimeString(config('schedule.end_time'))
        )->excludeEndDate();
    }

    public function searchAvailability(AppointmentServices $services)
    {
        $this->validate([
            'search.date' => 'required|date|after_or_equal:today',
            'search.hour' => [
                'required',
                'date_format:H:i:s',
                Rule::when($this->search['date'] === now()->format('Y-m-d'), [
                    'after_or_equal:' . now()->format('H:i:s')
                ])
            ]
        ]);

        $this->appointment['date'] = $this->search['date'];

        //Buscar disponibilidad
        $this->availabilities = $services->searchAvailability(...$this->search);
        // dd($this->availability);
    }

    public function render()
    {
        return view('livewire.admin.appointment-manager');
    }
}
