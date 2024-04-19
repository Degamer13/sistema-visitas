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

}

