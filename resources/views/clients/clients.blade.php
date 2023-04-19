<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                {{ __('Clientes') }}

                <x-nav-link :href="route('clients.newclient')" :active="request()->routeIs('clients.newclient')" class="ml-10" >

                    {{ __('Nuevo') }}

                </x-nav-link>
            </h2>
        </div>   {{ $clients->links() }}
    </x-slot>

<!-- list of clients -->
    @foreach ($clients as $client)
        <div class="pt-5">
            <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
                <div class="h-40 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">


                        <div>
                            {{$client->client_name}}
                            <br>
                            {{$client->client_street}}
                            {{' - '}}
                            {{$client->client_pc}}
                            {{' - '}}
                            {{$client->client_city}}
                            {{' - '}}
                            {{$client->client_country}}
                            <br>
                            {{$client->client_telephone}}
                            <br>
                            {{$client->client_email}}
                            <br>
                            {{$client->client_ident}}
                            <br>
                            <br>
                            {{$client->client_comments}}
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach



</x-app-layout>
