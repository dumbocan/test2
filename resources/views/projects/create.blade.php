<!-- content layouts/app $slot -->

<x-app-layout>
<!-- tags -->
<x-slot name="header">
<div class="flex flex-wrap justify-between items-center">
    <div class="w-full sm:w-auto mb-4 sm:mb-0">
        {{ __('Proyectos') }}
    </div>

    <div class="mr-10 w-full sm:w-auto mb-4 sm:mb-0 flex items-center">
        <form action="/action_page.php" class="ml-2 flex space-x-2">
            <div class="flex items-center">
                <input type="radio" id="waiting" name="waiting" value="HTML" class="mr-2">
                <label for="waiting">En espera</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="started" name="started" value="started" class="mr-2">
                <label for="started">Empezado</label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="finish" name="finish" value="finish" class="mr-2">
                <label for="finish">Terminado</label>
            </div>
        </form>
    </div>
</div>

    </x-slot>




{!! Form::open(['route' => 'clients.store', 'class' => 'mt-7 mx-10 flex flex-col justify-center ']) !!}
    {!! csrf_field() !!}

    <div class="grid sm:grid-cols-2 gap-4 ">
        <div>
            {!! Form::text('project_number', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'numero de proyecto']) !!}
        </div>

        <div>
            {!! Form::text('project_date', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'fecha de creacion de proyecto']) !!}
        </div>

        <div>
            {!! Form::text('project_description', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Descripcion de proyecto']) !!}
        </div>

        <div>
            {!! Form::text('project_state', null, ['class' => 'border rounded-md p-2 w-full', 'placeholder' => 'Estado del proyecto']) !!}
        </div>





    </div>

    {!! Form::textarea('project_comments', null, ['class' => 'mt-5 border rounded-md p-2 w-full h-14','placeholder' => 'Comentarios']) !!}

    <input type="file" id="file" name="file" class="mr-2 mt-7">
        <label for="file">Adjuntar archivo</label>
    <input type="file" id="photo" name="photo" class="mr-2 mt7" accept="image/*">
        <label for="photo">Adjuntar foto</label>

        {!! Form::submit('Enviar formulario', ['class' => 'mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}



    {!! Form::close() !!}



</x-app-layout>
