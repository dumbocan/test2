<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->
    <x-slot name="header">
        <div class="flex">
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('boats.create')" :active="request()->routeIs('boats.create')">
                    {{ __('Nuevo') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>


 <!-- Responsive menu -->
    <div class="sm:hidden space-x-8 sm:-my-px sm:ml-10  pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('boats.create')" :active="request()->routeIs('boats.create')">
            {{ __('Nuevo') }}
        </x-responsive-nav-link>
    </div>

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
