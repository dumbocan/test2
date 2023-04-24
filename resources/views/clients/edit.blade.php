<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->
    <x-slot name="header">
        <div class="flex">
            <div class="text-2xl hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{ __('Actualizar datos de cliente') }}
            </div>
        </div>
    </x-slot>


 <!-- Responsive menu -->
    <div class="sm:hidden space-x-8 sm:-my-px sm:ml-10  pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')">
            {{ __('Nuevo') }}
        </x-responsive-nav-link>
    </div>


{!! Form::open(['method' => 'PUT','route' => ['clients.update', $client->client_id] , 'class' => 'mt-7 mx-10 flex flex-col justify-center ']) !!}
    {!! csrf_field() !!}

    <div class="grid sm:grid-cols-2 gap-4 ">
        <div>
            {!! Form::text('client_name', $client->client_name, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Nombre']) !!}
        </div>

        <div>
            {!! Form::text('client_street', $client->client_street, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Direccion']) !!}
        </div>

        <div>
            {!! Form::text('client_pc', $client->client_pc, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Codigo postal']) !!}
        </div>

        <div>
            {!! Form::text('client_city', $client->client_city, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Ciudad']) !!}
        </div>

        <div>
            {!! Form::text('client_country', $client->client_country, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Pais']) !!}
        </div>

        <div>
            {!! Form::text('client_telephone', $client->client_telephone, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Telefono']) !!}
        </div>

        <div>
            {!! Form::text('client_email', $client->client_email, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Email']) !!}
        </div>

        <div>
            {!! Form::text('client_ident', $client->client_ident, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Identificacion']) !!}
        </div>




    </div>

    {!! Form::textarea('client_comments', $client->client_comments, ['class' => 'mt-5 border rounded-md p-2 w-full h-14', 'placeholder' => 'Comentarios']) !!}

    {!! Form::submit('Enviar formulario', ['class' => 'mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}

    {!! Form::hidden('client_id', $client->client_id) !!}

{!! Form::close() !!}



</x-app-layout>
