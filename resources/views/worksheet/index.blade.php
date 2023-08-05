<x-app-layout>

<!-- content layouts/app $slot -->

<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hoja de trabajo') }}

            <x-nav-link :href="route('worksheet.create', $worksheet -> project_id )" :active="request()->routeIs('worksheet.create')" class="ml-10" >

                {{ __('Nuevo') }}

            </x-nav-link>
        </h2>
    </div>

    <!-- alert success -->
    <x-alert-succes/>

    <!-- alert error -->
    <x-alert-error/>


</x-slot>


@foreach ($worksheets as $worksheet)
    <div class="group py-5">
            <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
                <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <!-- butons update and delete -->
                        <div>
                            <div class="grid grid-cols-2 gap-4 float-right">
                                <a href="{{ route('worksheet.edit', $worksheet->project_id) }}">
                                    <button>
                                        <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                    </button>
                                </a>
                                <!-- delete modal and buton -->
                                @if($client->boats->isEmpty())
                                    <x-deleteModal :id="$worksheet->worksheet_id" :name="$workshet->worksheet_date" :type="'w'"/>
                                @endif
                            </div>
                        </div>
                        <div >
                        <a href="{{ route('worksheet.show', ['worksheet' => $worksheet->worksheet_id]) }}" class="block">

                            <!-- client data -->
                            <span class="text-2xl underline underline-offset-2">
                                {{$worksheet->worksheet_date}}
                            </span>
                            <br>
                            {{$worksheet->worksheet_description}}
                            <br>
                            {{($worksheet->worksheet_start_time).(' , ').($worksheet->worksheet_finish_time).( ' , ').($worksheet->worksheet_effective_time).( ' , ')}}

                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endforeach












</x-app-layout>

                  <!--      <option value='07:00'></option>
                        <option value='07:30'></option>
                        <option value='08:00'></option>
                        <option value='07:00'></option>
                        <option value='07:30'></option>
                        <option value='08:00'></option>
                        <option value='08:30'></option>
                        <option value='09:00'></option>
                        <option value='09:30'></option>
                        <option value='10:00'></option>
                        <option value='10:30'></option>
                        <option value='11:00'></option>
                        <option value='11:30'></option>
                        <option value='12:00'></option>
                        <option value='12:30'></option>
                        <option value='13:00'></option>
                        <option value='13:30'></option>
                        <option value='14:00'></option>
                        <option value='14:30'></option>
                        <option value='15:00'></option>
                        <option value='15:30'></option>
                        <option value='16:00'></option>
                        <option value='16:30'></option>
                        <option value='17:00'></option>
                        <option value='17:30'></option>
                        <option value='18:00'></option>
                        <option value='18:30'></option>
                        <option value='19:00'></option>
                        <option value='19:30'></option>
                        <option value='20:00'></option>
                        <option value='20:30'></option>
                        <option value='21:00'></option>
                        <option value='21:30'></option>
                        <option value='22:00'></option>
                        <option value='22:30'></option> -->
