<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
use App\Models\boats;
use App\Models\projects;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $search = $request->input('search');

        $clients = Clients::where('client_name', 'LIKE', "%$search%")
            ->orWhere('client_email', 'LIKE', "%$search%")
            ->paginate(10); // Número de elementos por página

        $boats = Boats::where('boat_name', 'LIKE', "%$search%")

            ->orWhere('boat_marina', 'LIKE', "%$search%")
            ->paginate(10); // Número de elementos por página

        $projects = Projects::where('project_number', 'LIKE', "%$search%")
        ->orWhere('project_description', 'LIKE', "%$search%")
        ->paginate(10);
//var_dump($projects);exit;
        return view('search.index')->with([
            'search' => $search,
            'clients' => $clients,
            'boats' => $boats,
            'projects' => $projects,
        ]);
    }

}
