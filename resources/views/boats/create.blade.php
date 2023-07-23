<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->
<x-slot name="header">
        <div class="flex">
            <div class="hidden text-lg font-bold space-x-8 sm:-my-px sm:ml-13 sm:flex">
                    {{ __('Crear nueva embarcación') }}

            </div>
        </div>
    </x-slot>


 <!-- Responsive menu -->
    <div class="sm:hidden text-lg font-bold space-x-8 sm:-my-px sm:ml-13 pl-5 pt-2 pb-3 space-y-1">
            {{ __('Crear nueva embarcación') }}
    </div>

<x-alert-succes/>

<x-alert-error/>

{!! Form::open(['route' => 'boats.store', 'class' => 'mt-7 mx-10 flex flex-col justify-center ']) !!}
    {!! csrf_field() !!}

    <div class="grid sm:grid-cols-2 gap-4 ">
        <div>
            {!! Form::text('boat_name', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Nombre embarcacion']) !!}
        </div>

        <div>
            {!! Form::text('boat_marina', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Marina']) !!}
        </div>

        <div>
            {!! Form::text('boat_type', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Tipo de embarcacion']) !!}
        </div>




    </div>
    {!! Form::text('boat_comments', null, ['class' => 'border rounded-md p-2 w-full mt-5', 'placeholder' => 'Comentarios de embarcacion']) !!}
    {!! Form::hidden('client_id', $client_id) !!}


    {!! Form::submit('Enviar', ['class' => 'mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}

{!! Form::close() !!}



</x-app-layout>
