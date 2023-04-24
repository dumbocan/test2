<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->
    <x-slot name="header">
        <div class="flex">
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')">
                    {{ __('Nuevo') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>


 <!-- Responsive menu -->
    <div class="sm:hidden space-x-8 sm:-my-px sm:ml-10  pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')">
            {{ __('Nuevo') }}
        </x-responsive-nav-link>
    </div>


{!! Form::open(['route' => 'clients.store', 'class' => 'mt-7 mx-10 flex flex-col justify-center ']) !!}
    {!! csrf_field() !!}

    <div class="grid sm:grid-cols-2 gap-4 ">
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

    {!! Form::submit('Enviar formulario', ['class' => 'mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}

{!! Form::close() !!}



</x-app-layout>
