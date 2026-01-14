@php
    $links = [
        [
            'name' => 'Dashbord',
            'icon' => 'fa-solid fa-gauge',
            'href' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Gestión',
        ],
        [
            'name' => 'Roles y permisos',
            'icon' => 'fa-solid fa-shield-halved',
            'href' => route('admin.roles.index'),
            'active' => request()->routeIs('admin.roles.*'),
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'href' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
        ],
        [
            'name' => 'Pacientes',
            'icon' => 'fa-solid fa-user-injured',
            'href' => route('admin.patients.index'),
            'active' => request()->routeIs('admin.patients.*'),
        ],
        [
            'name' => 'Doctores',
            'icon' => 'fa-solid fa-user-doctor',
            'href' => route('admin.doctors.index'),
            'active' => request()->routeIs('admin.doctors.*'),
        ],
        [
            'name' => 'Citas médicas',
            'icon' => 'fa-solid fa-calendar-check',
            'href' => route('admin.appointments.index'),
            'active' => request()->routeIs('admin.appointments.*'),
        ],

        // [
        //     'name' => 'Dashbord',
        //     'icon' => 'fa-solid fa-gauge',
        //     'href' => route('admin.dashboard'),
        //     'active' => false,
        //     'submenu' => [
        //         [
        //             'name_sub' => 'Nombre 123',
        //             'href' => '#',
        //             'active' => false,
        //             'icon_sub' => 'fa-solid fa-angle-right',
        //         ],
        //     ],
        // ],
    ];
@endphp

<aside id="top-bar-sidebar"
    class="fixed top-14 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0 bg-white"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">
        {{-- <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3" alt="Flowbite Logo" />
                <span class="self-center text-lg text-heading font-semibold whitespace-nowrap">Flowbite</span>
            </a> --}}
        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase">
                            {{ $link['header'] }}
                        </div>
                    @else
                        @isset($link['submenu'])
                            @foreach ($link['submenu'] as $submenu)
                                <button id="dropdownNvbarButton" data-dropdown-toggle="dropdownNavbar"
                                    class="flex items-center justify-between w-full py-2 px-3 rounded font-medium text-heading md:w-auto hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">
                                    {{ $link['name'] }}
                                    <span class="w-6 h-6 inline-flex justify-center items-center">
                                        <i class="{{ $submenu['icon_sub'] }}"></i>
                                    </span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar"
                                    class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownNvbarButton">
                                        <li>
                                            <a href="#"
                                                class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">{{ $submenu['name_sub'] }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <a href="{{ $link['href'] }}"
                                class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group text-gray-500 group {{ $link['active'] ? 'bg-gray-50' : '' }}">

                                <span class="w-6 h-6 inline-flex justify-center items-center">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="ms-3">{{ $link['name'] }}</span>
                            </a>
                        @endisset
                    @endisset
                </li>
            @endforeach

        </ul>
    </div>
</aside>
