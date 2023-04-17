<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $search = $request->input('search');

        return view('search')->with('search', $search);

    }
}
