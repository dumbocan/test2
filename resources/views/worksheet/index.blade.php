<x-app-layout>

<!-- content layouts/app $slot -->

<!-- tags -->

<x-slot name="header">
    <div class="grid grid-cols-3 gap-4 lg:grid lg:grid-cols-5 lg:gap-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hoja de trabajo') }}
        </h2>
        <x-nav-link :href="route('worksheet.create', $project_id )" :active="request()->routeIs('worksheet.create')" class="ml-10 text-xl col-span-2 lg:col-span-1" >

            {{ __('Nuevo') }}

        </x-nav-link>

        <p >
            Proyecto: {{ $project_id }}
        </p>

        <p >
            Total horas efectivas: {{ $totalEffectiveTime }}
        </p>

        <p >
            Registros: {{ $totalDays }}
        </p>

    </div>



    <!-- alert success -->
    <x-alert-succes/>

    <!-- alert error -->
    <x-alert-error/>


</x-slot>
<div class="bg-blue-200 px-8">
<!-- Generar enlaces de paginación con parámetros -->
{{ $worksheet->appends(['project' => $project_id])->links() }}
</div>

<div class="group py-5">
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-2 ">
        <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="w-full flex font-bold border-b dark:border-neutral-500">
                    <div class="lg:grid lg:grid-cols-12 lg:gap-8 grid grid-cols-5 ">
                        <div class="pl-5 w-24 hidden sm:block"> {{ 'Fecha' }}</div>
                        <div class="pl-5 col-span-4 lg:col-span-8 text-center hidden sm:block"> {{ 'Descripcion' }}</div>
                        <div class="hidden sm:block">{{'Hora de entrada'}}</div>
                        <div class="hidden sm:block">{{'Hora de salida'}}</div>
                        <div class="hidden sm:block">{{'Tiempo efectivo'}}</div>
                    </div>
                </div>
                @foreach ($worksheet as $work)
                    <a href="{{ route('worksheet.show', ['worksheet' => $work->worksheet_id]) }}"
                       class="block py-6 border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-blue-200">
                       <div class="lg:grid lg:grid-cols-12 lg:gap-8 grid grid-cols-5 ">
                            <div class="w-24 text-center">
                                <label class="lg:hidden font-bold border-b dark:border-neutral-500">{{ 'Fecha' }}</label>
                                <div>{{ date('d,m,Y', strtotime($work->worksheet_date)) }}</div>
                            </div>
                            <div class="pl-5 col-span-4 lg:col-span-8 text-center">
                                <label class="lg:hidden w-full font-bold border-b dark:border-neutral-500"> {{ 'Descripcion' }}</label>
                                <div class="text-left">{{ $work->worksheet_description }}</div>
                            </div>
                            <div class="lg:mt-0 text-center mt-4 ">
                                <label class=" lg:hidden w-full font-bold border-b dark:border-neutral-500" > {{ 'H entrada' }}</label>
                                {{ \Carbon\Carbon::parse($work->worksheet_start_time)->format('H:i') }}
                            </div>
                            <div class="text-center mt-4 lg:mt-0  col-start-3 lg:col-auto">
                                <label class="  lg:hidden w-full font-bold border-b dark:border-neutral-500"> {{ 'H salida' }}</label>
                                 {{ \Carbon\Carbon::parse($work->worksheet_finish_time)->format('H:i') }}

                            </div>
                            <div class="col-start-5 lg:col-auto text-center mt-4 lg:mt-0">
                                <label class="  lg:hidden w-full font-bold border-b dark:border-neutral-500"> {{ 'T efectivo' }}</label>
                                <div>{{$work->worksheet_effective_time}}</div>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>





        <!--    <div class="col-span-1 flex items-center justify-end">
                <div class="flex space-x-2">


                    <a href="{{ route('worksheet.edit', $work->project_id) }}">
                        <button>
                            <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Update Icon">
                        </button>
                    </a>
-->

                    <!-- Delete modal and button -->
                  <!--   <x-deleteModal :id="$work->worksheet_id" :name="$work->worksheet_date" :type="'w'"/>
                </div>
            </div>
            -->

</x-app-layout>

