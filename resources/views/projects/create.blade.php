<!-- content layouts/app $slot -->

<x-app-layout>
    <!-- tags -->
    <x-slot name="header">
        <div class="flex flex-wrap justify-between items-center">
            <div class="w-full sm:w-auto mb-4 sm:mb-0">
                {{('Proyecto de embarcacion '). ($boat->boat_name) .(' Propietario: ').($client->client_name)}}
            </div>

           <!-- <x-radio-buttons /> -->

        </div>

    </x-slot>

    {!! Form::open(['route' => 'projects.store', 'class' => 'mt-7 mx-10 flex flex-col justify-center ']) !!}
        {!! csrf_field() !!}

        <div class="grid sm:grid-cols-2 gap-4 ">


            <div>
                {!! Form::date('project_date', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'fecha de creacion de proyecto']) !!}
            </div>

            <div>
                {!! Form::text('project_description', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Descripcion de proyecto']) !!}
            </div>



        </div>

        {!! Form::textarea('project_comments', null, ['class' => 'mt-5 border rounded-md p-2 w-full h-14','placeholder' => 'Comentarios']) !!}

        {!! Form::hidden('boat_id',$boat->boat_id) !!}

        {!! Form::hidden('project_state', 'w') !!}

        {!! Form::submit('Enviar formulario', ['class' => 'mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}

    {!! Form::close() !!}

</x-app-layout>
