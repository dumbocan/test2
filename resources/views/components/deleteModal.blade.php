
<!--<div x-data="{  open: false }" x-cloak>
    <button @click="open = true" data-id="{{ $id }}">
        <img class="w-5" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
    </button>

    <div x-show="open" x-cloak
  x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center ">
        <div class="bg-white p-8 rounded-lg shadow-md">

        <p>¿Estás seguro de que deseas eliminar a {{ $name }} con ID {{ $id }}?</p>
            <button @click="open = false" class="px-4 py-2 bg-blue-600 text-white rounded-md">Cancelar</button>
            <button @click="delete" class="px-4 py-2 bg-red-600 text-white rounded-md">Eliminar</button>
        </div>
    </div>
</div>-->

<div x-data="{ open: false, delete: false, recordId: {{$id}} }" x-cloak>
    <button @click="open = true">
        <img class="w-5" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
    </button>

    <div x-show="open" x-cloak x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md">
            <p>¿Estás seguro de que deseas eliminar a {{$name}} con ID {{$id}}?</p>
                      <form x-bind:action="'{{ route('clients.destroy', ['client' => $id]) }}/' " method="POST" >
  <button @click="delete = true" x-on:click=" open = false" class="px-4 py-2 bg-blue-600 text-white rounded-md">Eliminar</button>
                @csrf
                @method('DELETE')
                <button type="submit" style="display: none;"></button>
            </form>
            <button @click="open = false" class="px-4 py-2 bg-red-600 text-white rounded-md">Cerrar</button>
        </div>
    </div>
</div>



