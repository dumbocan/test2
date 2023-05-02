<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->
    <x-slot name="header">
        <div class="flex">
            <div class="text-2xl hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{ __('Actualizar datos de embarcacion') }}
            </div>
        </div>
    </x-slot>


 <!-- Responsive menu -->
    <div class="sm:hidden space-x-8 sm:-my-px sm:ml-10  pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('boats.create')" :active="request()->routeIs('boats.create')">
            {{ __('Nuevo') }}
        </x-responsive-nav-link>
    </div>


{!! Form::open(['method' => 'PUT','route' => ['boats.update', $boat->boat_id] , 'class' => 'mt-7 mx-10 flex flex-col justify-center ']) !!}
    {!! csrf_field() !!}

    <div class="grid sm:grid-cols-2 gap-4 ">
        <div>
            {!! Form::text('boat_name', $boat->boat_name, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Nombre embarcacion']) !!}
        </div>

        <div>
            {!! Form::text('boat_marina', $boat->boat_marina, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Marina']) !!}
        </div>

        <div>
            {!! Form::text('boat_type', $boat->boat_type, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Tipo embarcacion']) !!}
        </div>

    </div>

    {!! Form::textarea('boat_comments', $boat->boat_comments, ['class' => 'mt-5 border rounded-md p-2 w-full h-14', 'placeholder' => 'Comentarios']) !!}

    {!! Form::submit('Enviar formulario', ['class' => 'mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}

    {!! Form::hidden('boat_id', $boat->boat_id) !!}

{!! Form::close() !!}



</x-app-layout>
