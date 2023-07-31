<x-app-layout>

<!-- content layouts/app $slot -->



<!-- tags -->

<x-slot name="header">
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barcos') }}
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

<!-- list of boats -->
@foreach ($boats as $boat)
    <div class="py-5">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4 ">
            <div class="h-max bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                <!-- boat data -->
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

                    <a href="{{ route('clients.show', ['client' => $boat->client_id]) }}" class="block">

                        <span class="text-2xl underline underline-offset-2">
                            {{$boat->boat_name}}
                        </span>
                        <br>
                            {{($boat->boat_marina).(' , ').($boat->boat_type)}}
                        <br>
                            {{$boat->boat_comments}}
                    </a>

                </div>
            </div>
        </div>
    </div>
@endforeach



</x-app-layout>
