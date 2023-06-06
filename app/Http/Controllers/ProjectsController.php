<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Boats;
use App\Models\Clients;

class ProjectsController extends Controller
{
    public function getBoatInfo($boat_id)
    {
        $boat = Boats::finfOrFail($boat_id)->with('projects','client');
        return $boat;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $projects = Projects::with('boats')->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create(Request $request)
    {
        $boat_id = $request->input('boat_id');
        $boat = Boats::findOrFail($boat_id);
        $client = $boat->client;
        return view('projects.create', compact('boat', 'client'));
    }

    public function store(Request $request)
    {
        $project = new Projects;
        $project -> project_number = ($request->input('project_number'));
        $project -> project_date = ($request->input('project_date'));
        $project -> project_description = ($request->input('project_description'));
        $project -> project_state = ($request->input('project_state'));
        $project -> project_comments = ($request->input('project_comments'));
        $project -> pictures = $request->input('null');
        $project -> file = $request->input('null');
        $project -> boat_id = ($request->input('boat_id'));

        $project -> save();

        return redirect()->route('clients.index')->with('success', 'Proyecto añadido correctamente.');

    }

    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($project_id)
    {
        $project = Projects::find($project_id);
        return view('projects.edit',['project' => $project]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $project = Projects::find($request->input('project_id'));

            $project -> project_number = ($request->input('project_number'));
            $project -> project_date = ($request->input('project_date'));
            $project -> project_description = ($request->input('project_description'));
            $project -> project_state = ($request->input('project_state'));
            $project -> project_comments = ($request->input('project_comments'));
            $project -> pictures = $request->input('null');
            $project -> file = $request->input('null');
            $project -> boat_id = ($request->input('boat_id'));



            // Update the client in the database
            $project->save();

            return redirect()->route('projects.index')->with('success', 'Proyecto actualizada correctamente.');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->route('projects.index')->with('error', 'Ha ocurrido un error al actualizar el proyecto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
