<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boats;


class BoatsController extends Controller
{
    public function show($boat)
    {
        $boat = boats::find($boat);

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
    $boat = new Boats;
    $boat->boat_name = strtoupper($request->input('boat_name'));
    $boat->boat_marina = ucwords($request->input('boat_marina'));
    $boat->boat_type = ucwords($request->input('boat_type'));
    $boat->boat_picture = null;
    $boat->boat_comments = ucwords($request->input('boat_comments'));
    $boat->client_id = $request->input('client_id');

    // Guardar el cliente en la base de datos
    $boat->save();

    return redirect()->route('clients.index')->with('success', 'Embarcacion añadida correctamente.');
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
    //$boat->client_id = $request->input('client_id');

    // Update the client in the database
    $boat->save();

    return redirect()->route('clients.index')->with('success', 'Embarcacion actualizada correctamente.');
} catch (\Exception $e) {
    // Handle the exception
    return redirect()->route('boats.index')->with('error', 'Ha ocurrido un error al actualizar la embarcacion.');
}
}


public function destroy($boat_id)
{
    $boat = Boats::find($boat_id);

    $boat->delete();
    return redirect()->route('boats.index')->with('success', 'Embarcacion borrada correctamente.');

}
}

