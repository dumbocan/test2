<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    /*public function show()
        {

        return view('clients');
        }
    */
    public function show()
        {
            $clients = Clients::all();
            return view('clients.clients', ['clients' => $clients]);
        }

    public function newclient()
    {
       return view('clients.newclient');
    }

}
