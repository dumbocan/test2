<!-- content layouts/app $slot -->

<x-app-layout>

<!-- tags -->

<x-alert-succes/>

<x-alert-error/>

    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

                {{ __('Informacion general') }}


            </h2>
        </div>

    </x-slot>




<!-- list of clients -->


    <div class="py-5">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
            <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- client data -->
                    <div class="grid md:grid-cols-8 gap-10 ">
                        <span class="md:mt-5 mr-3 p-3 border border-black rounded-lg col-span-4 ">

                        <!-- butons update and delete -->

                        <div >
                            <div class="grid grid-cols-2 gap-4  float-right">
                                <a href="{{ route('clients.edit', $client->client_id) }}" >
                                    <button>
                                        <img class="w-4" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                    </button>
                                </a>
                                <!-- delete modal and buton -->
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
                                                <img class="w-4" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                            </button>
                                        </a>
                                        @if(optional($boat->projects)->isEmpty())
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
                                    <a href="{{ route('projects.create', ['boat_id' => optional($boat)->boat_id]) }}">
                                        <button>

                                            <img class="w-5" src="{{ asset('images/icons/new.svg') }}" alt="Icon">
                                        </button>
                                    </a>
                                </div>

                            @endif
                        </div>
                        <br>

                        @if(($client->boats)->isEmpty())

                        @elseif(optional($boat->projects)->isEmpty())
                            <p>No tiene proyecto</p>
                            <a href="{{ route('projects.create', ['boat_id' => optional($boat)->boat_id]) }}">Agregar proyecto</a>

                        @else

                        @foreach($boat->projects as $project)

                            <!-- butons update and delete-->

                            <div class="mt-2 border border-black rounded-lg mr-3 p-3">
                                <div class="grid   float-right flex-col">

                                    <a href="{{ route('projects.edit', $project->project_id) }}" class="mb-3">
                                        <button>
                                            <img class="w-4" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
                                        </button>
                                    </a>
                                    @if ($project->worksheet->count() < 1)
                                    <x-deleteModal :id="$project->project_id" :name="$project->project_number" :type="'p'"/>
                                    @endif
                                </div>
                                <div class="grid grid-cols-1 gap-10 border-b border-black w-11/12">
                                    <a href="{{ route('worksheet.index', ['project' => $project->project_id]) }}" class="block">
                                        <div class="flex justify-between">
                                            <div>
                                                {{ $project->project_number }}
                                            </div>
                                            <div>
                                                {{ date('d,m,Y', strtotime($project->project_date)) }}
                                            </div>
                                        </div>

                                </div>
                                    <p>
                                        {{ $project->project_description }}
                                    </p>
                                    <p>
                                        {{ $project->project_comments }}
                                    </p>
  </a>

                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
