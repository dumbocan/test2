<x-app-layout>

<!-- content layouts/app $slot -->

<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hoja de trabajo') }}

            <x-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')" class="ml-10" >

                {{ __('Nuevo') }}

            </x-nav-link>
        </h2>
    </div>

    <!-- alert success -->
    <x-alert-succes/>

    <!-- alert error -->
    <x-alert-error/>


</x-slot>













</x-app-layout>

