<x-app-layout>

<!-- content layouts/app $slot -->



<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barcos') }}

            <x-nav-link :href="route('boats.create')" :active="request()->routeIs('boats.create')" class="ml-10" >

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
    {{ $boats->links() }}
</div>

<!-- list of boats -->
@foreach ($boats as $boat)
    <div class="py-5">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
            <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


        <!-- client data -->
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
                        {{$boat->boat_name}}
                    </span>
                    <br>
                        {{($boat->boat_marina).(' , ').($boat->boat_type)}}
                    <br>
                        {{$boat->boat_comments}}


                </div>
            </div>
        </div>
    </div>
@endforeach



</x-app-layout>
