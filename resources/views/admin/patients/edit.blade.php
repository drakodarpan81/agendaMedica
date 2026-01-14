<x-admin-layout title='Pacientes | Agenda médica' :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Pacientes',
        'href' => route('admin.patients.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">

    <form action="{{ route('admin.patients.update', $patient) }}" method="POST">

        @csrf
        @method('PUT')

        <x-wire-card class="mb-8">
            <div class="lg:flex lg:justify-between lg:items-center">

                <div class="flex items-center space-x-5">
                    <img src="{{ $patient->user->profile_photo_url }}"
                        class="h-20 w-20 rounded-full object-cover object-center" alt="{{ $patient->user->name }}">

                    <div>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $patient->user->name }}
                        </p>
                        <p class="text-sm font-semibold text-gray-500">
                            CURP: {{$patient->user->curp ?? 'N/A'}}
                        </p>
                    </div>
                </div>

                <div class="flex space-x-3 mt-6 lg:mt-0">
                    <x-wire-button outline gray href="{{ route('admin.patients.index') }}">
                        Volver
                    </x-wire-button>

                    <x-wire-button type="submit" primary>
                        <i class="fa-solid fa-check"></i>
                        Guardar cambios</x-wire-button>
                </div>
            </div>

        </x-wire-card>

        {{-- Tabs --}}
        <x-wire-card>

            <x-tabs active="datos-personales">

                <x-slot name="header">

                    <x-tab-link tab="datos-personales">
                        <i class="fa-solid fa-user me-2"></i>
                        Datos personales
                    </x-tab-link>
                    <x-tab-link tab="antecedentes">
                        <i class="fa-solid fa-file-lines me-2"></i>
                        Antecedentes
                    </x-tab-link>
                    <x-tab-link tab="informacion-general">

                        <i class="fa-solid fa-info me-2"></i>
                        Información general
                    </x-tab-link>
                    <x-tab-link tab="contacto-emergencia">

                        <i class="fa-solid fa-heart me-2"></i>
                        Contacto de emergencia
                    </x-tab-link>
                    
                </x-slot>


                {{-- Datos personales --}}
                <x-tab-content tab="datos-personales">
                    <x-wire-alert info class="mb-4" title="Edición de usuario">
                        <p>Para editar está información, dirigete al <a
                                href="{{ route('admin.users.edit', $patient->user) }}" class="#5EC954 hover:underline"
                                target ="_blank">perfil de usuario</a> asociado
                            a este paciente</p>
                    </x-wire-alert>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <span class="text-gray-500 font-semibold text-sm">Teléfono:</span>
                            <span class="text-gray-900 text-sm ml-1">{{ $patient->user->phone }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 font-semibold text-sm">Email:</span>
                            <span class="text-gray-900 text-sm ml-1">{{ $patient->user->email }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 font-semibold text-sm">Dirección:</span>
                            <span class="text-gray-900 text-sm ml-1">{{ $patient->user->address }}</span>
                        </div>
                    </div>
                </x-tab-content>

                {{-- Antecedentes --}}
                <x-tab-content tab="antecedentes">
                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-wire-textarea label="Alergias conocidas:" name="allergies">
                                {{ old('allergies', $patient->allergies) }}
                            </x-wire-textarea>
                        </div>

                        <div>
                            <x-wire-textarea label="Enfermedades cronicas:" name="chronic_conditions">
                                {{ old('chronic_conditions', $patient->chronic_conditions) }}
                            </x-wire-textarea>
                        </div>

                        <div>
                            <x-wire-textarea label="Antecedentes quirúrgicos:" name="sirgical_history">
                                {{ old('sirgical_history', $patient->sirgical_history) }}
                            </x-wire-textarea>
                        </div>

                        <div>
                            <x-wire-textarea label="Antecedentes familiares:" name="family_history">
                                {{ old('family_history', $patient->family_history) }}
                            </x-wire-textarea>
                        </div>
                    </div>
                </x-tab-content>

                {{-- Información general --}}
                <x-tab-content tab="informacion-general">
                    <x-wire-native-select label="Tipo de sangre:" class="mb-4" name="blood_type_id">
                        <option value="">Selecciona un tipo de sangre...</option>
                        @foreach ($bloodTypes as $bloodType)
                            <option value="{{ $bloodType->id }}" @selected($bloodType->id === $patient->blood_type_id)>
                                {{ $bloodType->name }}</option>
                        @endforeach
                    </x-wire-native-select>

                    <x-wire-textarea label="Observaciones" name="observations">
                        {{ old('observations', $patient->observations) }}
                    </x-wire-textarea>
                </x-tab-content>

                {{-- Contacto emergencia --}}
                <x-tab-content tab="contacto-emergencia">
                    <div class="space-y-4">
                        <div class="space-y-4">
                            <x-wire-input label="Nombre de contacto:" icon="user" name="emergency_contact_name"
                                value="{{ old('emergency_contact_name', $patient->emergency_contact_name) }}">
                            </x-wire-input>
                            <x-wire-input icon="device-phone-mobile" label="Teléfono de contacto:"
                                name="emergency_contact_phone"
                                value="{{ old('emergency_contact_phone', $patient->emergency_contact_phone) }}">
                            </x-wire-input>
                            <x-wire-input icon="users" label="Relación de contacto:"
                                name="emergency_contact_relationship"
                                value="{{ old('emergency_contact_relationship', $patient->emergency_contact_relationship) }}">
                            </x-wire-input>
                        </div>
                    </div>
                </x-tab-content>
                </x-tab>
        </x-wire-card>


    </form>

</x-admin-layout>
