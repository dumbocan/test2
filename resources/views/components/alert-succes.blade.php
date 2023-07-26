@if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}.</span>
        </div>
    </div>
@endif


