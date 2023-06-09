

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
                                            <!-- delete modal and buton-->
                                        @if($client->boats->isEmpty())
                                            <x-deleteModal :id="$client->client_id" :name="$client->client_name" :type="'c'"/>
                                        @endif
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


                                        @if($client->boats->isEmpty())
                                            <p>No tiene barco</p>
                                            <a href="{{ route('boats.create', ['client_id' => $client->client_id]) }}">Agregar barco</a>


                                        @else

                                            @foreach($client->boats as $boat)

                                                <!-- butons update and delete-->

                                                <div class="grid grid-cols-2 gap-4  float-right">
                                                    <a href="{{ route('boats.edit', $boat->boat_id) }}" >
                                                        <button>
                                                            <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                                        </button>
                                                    </a>
                                                    @if($boat->projects->isEmpty())
                                                        <x-deleteModal :id="$boat->boat_id" :name="$boat->boat_name" :type="'b'"/>
                                                    @endif
                                                </div>

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

                                        @endif

                                    </span>
                                </div>

                                <!-- projects of the boat -->
                                <div class="mt-5 border border-black rounded-lg mr-3 p-3">

                                    <div class="p-1 drop-shadow-lg mt-1 border border-black rounded-lg  bg-gray-200 ">

                                    <!-- projects bar and new project icon -->

                                        <span class="text-2xl underline underline-offset-2">
                                            {{'Proyectos'}}


                                        </span>
                                        @if($client->boats->isNotEmpty())

                                            <div class="float-right mt-1 mr-4">
                                                <a href="{{ route('projects.create', ['boat_id' => $boat->boat_id]) }}">
                                                    <button>

                                                        <img class="w-5" src="{{ asset('images/icons/new.svg') }}" alt="Icon">
                                                    </button>
                                                </a>
                                            </div>

                                        @endif
                                    </div>
                                    <br>

                                    @if(($boat->projects) && ($client->boats)->isEmpty())

                                        @elseif($boat->projects->isEmpty())
                                            <p>No tiene proyecto</p>
                                            <a href="{{ route('projects.create', ['boat_id' => $boat->boat_id]) }}">Agregar proyecto</a>

                                        @else

                                        @foreach($boat->projects as $project)

                                            <!-- butons update and delete-->

                                            <div class="mt-2 border border-black rounded-lg mr-3 p-3">
                                                <div class="grid   float-right flex-col">

                                                    <a href="{{ route('projects.edit', $project->project_id) }}" class="mb-3">
                                                        <button>
                                                            <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                                        </button>
                                                    </a>

                                                    <x-deleteModal :id="$project->project_id" :name="$project->project_number" :type="'p'"/>

                                                </div>
                                                <div class=" grid grid-cols-2 gap-10 border-b border-black w-11/12">

                                                        <div >
                                                            {{$project->project_number.('-').strToUpper($boat->boat_name)}}
                                                        </div>

                                                        <div class="flex justify-end">
                                                            {{ date('d,m,Y', strtotime($project->project_date)) }}  <!-- date format for d-m-Y-->
                                                        </div>

                                                </div>
                                                <p>
                                                    {{$project->project_description}}
                                                </p>
                                                <p>
                                                    {{$project->project_comments}}
                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach



</x-app-layout>
