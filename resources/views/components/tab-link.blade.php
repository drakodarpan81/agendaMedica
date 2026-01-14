@props(['tab' => 'default'])

<li class="me-2">
    <a href="#" x-on:click="active='{{$tab}}'"
        :class="{
            'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active group': active === '{{$tab}}',
            'inline-flex items-center justify-center p-4 border-b border-transparent rounded-t-base hover:text-fg-brand hover:border-brand group': active !== '{{$tab}}'
        }"
        aria-current="page">
        {{$slot}}
    </a>
</li>
