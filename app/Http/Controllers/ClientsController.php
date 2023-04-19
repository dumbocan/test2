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
            $clients = Clients::paginate(10);
            return view('clients.clients', ['clients' => $clients]);
        }

    public function newclient()
    {
       return view('clients.newclient');
    }

    public function addclient(Request $request)
    {
        $client = new Clients;
        $client->client_name = $request->input('client_name');
        $client->client_street = $request->input('client_street');
        $client->client_pc = $request->input('client_pc');
        $client->client_city = $request->input('client_city');
        $client->client_country = $request->input('client_country');
        $client->client_telephone = $request->input('client_telephone');
        $client->client_email = $request->input('client_email');
        $client->client_ident = $request->input('client_ident');
        $client->client_picture = $request->input('null');

        $client->client_comments = $request->input('client_comments');

        // Guardar el cliente en la base de datos
        $client->save();

        return redirect()->route('clients')->with('success', 'Cliente añadido correctamente.');
    }
}
