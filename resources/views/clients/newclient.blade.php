<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->
    <x-slot name="header">
        <div class="flex">
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('clients.newclient')" :active="request()->routeIs('clients.newclient')">
                    {{ __('Nuevo') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>


 <!-- Responsive menu -->
    <div class="sm:hidden space-x-8 sm:-my-px sm:ml-10  pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('clients.newclient')" :active="request()->routeIs('clients.newclient')">
            {{ __('Nuevo') }}
        </x-responsive-nav-link>
    </div>

</x-app-layout>
