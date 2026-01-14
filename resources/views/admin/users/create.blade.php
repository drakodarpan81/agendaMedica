<x-admin-layout title='Usuarios | Agenda médica' :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'href' => route('admin.users.index'),
    ],
    [
        'name' => 'Nuevo usuario',
    ],
]">

    <x-wire-card>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="space-y-4">
                <div class="grid lg:grid-cols-2 gap-4">
                    <x-wire-input name="name" label="Nombre" placeholder="Ingresa el nombre del usuario" required
                        :value="old('name')" />
                    <x-wire-input name="email" label="Correo electrónico" type="email"
                        placeholder="Ingresa el email del usuario" required :value="old('email')" />
                    <x-wire-input name="password" label="Contraseña" type="password"
                        placeholder="Ingresa la contraseña del usuario" required />
                    <x-wire-input name="password_confirmation" label="Confirmar contraseña" type="password"
                        placeholder="Confirma la contraseña del usuario" required />
                    <x-wire-input name="curp" label="CURP" placeholder="CURP del usuario" required
                        :value="old('curp')" />
                    <x-wire-input name="phone" label="Teléfono" placeholder="Teléfono del usuario" required
                        :value="old('phone')" />
                </div>
                <x-wire-input name="address" label="Dirección" placeholder="Dirección del usuario" required
                    :value="old('address')" />

                    <x-wire-native-select label="Rol" name="rol_id">
                        <option value="">
                            Selecciona un rol
                        </option>

                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}"
                                @selected(old('role_id')==$rol->id)
                            >
                                {{ $rol->name }}
                            </option>
                        @endforeach
                    </x-wire-native-select>

                    <div class="flex justify-end">
                        <x-wire-button type="submit">
                            Guardar
                        </x-wire-button>
                    </div>
            </div>

        </form>
    </x-wire-card>

</x-admin-layout>
