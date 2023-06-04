<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Facades\DB;


class ClientsController extends Controller
{   public $boat;
    public $project;

    public function show($client)
    {
        $client = Clients::find($client);

    }

    public function index()
{
    $clients = Clients::with('boats.projects')->paginate(10);

    return view('clients.index', compact('clients'));
}

    public function create()
    {
       return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = new Clients;
        $client->client_name = ucwords($request->input('client_name'));
        $client->client_street = $request->input('client_street');
        $client->client_pc = strtoupper($request->input('client_pc'));
        $client->client_city = ucwords($request->input('client_city'));
        $client->client_country = ucwords($request->input('client_country'));
        $client->client_ident = strtoupper($request->input('client_ident'));
        $client->client_telephone = $request->input('client_telephone');
        $client->client_email = $request->input('client_email');
        $client->client_picture = $request->input('null');

        $client->client_comments = $request->input('client_comments');

        // Guardar el cliente en la base de datos
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Cliente añadido correctamente.');
    }

    public function edit($client_id)
    {
        $client = Clients::find($client_id);
        return view('clients.edit',['client' => $client]);

    }

    /*public function update(Request $request)
    {
        $client = new Clients;
        $client->client_name = ucwords($request->input('client_name'));
        $client->client_street = $request->input('client_street');
        $client->client_pc = strtoupper($request->input('client_pc'));
        $client->client_city = ucwords($request->input('client_city'));
        $client->client_country = ucwords($request->input('client_country'));
        $client->client_ident = strtoupper($request->input('client_ident'));
        $client->client_telephone = $request->input('client_telephone');
        $client->client_email = $request->input('client_email');
        $client->client_picture = $request->input('null');

        $client->client_comments = $request->input('client_comments');
        // Actualizar el cliente en la base de datos

       DB::table('clients')
        ->where('client_id',$request->input('client_id'))
        ->update(['client_name' => $client->client_name,
                  'client_street' => $client->client_street,
                  'client_pc' => $client->client_pc,
                  'client_city' => $client->client_city,
                  'client_country' => $client->client_country,
                  'client_ident' => $client->client_ident,
                  'client_telephone' => $client->client_telephone,
                  'client_email' => $client->client_email,
                  'client_picture' => null,
                  'client_comments' => $client->client_comments  ]);

                  return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');

    }
*/
public function update(Request $request)
{
    try {
        $client = Clients::find($request->input('client_id'));
        $client->client_name = ucwords($request->input('client_name'));
        $client->client_street = $request->input('client_street');
        $client->client_pc = strtoupper($request->input('client_pc'));
        $client->client_city = ucwords($request->input('client_city'));
        $client->client_country = ucwords($request->input('client_country'));
        $client->client_ident = strtoupper($request->input('client_ident'));
        $client->client_telephone = $request->input('client_telephone');
        $client->client_email = $request->input('client_email');
        $client->client_picture = null;
        $client->client_comments = $request->input('client_comments');

        // Update the client in the database
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
    } catch (\Exception $e) {
        // Handle the exception
        return redirect()->route('clients.index')->with('error', 'An error occurred while updating the client.');
    }
}


    public function destroy($client_id)
    {
        $client = Clients::find($client_id);

        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente borrado correctamente.');

    }
}
