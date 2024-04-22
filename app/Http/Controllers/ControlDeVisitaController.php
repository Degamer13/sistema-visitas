<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlDeVisita;
use App\Models\Visita;
class ControlDeVisitaController extends Controller
{
    public function index(Request $request)
    {
        $cedula = $request->input('cedula');
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        // Consulta inicial sin aplicar filtros
        $query = ControlDeVisita::with('visita');

        // Aplicar filtros si se proporcionan
        if (!empty($cedula)) {
            $query->whereHas('visita', function ($query) use ($cedula) {
                $query->where('cedula', $cedula);
            });
        }
        if (!empty($fechaInicio)) {
            $query->whereDate('created_at', '>=', $fechaInicio);
        }
        if (!empty($fechaFin)) {
            $query->whereDate('created_at', '<=', $fechaFin);
        }

        // Ejecutar la consulta paginada
        $controles = $query->paginate(10);

        // Devolver la vista con los resultados de la consulta
        return view('controles.index', compact('controles', 'cedula', 'fechaInicio', 'fechaFin'));
    }
    public function create()

    {
        $controles = Visita::all();
        return view('controles.create', compact('controles'));
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'hora_entrada' => 'required',
            'hora_salida',
            'id_visita' => 'required',

            // Agrega las reglas de validación para tus campos
        ]);

        // Crear una nueva instancia de ControlDeVisita
        ControlDeVisita::create($request->all());
        // Redireccionar a la página de éxito o mostrar un mensaje
        return redirect()->route('controles.index')->with('success', 'Hora registrada exitosamente');
    }

    public function show($id)
    {
        // Obtener el ControlDeVisita por su ID
        $control = ControlDeVisita::findOrFail($id);

        // Devolver la vista con los datos del ControlDeVisita
        return view('controles.show', compact('controles'));
    }

    public function edit($id)
    {
        $controles = Visita::all();
        // Obtener el ControlDeVisita por su ID
        $control = ControlDeVisita::findOrFail($id);
    
        // Devolver la vista de edición con los datos del ControlDeVisita
        return view('controles.edit', compact('controles', 'control'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'hora_entrada' => 'required',
            'hora_salida',
            'id_visita' => 'required',
            // Agrega las reglas de validación para tus campos
        ]);

        // Obtener el ControlDeVisita por su ID
        $control = ControlDeVisita::findOrFail($id);
        $control->update($request->all());

        // Redireccionar a la página de éxito o mostrar un mensaje
        return redirect()->route('controles.index')->with('success', 'Hora actualizada exitosamente');
    }

    public function destroy($id)
    {
        // Obtener el ControlDeVisita por su ID
        $control = ControlDeVisita::findOrFail($id);

        // Eliminar el ControlDeVisita
        $control->delete();

        // Redireccionar a la página de éxito o mostrar un mensaje
        return redirect()->route('controles.index')->with('success', 'Hora eliminada exitosamente');
    }

    // ...
}



