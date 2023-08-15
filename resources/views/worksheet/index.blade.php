<x-app-layout>

<!-- content layouts/app $slot -->

<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hoja de trabajo') }}

            <x-nav-link :href="route('worksheet.create', $project_id )" :active="request()->routeIs('worksheet.create')" class="ml-10" >

                {{ __('Nuevo') }}

            </x-nav-link>
        </h2>
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
             <div class="w-full flex font-bold  border-b dark:border-neutral-500">
                <div class="grid grid-cols-12">

                    <div class=" w-24"> {{'Fecha'}}</div>
                    <div class="pl-5 col-span-8 text-center"> {{ 'Descripcion' }}</div>
                    <div class="text-center"> {{ 'Hora de entrada' }}</div>
                    <div class="text-center"> {{ 'Hora de salida' }}</div>
                    <div class="w-1/2 text-center"> {{ 'Tiempo efectivo' }}</div>

                </div>
                <div class="w-16 "></div>
             </div>
                @foreach ($worksheet as $work)
                        <!--<div class="w-full flex  bg-white drop-shadow hover:drop-shadow-lg hover:opacity-70 rounded-md">-->
                        <div class="w-full flex">



                            <div class="py-6 border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-blue-200">

                                <a href="{{ route('worksheet.show', ['worksheet' => $work->worksheet_id]) }} class="block">

                                    <div class="grid grid-cols-12">

                                        <div class=" w-24"> {{$work->worksheet_date}}</div>
                                        <div class="pl-5 col-span-8"> {{$work->worksheet_description}}</div>
                                        <div class="text-center pl-5"> {{ \Carbon\Carbon::parse($work->worksheet_start_time)->format('H:i') }}</div>
                                        <div class="text-center pl-5"> {{ \Carbon\Carbon::parse($work->worksheet_finish_time)->format('H:i') }}</div>
                                        <div class="w-1/2 text-right"> {{$work->worksheet_effective_time}}</div>

                                    </div>
                                </a>
                            </div>
                            <div class="w-16 flex items-center justify-between">

                                <x-update-button :id="$work->worksheet_id" :route="'worksheet.edit'"/>

                                <!-- Delete modal and button -->
                                <x-deleteModal :id="$work->worksheet_id" :name="$work->worksheet_date" :type="'w'"/>
                            </div>



                        </div>

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

