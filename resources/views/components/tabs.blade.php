@props(['active' => 'default'])

<div x-data="{
    active: '{{ $active }}',
}">

    @isset($header)
        <div class="border-b border-default">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-body">
                {{ $header }}
            </ul>
        </div>
    @endisset

    <div class="px-4 mt-4">
        {{ $slot }}
    </div>

</div>
