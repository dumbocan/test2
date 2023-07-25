<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boats;


class BoatsController extends Controller
{
    public function show($boat)
    {
        $boat = boats::find($boat)->paginate(10);

    }
    public function index()
    {
        $page = Boats::with('clients')->paginate(10);

        return view('boats.index', ['boats' => $page]);
    }

    public function create(Request $request)
    {
        $client_id = $request->input('client_id');

        return view('boats.create', ['client_id' => $client_id]);
    }

    public function store(Request $request)
    {
        try {
            $boat = new Boats;
            $boat->boat_name = strtoupper($request->input('boat_name'));
            $boat->boat_marina = ucwords($request->input('boat_marina'));
            $boat->boat_type = ucwords($request->input('boat_type'));
            $boat->boat_picture = null;
            $boat->boat_comments = ucwords($request->input('boat_comments'));
            $boat->client_id = $request->input('client_id');

            // Guardar la embarcación en la base de datos
            $boat->save();

            // Obtener el client_id después de guardar el barco
            $client_id = $boat->client_id;

            return redirect()->route('clients.show', ['client' => $client_id])->with('success', 'Embarcacion añadida correctamente.');
        } catch (\Exception $e) {
            // Handle the exception
            $client_id = $request->input('client_id');

            return redirect()->route('clients.show', ['client' => $client_id])->with('error', 'Ha ocurrido un error al añadir la embarcacion.');
        }
    }


    public function edit($boat_id)
    {
        $boat = Boats::find($boat_id);
        return view('boats.edit',['boat' => $boat]);

    }

    public function update(Request $request)
    {
    try {
        $boat = Boats::find($request->input('boat_id'));

        $boat->boat_name = strtoupper($request->input('boat_name'));
        $boat->boat_marina = ucwords($request->input('boat_marina'));
        $boat->boat_type = ucwords($request->input('boat_type'));
        $boat->boat_picture = null;
        $boat->boat_comments = ucwords($request->input('boat_comments'));

        // Update the client in the database
        $boat->save();

        $client_id =  $boat-> client_id;

        return redirect()->route('clients.show', ['client' => $client_id])->with('success', 'Embarcacion actualizada correctamente.');
    } catch (\Exception $e) {
        $client_id =  $boat-> client_id;
        // Handle the exception
        return redirect()->route('clients.show', ['client' => $client_id])->with('error', 'Ha ocurrido un error al actualizar la embarcacion.');
    }
    }


    public function destroy($boat_id)
    {
        try{
        $boat = Boats::find($boat_id);

        $boat->delete();
        $client_id =  $boat-> client_id;
        return redirect()->route('clients.show', ['client' => $client_id])->with('success', 'Embarcacion borrada correctamente.');
        } catch (\Exception $e) {
        $client_id =  $boat-> client_id;
        return redirect()->route('clients.show', ['client' => $client_id])->with('error', 'Ha ocurrido un error al borrar la embarcacion.');
        }
    }
}

