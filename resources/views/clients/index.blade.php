@livewire('delete-confirmation-modal')


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

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{session('success')}}.</span>
            </div>
        @endif

     <!-- alert error -->

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{session('error')}}.</span>
            </div>
        @endif

    </x-slot>

 <!-- pagination -->

        <div class="bg-blue-200 px-8">
            {{ $clients->links() }}
        </div>


<!-- list of clients -->
    @foreach ($clients as $client)
        <div class="py-5">
            <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
                <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

            <!-- client data -->

                        <div class="grid md:grid-cols-8 gap 10 ">
                            <span class="md:mt-5 mr-3 p-3 border border-black rounded-lg col-span-4 ">



                            <!-- butons update and delete-->
                            <div >
                                <div class="grid grid-cols-2 gap-4  float-right">
                                    <a href="{{ route('clients.edit', $client->client_id) }}" >
                                        <button>
                                            <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                        </button>
                                    </a>
                                    <button onclick ="Livewire.emit('showDeleteConfirmationModal', '{{ $client->client_id }}')">
                                        <img class="w-5" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
                                    </button>
                                </div>
                            </div>


                            <span class="text-2xl underline underline-offset-2">
                                    {{$client->client_name}}
                                </span>
                                <br>
                                {{$client->client_ident}}
                                <br>
                                {{($client->client_street).(' , ').($client->client_pc).( ' , ').($client->client_city).( ' , ').($client->client_country)}}
                                <br>
                                {{($client->client_telephone). ('  ,  ') .($client->client_email)}}
                                <hr class="border bottom-1 border-black ">
                                {{$client->client_comments}}

                            </span>

                            <!-- boats  -->

                            <span class="mt-5  mr-3 p-3 border border-black rounded-lg  col-span-4">

                                @if($client->boats->isNotEmpty())




                                    <!-- butons update and delete-->
                            <div >
                                <div class="grid grid-cols-2 gap-4  float-right">
                                    <a href="{{ route('boats.edit', $client->client_id) }}" >
                                        <button>
                                            <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                        </button>
                                    </a>
                                    <button onclick ="Livewire.emit('showDeleteConfirmationModal', '{{ $client->client_id }}')">
                                        <img class="w-5" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
                                    </button>
                                </div>
                            </div>






                                    @foreach($client->boats as $boat)
                                        <span class="text-2xl underline underline-offset-2">
                                            {{ $boat->boat_name }}
                                        </span>
                                        <br>
                                        <br>
                                        {{ 'puerto: '. $boat->boat_marina }}
                                        <br>
                                        {{ 'tipo de barco: '. $boat->boat_type}}
                                        <hr class="border bottom-1 border-black ">
                                        {{ $boat->boat_comments}}
                                    @endforeach

                                @else
                                    <p>No tiene barco</p>
                                    <a href="{{ route('boats.create', ['client_id' => $client->client_id]) }}">Agregar barco</a>
                                @endif

                            </span>
                        </div>

                       <!-- projects of the boat -->

                        <div class="mt-5 border border-black rounded-lg mr-3 p-3">
                                  <!-- butons update and delete-->
                                  <div >
                                <div class="grid grid-cols-2 gap-4  float-right">
                                    <a href="{{ route('clients.edit', $client->client_id) }}" >
                                        <button>
                                            <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                        </button>
                                    </a>
                                    <button onclick ="Livewire.emit('showDeleteConfirmationModal', '{{ $client->client_id }}')">
                                        <img class="w-5" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
                                    </button>
                                </div>
                            </div>
                            <span class="text-2xl underline underline-offset-2">
                                Proyectos
                            </span>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endforeach



</x-app-layout>
