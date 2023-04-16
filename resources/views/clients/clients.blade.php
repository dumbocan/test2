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
        </div>
    </x-slot>

<!-- list of clients -->
    @foreach ($clients as $client)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">


                        <div>
                            {{$client->client_name}}
                            <br>
                            {{$client->client_street}}
                            <br>
                            {{$client->client_pc}}
                            <br>
                            {{$client->client_city}}
                            <br>
                            {{$client->client_country}}
                            <br>
                            {{$client->client_telephone}}
                            <br>
                            {{$client->client_email}}
                            <br>
                            {{$client->client_ident}}
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach



</x-app-layout>
