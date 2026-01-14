<div class="flex items-center space-x-2">
    @if ($role->id > 4)
        <x-wire-button href="{{ route('admin.roles.edit', $role) }}" blue xs>
            <i class="fa-solid fa-pen-to-square"></i>
        </x-wire-button>

        <form action="{{ route('admin.roles.destroy', $role) }}" 
              method="POST"
              class="delete-form">
            @csrf

            @method('DELETE')
            <x-wire-button type="submit" red xs>
                <i class="fa-solid fa-trash-can"></i>
            </x-wire-button>
        </form>
    @endif
</div>
