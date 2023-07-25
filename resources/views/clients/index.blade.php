


<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                {{ __('Clientes') }}

                <x-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')" class="ml-10" >

                    {{ __('Nuevo') }}

                </x-nav-link>
            </h2>
        </div>

     <!-- alert success -->

     <x-alert-succes/>

     <!-- alert error -->

    <x-alert-error/>

    </x-slot>
<div class="bg-blue-200 px-8">
    {{ $clients->links() }}
</div>
<!-- list of clients -->
@foreach ($clients as $client)
    <div class="group py-5">
            <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
                <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <!-- butons update and delete -->
                        <div>
                            <div class="grid grid-cols-2 gap-4 float-right">
                                <a href="{{ route('clients.edit', $client->client_id) }}">
                                    <button>
                                        <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                    </button>
                                </a>
                                <!-- delete modal and buton -->
                                @if($client->boats->isEmpty())
                                    <x-deleteModal :id="$client->client_id" :name="$client->client_name" :type="'c'"/>
                                @endif
                            </div>
                        </div>
                        <div >
                        <a href="{{ route('clients.show', ['client' => $client->client_id]) }}" class="block">

                            <!-- client data -->
                            <span class="text-2xl underline underline-offset-2">
                                {{$client->client_name}}
                            </span>
                            <br>
                            {{$client->client_ident}}
                            <br>
                            {{($client->client_street).(' , ').($client->client_pc).( ' , ').($client->client_city).( ' , ').($client->client_country)}}
                            <br>
                            {{($client->client_telephone). ('  ,  ') .($client->client_email)}}
                            <br>
                            {{$client->client_comments}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endforeach




</x-app-layout>
