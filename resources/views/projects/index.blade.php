

<x-app-layout>

<!-- content layouts/app $slot -->



<!-- tags -->

<x-slot name="header">
<div class="items-left "> <!-- Añadimos "items-center" para alinear verticalmente -->
        <h2 class="flex font-semibold text-xl text-gray-800 "> <!-- Añadimos "flex-grow" para que el título ocupe todo el espacio disponible -->
            {{ __('Proyectos') }}


        <!-- Settings Dropdown -->
        <!-- Utilizamos "ml-auto" para alinear el dropdown a la derecha -->
            <x-overdropdown align="top" width="60" >
                <x-slot name="trigger">

                    <div class="ml-20">{{ __('Nuevo') }}</div>

                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('clients.create')">
                        {{ __('Nuevo cliente') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link >

                            {{ __('Buscar cliente') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-overdropdown>
                <div class="ml-20">{{ __('En espera') }}</div>
                <div class="ml-20">{{ __('Trabajando') }}</div>
                <div class="ml-20">{{ __('Terminados') }}</div>

        </h2>
</div>
</x-slot>


<div class="bg-blue-200 px-8">
    {{ $projects->links() }}
</div>

<!-- list of boats -->
@foreach ($projects as $project)
    <div class="py-5">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
            <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- butons update and delete-->

                    <div class="grid grid-cols-2 gap-4  float-right">
                        <a href="{{ route('projects.edit', $project->project_id) }}" >
                            <button>
                                <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                            </button>
                        </a>
                        <x-deleteModal :id="$project->project_id" :name="$project->project_number" :type="'p'"/>

                    </div>


            <!-- Mostrar otros detalles del barco según sea necesario -->

                    <!-- client data -->

                    <span class="text-2xl underline underline-offset-2">
                        {{($project->project_number) . (' - ') . Strtoupper($project->boats->boat_name)}}
                    </span>

                    <br>
                    {{ date('d,m,Y', strtotime($project->project_date)) }}
                    <br>
                        {{$project->project_comments}}
                    <br>


                </div>
            </div>
        </div>
    </div>
@endforeach



</x-app-layout>

