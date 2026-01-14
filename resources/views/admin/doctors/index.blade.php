<x-admin-layout title='Doctores | Agenda médica' :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Doctores',
    ],
]">

    @livewire('admin.datatables.doctor-table')

</x-admin-layout>
