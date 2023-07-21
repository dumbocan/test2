
<!-- content layouts/app $slot -->

<x-app-layout>

<!-- content layouts/app $slot -->



<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultados de busqueda') }}
        </h2>
    </div>

   <!-- alert success -->

   <x-alert-succes/>

<!-- alert error -->

   <x-alert-error/>

</x-slot>

    <!-- pagination -->

    <div class="bg-blue-200 px-8">
    @if ($clients instanceof \Illuminate\Contracts\Pagination\Paginator)
        {{ $clients->links() }}
    @endif
    @if ($boats instanceof \Illuminate\Contracts\Pagination\Paginator)
        {{ $boats->links() }}
    @endif
    @if ($projects instanceof \Iluminate\Contracts\Pagination\Paginator)
        {{ $projects->links() }}
    @endif

</div>

<!-- show resuts of search of boats, clients, and projects -->

{{ $search }}
<br>
<br>
@foreach($boats as $boat)
{{ $boat->boat_name }}
{{ $boat->boat_marina }}
<br>
@endforeach
<br>

<br>
@foreach($clients as $client)
{{ $client->client_name }}
{{ $client->client_email }}
<br>
@endforeach
<br>

<br>
@foreach($projects as $project)
{{ $project->project_number }}
{{ $project->project_description }}
<br>
@endforeach

</x-app-layout>
