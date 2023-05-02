<div class="grid grid-cols-2 gap-4 float-right">
    <a {{ $editLink ?? '' }}>
        <button>
            <img class="w-5" src="{{ asset('images/icons/update.svg') }}" alt="Icon">
        </button>
    </a>
    <button {{ $deleteLink ?? '' }}>
        <img class="w-5" src="{{ asset('images/icons/delete.svg') }}" alt="Icon">
    </button>
</div>
