<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;

use Livewire\Component;
use App\Models\Clients;

class DeleteConfirmationModal extends Component
{
    public $showModal = false;
    public $client;

    protected $listeners = ['showDeleteConfirmationModal'];

    public function showDeleteConfirmationModal($client_id)
    {
        $this->client = Clients::find($client_id);
        $this->showModal = true;
    }


    public function render()
    {
        return view('livewire.delete-confirmation-modal');
    }
}
