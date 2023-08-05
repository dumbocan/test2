<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Boats;
use App\Models\Worksheets;

class worksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $project_id = $request->input('project');
        $worksheets = Worksheets::where('project_id', $project_id)->get();

        if ($worksheets->isEmpty()) {
            $project = Projects::with('boats')->findOrFail($project_id);
            $boat = $project->boats;

            return view('worksheet.create', compact('project', 'boat'));
        } else {
            return view('worksheet.index', compact('worksheets'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $worksheet_id = $request->input('project_id');
        $worksheet = Worksheets::findOrFail($worksheet_id);
dd($worksheet);
        return view('worksheet.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
