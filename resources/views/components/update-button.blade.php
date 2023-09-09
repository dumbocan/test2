@props(['route', 'id'])

<div x-data="{route: '{{$route}}', id: '{{$id}}'}">
    <button @click="window.location.href = '/' + route + '/' + id + '/edit'" class="cursor-pointer flex space-x-2">
        <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Update Icon">
    </button>
</div>

