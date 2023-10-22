
    <!-- Otro contenido de la vista -->

    <x-app-layout>
        <x-slot name="header">
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-full sm:w-auto mb-4 sm:mb-0">
                    {{ ('Hoja de trabajo de ') . ($worksheet->projects->boats->boat_name) . (' correspondiente al proyecto ') . ($worksheet->projects->project_number) }}
                </div>
            </div>
        </x-slot>
        {!! Form::open(['method' => 'PUT','route' => ['worksheet.update', $worksheet->worksheet_id]]) !!}
            {!! csrf_field() !!}

            <div class = " m-5 lg:ml-5 md:flex flex-wrap justify-center items-center">

                <div class="w-full md:w-36">
                    {!! Form::date('worksheet_date', $worksheet->worksheet_date, ['class' => 'border rounded-md p-2 mb-3 w-full', 'placeholder' => 'fecha de creacion de hoja de trabajo']) !!}
                </div>

                <div class="w-full md:w-1/2">
                    {!! Form::text('worksheet_description', $worksheet->worksheet_description, ['class' => 'border rounded-md p-2 mb-3 w-full', 'placeholder' => 'Descripcion del trabajo']) !!}
                </div>

                    <x-time-calculator :work="$worksheet" name="worksheet" listId="listahorasdeseadas">
                        <x-slot name="options">

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

                        </x-slot>
                    </x-time-calculator>


                </div>

                {!! Form::hidden('project_id', $worksheet->projects->project_id) !!}

                {!! Form::hidden('worksheet_id', $worksheet->worksheet_id) !!}
            <div class = "w-1/3">
                {!! Form::submit('Enviar formulario', ['class' => 'md:ml-20 ml-5 mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
            </div>
        {!! Form::close() !!}

    </x-app-layout>

    <!-- Más contenido de la vista -->



