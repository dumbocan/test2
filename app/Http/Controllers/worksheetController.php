<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Boats;
use App\Models\Worksheet;

class worksheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $project_id = $request->input('project');
    $project = Projects::find($project_id);
    $project_number = $project->project_number;
    $worksheet = Worksheet::where('project_id', $project_id)->paginate(10);
    $totalEffectiveTime = $worksheet->sum('worksheet_effective_time'); // Suma de tiempo efectivo
    $totalDays = Worksheet::where ('project_id' , $project_id)->count('worksheet_id')  ; // cuenta cantidad de registros
    $project = Projects::with('boats')->findOrFail($project_id);
    $boat = $project->boats;
    if ($worksheet->isEmpty()) {


        return view('worksheet.create', compact('project', 'boat'));
    } else {
        return view('worksheet.index', compact('project_number','project_id', 'worksheet', 'totalEffectiveTime','totalDays','boat','project'));
    }
}


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $worksheet_id = $request->input('project_id');
        $project_id = $request->input('project_id');

        $project = Projects::with('boats')->findOrFail($project_id);
        $boat = $project->boats;

        return view('worksheet.create', compact('project', 'boat'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = $request->input('project_id');
        try{
            $worksheet = new Worksheet;

            $worksheet->worksheet_date = $request->input('worksheet_date');
            $worksheet->worksheet_description = $request->input('worksheet_description');
            $worksheet->worksheet_start_time = $request->input('worksheet_start_time');
            $worksheet->worksheet_finish_time = $request->input('worksheet_finish_time');
            $worksheet->worksheet_effective_time = $request->input('worksheet_effective_time');
            $worksheet->project_id = $request->input('project_id');


            $worksheet->save();

            $worksheet_id = $worksheet->worksheet_id;

            return redirect()->route('projects.show', compact('project', 'worksheet_id'))->with('success', 'Hoja de trabajo añadida correctamente.');

        } catch (\Exception $e) {

            return redirect()->route('projects.show', compact( 'worksheet_id'))->with('error', 'Hoja de trabajo añadida correctamente.');
        }


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
    public function destroy($worksheet_id)
{
    // Buscar el Worksheet por su ID
    $worksheet = Worksheet::find($worksheet_id);

    // Verificar si se encontró el Worksheet
    if ($worksheet) {
        // Obtener el project_id del Worksheet
        $project_id = $worksheet->project_id;

        // Eliminar el Worksheet
        $worksheet->delete();

        return redirect()->route('worksheet.index', ['project' => $project_id])->with('success', 'Hoja de trabajo borrada correctamente.');
    } else {
        // Manejar el caso en que no se encontró el Worksheet
        return redirect()->route('worksheet.index')->with('error', 'Hoja de trabajo no encontrada.');
    }
}
}