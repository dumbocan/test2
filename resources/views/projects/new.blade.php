
<x-app-layout>

<!-- content layouts/app $slot -->



<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos') }}

        </h2>
    </div>

  <!-- alert success -->

  <x-alert-succes/>

<!-- alert error -->

   <x-alert-error/>

</x-slot>

<div class="flex justify-center mt-28">
        <button class="w-36 h-24 bg-gray-300 hover:bg-gray-200  font-bold rounded-lg mr-20">Buscar cliente</button>
        <button class="w-36 h-24 bg-gray-300 hover:bg-gray-200  font-bold rounded-lg">Crear cliente</button>
    </div>


</x-app-layout>

