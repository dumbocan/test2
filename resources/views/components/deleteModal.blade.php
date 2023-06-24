@props(['id', 'name', 'type'])

<div x-data="{
        open: false,
        name: '{{$name}}',
        type: '{{$type}}',
        deleteUrl: '',
        getDeleteUrl() {
            if (this.type === 'c') {
                return '{{ route('clients.destroy', ['client' => $id]) }}';
            } else if (this.type === 'b') {
                return '{{ route('boats.destroy', ['boat' => $id]) }}';
            } else if (this.type === 'p') {
                return '{{ route('projects.destroy', ['project' => $id]) }}';
            }
        }
    }" x-cloak>
    <button @click="open = true; deleteUrl = getDeleteUrl()" x-bind:data-id="$id">
        <img class="w-7" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
    </button>
    <div x-show="open" x-cloak x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center" style="position: fixed; z-index: 9999;">

        <div class="fixed inset-0 flex items-center justify-center">
            <div class="bg-white p-7 rounded-lg shadow-md">
                <p>¿Estás seguro de que deseas eliminar a {{$name}} con ID {{$id}}?</p>
                <div class="flex justify-end mt-4">
                    <form x-bind:action="deleteUrl" method="POST">
                        <button @click="open = false" class="px-4 py-2 bg-blue-600 text-white rounded-md mr-2">Eliminar</button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="display: none;"></button>
                    </form>
                    <button @click="open = false" class="px-4 py-2 bg-red-600 text-white rounded-md">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
