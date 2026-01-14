<x-admin-layout 
title="Agenda médica | Dashboard"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Pruebas',
    ],
]">

{{-- <x-slot name="action">
    Hola mundo
</x-slot> --}}

    <x-wire-button>
        Prueba
    </x-wire-button>
</x-admin-layout>
