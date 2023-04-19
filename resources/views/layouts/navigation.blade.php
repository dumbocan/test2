<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-21">
            <div class="flex">
                <!-- Logo -->
                <div class="w-20 h-20 mt-2">

                        <x-application-logo  />

                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                     <div class="">
                    {{ __('Inicio') }}
                     </div>
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('boats')" :active="request()->routeIs('boats')">
                        {{ __('Barcos') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('clients')" :active="request()->routeIs('clients')">
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

            <!-- search box -->

            <div class="sm:ml-10 flex items-center justify-center ">
               {{ Form::open(array('route' => 'search', 'method' => 'POST')) }}
                    @csrf
                    <div class="flex border-2 rounded-xl">
                        <input id="search" name="search" type="text" class="px-3 py-1 sm:w-52 w-36 rounded-xl" placeholder="Search...">
                        <button type="submit" class="flex items-center justify-center px-4 border-l" >
                            <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24">
                            <path
                            d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                            </svg>
                        </button>
                    </div>
                 {{ Form::close() }}
            </div>


        <!--    <div class="flex">
                {{ Form::open(array('route' => 'search', 'method' => 'POST')) }}
                    @csrf
                    <x-text-input id="search" name="search" type="text" class=" mt-2 border border-gray-700 w-64" />
                        <button type="submit" >
                            <img src="{{ asset('images/icons/search.svg') }}" class="pt-3  ml-4 w-10">
                        </button>

                {{ Form::close() }}
            </div>


             Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <!-- arrow down icon svg -->
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{ Auth::user()->name }}
        </div>


        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
        </div>


        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('boats')" :active="request()->routeIs('boats')">
                {{ __('Barcos') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('clients')" :active="request()->routeIs('clients')">
                {{ __('Clientes') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('projects')" :active="request()->routeIs('projects')">
                {{ __('Proyectos') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('management')" :active="request()->routeIs('management')">
                {{ __('Gestion') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->


        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
            </x-responsive-nav-link>
        </div>

                <!-- Authentication -->
        <div class="pt-2 pb-3 space-y-1">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>

        </div>
    </div>
</nav>
