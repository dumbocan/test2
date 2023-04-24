
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
<div class="bg-blue-200 px-8">
            {{ $clients->links() }}
        </div>
<!-- list of clients -->
    @foreach ($clients as $client)
        <div class="py-5">
            <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
                <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">


            <!-- butons update and delete -->

                        <div class="grid grid-cols-2 gap-4  float-right">
                            <a href="{{ route('clients.edit', $client->client_id) }}" >
                                <button>
                                    <img class="w-7" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                </button>
                            </a>
                           <!-- {!! Form::open(['route' => ['clients.destroy', $client->client_id], 'method' => 'DELETE']) !!}
                                <button type="submit">
                                    <img class="w-7" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
                                </button>
                            {!! Form::close() !!}-->

                            <button onclick ="Livewire.emit('showDeleteConfirmationModal', '{{ $client->client_id }}')">
                            <img class="w-7" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
                            </button>

                            <!--<button wire:click="'showDeleteConfirmationModal', {{ $client->client_id }}" wire:loading.attr="disabled">Delete</button>-->



                        </div>

            <!-- client data -->

                        <div>
                            <div class="text-2xl underline underline-offset-2">
                                {{$client->client_name}}
                            </div>

                            {{$client->client_ident}}
                            <br>
                            {{($client->client_street).(' , ').($client->client_pc).( ' , ').($client->client_city).( ' , ').($client->client_country)}}
                            <br>
                            {{($client->client_telephone). ('  ,  ') .($client->client_email)}}
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
