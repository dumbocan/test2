<x-app-layout>

<!-- tags -->
<x-slot name="header">
    <div class="flex">
        <div class="text-2xl hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                {{ __('Actualizar datos de proyecto') }}
        </div>
    </div>
</x-slot>

 <!-- Responsive menu
 <div class="sm:hidden space-x-8 sm:-my-px sm:ml-10  pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('boats.create')" :active="request()->routeIs('boats.create')">
            {{ __('Nuevo') }}
        </x-responsive-nav-link>
    </div>
-->

{!! Form::open(['method' => 'PUT','route' => ['projects.update', $project->project_id] , 'class' => 'mt-7 mx-10 flex flex-col justify-center ']) !!}
    {!! csrf_field() !!}

    <div class="grid sm:grid-cols-2 gap-4 ">
        <div>
            {!! Form::text('project_number', $project->project_number, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => '$project->project_number']) !!}
        </div>

        <div>
            {!! Form::text('project_date', $project->project_date, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => '$project->project_date']) !!}
        </div>

        <div>
            {!! Form::text('project_description', $project->project_description, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => '$project->project_description']) !!}
        </div>

        <div>
            {!! Form::text('project_state', $project->project_state, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => '$project->project_state']) !!}
        </div>

    </div>

    {!! Form::textarea('project_comments', $project->project_comments, ['class' => 'mt-5 border rounded-md p-2 w-full h-14', 'placeholder' => '$project->project_comments']) !!}

    {!! Form::submit('Enviar formulario', ['class' => 'mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}

    {!! Form::hidden('project_id', $project->project_id) !!}

    {!! Form::hidden('boat_id', $project->boat_id) !!}


{!! Form::close() !!}




</x-app-layout>
