<x-admin-layout 
title='Pacientes | Agenda médica'
:breadcrumbs="[
    [
        'name'=> 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name'=>'Pacientes'
    ],
]">

    @livewire('admin.datatables.patient-table')

</x-admin-layout>
