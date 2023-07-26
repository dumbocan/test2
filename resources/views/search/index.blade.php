<x-app-layout>

<!-- content layouts/app $slot -->



<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Los resultados para:  ').($search) }}
        </h2>
    </div>

    <!-- alert success -->

  <x-alert-succes/>

    <!-- alert error -->

   <x-alert-error/>

</x-slot>

<div class="bg-blue-200 px-8">
    {{ $boats->links() }}
</div>

@foreach($boats as $boat)
    <div class="py-5">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
            <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('clients.show', ['client' => $boat->clients->client_id]) }}" class="block">

                        {{ $boat->boat_name}}
                        <br>
                        {{ $boat->boat_marina}}

                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach


<div class="bg-blue-200 px-8">
    {{ $boats->links() }}
</div>

@foreach($clients as $client)
    <div class="py-5">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
            <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('clients.show', ['client' => $client->client_id]) }}" class="block">

                        {{ $client->client_name}}
                        <br>
                        {{ $client->client_email}}

                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="bg-blue-200 px-8">
    {{ $boats->links() }}
</div>

@foreach($projects as $project)
    <div class="py-5">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
            <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('clients.show', ['client' => $project->boats->client_id]) }}" class="block">

                        {{ $project->project_descriptiondesc}}
                        <br>
                        {{ $project->project_comments}}

                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach



</x-app-layout>
