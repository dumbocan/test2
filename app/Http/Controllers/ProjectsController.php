<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Boats;
use App\Models\Worksheet;

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

        $projects = Projects::with('boats','worksheet')

        ->orderBy('created_at', 'desc') // Order results by date last first
        ->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create(Request $request)
    {
        $boat_id = $request->input('boat_id');
        $boat = Boats::findOrFail($boat_id);
        $client = $boat->clients;
        return view('projects.create', compact('boat', 'client'));
    }


    public function store(Request $request)
    {
    try {
        // Obtener el año actual y el mes actual
        $currentYear = date('y');
        $currentMonth = date('m');

        // Obtener el último proyecto creado en el mes actual
        $latestProject = Projects::whereYear('created_at', '=', date('Y'))
            ->whereMonth('created_at', '=', date('m'))
            ->orderBy('created_at', 'desc')
            ->first();

        // Determinar el número de proyecto a partir del último proyecto
        if ($latestProject) {
            $latestProjectNumber = $latestProject->project_number;
            $latestYearMonth = substr($latestProjectNumber, 0, 5);

            // Verificar si el último proyecto pertenece al mes actual
            if ($latestYearMonth === $currentYear . '-' . $currentMonth) {
                $lastProjectCount = intval(substr($latestProjectNumber, 6, 2)); // Obtener el número de proyectos en el mes actual
                $projectCount = $lastProjectCount + 1; // Incrementar el número de proyectos en 1
            } else {
                $projectCount = 1; // Si el último proyecto no pertenece al mes actual, comenzar desde 1
            }
        } else {
            $projectCount = 1; // Si no hay proyectos previos en el mes actual, comenzar desde 1
        }

        // Formar el número de proyecto según el formato especificado
        $projectNumber = sprintf('%02d', $currentYear) . '-' .
            sprintf('%02d', $currentMonth) . '-' .
            sprintf('%02d', $projectCount);

        $boat_id = $request->input('boat_id');
        $boat = Boats::findOrFail($boat_id);
        $boat_name = StrToUpper($boat->boat_name);
        $project_number = $projectNumber.' '.$boat_name;


        // Crear el nuevo proyecto
        $project = new Projects;
        $project->project_number = $project_number;
        $project->project_date = $request->input('project_date');
        $project->project_description = $request->input('project_description');
        $project->project_state = $request->input('project_state');
        $project->project_comments = $request->input('project_comments');
        $project->pictures = $request->input('null');
        $project->file = $request->input('null');
        $project->boat_id = $request->input('boat_id');
        $project->save();

        // Obtener el id del barco desde el formulario o donde lo estés obteniendo
        $boat_id = $project->boat_id;

        // Obtener el modelo del barco
        $boat = Boats::findOrFail($boat_id);

        // Obtener el modelo del cliente asociado al barco
        $client = $boat->clients;

        // Ahora puedes obtener el id del cliente
        $client_id = $client->client_id;

          return redirect()->route('clients.show', ['client' => $client_id])->with('success', 'Proyecto creado correctamente.');
      } catch (\Exception $e) {

    // Obtener el id del barco desde el formulario o donde lo estés obteniendo
    $boat_id = $project->boat_id;

    // Obtener el modelo del barco
    $boat = Boats::findOrFail($boat_id);

    // Obtener el modelo del cliente asociado al barco
    $client = $boat->clients;

    // Ahora puedes obtener el id del cliente
    $client_id = $client->client_id;

    return redirect()->route('clients.show', ['client' => $client_id])->with('error', 'Ha ocurrido un error al crear el proyecto.');
      }
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
        return view('projects.edit', compact('project','project'));

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

            // Obtener el id del barco desde el formulario o donde lo estés obteniendo
          $boat_id = $project->boat_id;

          // Obtener el modelo del barco
          $boat = Boats::findOrFail($boat_id);

          // Obtener el modelo del cliente asociado al barco
          $client = $boat->clients;

          // Ahora puedes obtener el id del cliente
          $client_id = $client->client_id;

            return redirect()->route('clients.show', ['client' => $client_id])->with('success', 'Proyecto actualizada correctamente.');
        } catch (\Exception $e) {
               // Obtener el id del barco desde el formulario o donde lo estés obteniendo
          $boat_id = $project->boat_id;

          // Obtener el modelo del barco
          $boat = Boats::findOrFail($boat_id);

          // Obtener el modelo del cliente asociado al barco
          $client = $boat->clients;

          // Ahora puedes obtener el id del cliente
          $client_id = $client->client_id;
            // Handle the exception
            return redirect()->route('clients.show', ['client' => $client_id])->with('error', 'Ha ocurrido un error al actualizar el proyecto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    try{
            $project = Projects::find($id);
            $project->delete();
            // Obtener el id del barco desde el formulario o donde lo estés obteniendo
            $boat_id = $project->boat_id;

            // Obtener el modelo del barco
            $boat = Boats::findOrFail($boat_id);

            // Obtener el modelo del cliente asociado al barco
            $client = $boat->clients;

            // Ahora puedes obtener el id del cliente
            $client_id = $client->client_id;

            return redirect()->route('clients.show', ['client' => $client_id])->with('success', 'Proyecto borrado correctamente.');
        } catch (\Exception $e) {
               // Obtener el id del barco desde el formulario o donde lo estés obteniendo
          $boat_id = $project->boat_id;

          // Obtener el modelo del barco
          $boat = Boats::findOrFail($boat_id);

          // Obtener el modelo del cliente asociado al barco
          $client = $boat->clients;

          // Ahora puedes obtener el id del cliente
          $client_id = $client->client_id;
            // Handle the exception
            return redirect()->route('clients.show', compact('client'))->with('error', 'Ha ocurrido un error al borrar el proyecto.');
           // ['client' => $client_id])
        }
    }


}
