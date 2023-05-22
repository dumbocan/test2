<div class="flex">
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <div class="">
        {{ __('Inicio') }}
            </div>
        </x-nav-link>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('boats.index')" :active="request()->routeIs('boats')">
            {{ __('Barcos') }}
        </x-nav-link>
    </div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')">
            {{ __('Clientes') }}
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
            {{ __('Proyectos') }}
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('management')" :active="request()->routeIs('management')">
            {{ __('Gestion') }}
        </x-nav-link>
    </div>
</div>
