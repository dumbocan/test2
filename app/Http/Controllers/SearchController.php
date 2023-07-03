<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\boats;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $search = $request->input('search');

        $clients = Clients::where('client_name', 'LIKE', "%$search%")
            ->orWhere('client_email', 'LIKE', "%$search%")
            ->get();

        $boats = Boats::where('boat_name', 'LIKE', "%$search%")

            ->orWhere('boat_marina', 'LIKE', "%$search%")
            ->get();

        return view('search.index')->with([
            'search' => $search,
            'clients' => $clients,
            'boats' => $boats,
        ]);
    }

}
