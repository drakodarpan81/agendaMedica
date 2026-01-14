<x-admin-layout 
title='Pacientes | Agenda médica'
:breadcrumbs="[
    [
        'name'=> 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name'=> 'Pacientes',
        'href' => route('admin.patients.index'),
    ],
    [
        'name'=>'Nuevo'
    ],
]">

{{-- <x-slot name="action">
<x-wire-button blue href="{{route('admin.roles.create')}}">
    <i class="fa-solid fa-plus"></i>
    Nuevo
</x-wire-button>
</x-slot>
@livewire('admin.datatables.role-table') --}}

</x-admin-layout>
