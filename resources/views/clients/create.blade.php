<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->
    <x-slot name="header">
        <div class="flex">
            <div class="hidden text-lg font-bold space-x-8 sm:-my-px sm:ml-13 sm:flex">
                    {{ __('Crear nuevo cliente') }}

            </div>
        </div>
    </x-slot>


 <!-- Responsive menu -->
    <div class="sm:hidden text-lg font-bold space-x-8 sm:-my-px sm:ml-13 pl-5 pt-2 pb-3 space-y-1">
            {{ __('Crear nuevo cliente') }}
    </div>


{!! Form::open(['route' => 'clients.store', 'class' => 'mtola-7 mx-10 flex flex-col justify-center ']) !!}
    {!! csrf_field() !!}

    <div class="grid sm:grid-cols-2 gap-4 mt-5 ">
        <div>
            {!! Form::text('client_name', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Nombre']) !!}
        </div>

        <div>
            {!! Form::text('client_street', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Dirección']) !!}
        </div>

        <div>
            {!! Form::text('client_pc', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Codigo postal']) !!}
        </div>

        <div>
            {!! Form::text('client_city', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Ciudad']) !!}
        </div>

        <div>
            {!! Form::text('client_country', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Pais']) !!}
        </div>

        <div>
            {!! Form::text('client_telephone', null, ['class' => 'border rounded-md p-2 w-full','placeholder' => 'Telefono']) !!}
        </div>

        <div>
            {!! Form::text('client_email', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Email']) !!}
        </div>

        <div>
            {!! Form::text('client_ident', null, ['class' => 'border rounded-md p-2 w-full','placeholder' => 'Identificacion']) !!}
        </div>




    </div>

    {!! Form::textarea('client_comments', null, ['class' => 'mt-5 border rounded-md p-2 w-full h-14','placeholder' => 'Comentarios']) !!}

    <div class="flex mt-5 space-x-4">

            {!! Form::submit('Enviar formulario', ['class' => 'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded rounded-lg shadow-xl', 'name' => 'submit_type', 'value' => 'send_form']) !!}

            {!! Form::submit('Añadir embarcación', ['class' => 'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded rounded-lg shadow-xl', 'name' => 'submit_type', 'value' => 'add_boat']) !!}

    </div>
{!! Form::close() !!}



</x-app-layout>
