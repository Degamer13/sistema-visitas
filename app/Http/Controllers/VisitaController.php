<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use App\Service\PDFService;
use Illuminate\Http\Request;
use Carbon\Carbon;


class VisitaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:visita-list|visita-create|visita-edit|visita-delete')->only('index');
         $this->middleware('permission:visita-create', ['only' => ['create','store']]);
         $this->middleware('permission:visita-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:visita-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request, PDFService $pdf)
    {
        $buscarpor=$request->get('buscarpor');
        $visitas = Visita::where('cedula','like','%'.$buscarpor.'%')->paginate(5);
        if($request->get("action") == "pdf"){
            $map = $visitas->items();
            $collection = collect($map);
            $coa = $collection->map(function ($item) {
                return $item->attributesToArray();
            });
            $pdf->TablaGenerica($coa->toArray(), "VISITAS", false );
        }
        return view('visitas.index',compact('visitas', 'buscarpor'));


    }
    public function create()
    {
        return view('visitas.create');
    }

    public function store(Request $request)
    {

        request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:visitas',
            'instituto' => 'required',
            'descripcion' => 'required',
            'salida' => 'required',
        ]);

        Visita::create($request->all());
        return redirect()->route('visitas.index')->with('success', 'Visita creada exitosamente');
    }

    public function show($id)
    {
        $visita = Visita::findOrFail($id);

      // Obtener la fecha actual como un objeto Carbon
    $fechaActual = Carbon::today();

    // Obtener la fecha de salida de la visita como un objeto Carbon
    $fechaSalida = Carbon::parse($visita->salida);

    // Verificar si la fecha de salida es igual o anterior a la fecha actual
    $salidaHoy = $fechaSalida->lte($fechaActual);

        return view('visitas.show', compact('visita', 'salidaHoy'));
    }

    public function edit($id)
    {
        $visita = Visita::findOrFail($id);
        return view('visitas.edit', compact('visita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'instituto' => 'required',
            'descripcion' => 'required',
            'salida' => 'required',
        ]);

        $visita = Visita::findOrFail($id);
        $visita->update($request->all());

        return redirect()->route('visitas.index')->with('success', 'Visita actualizada exitosamente');
    }

    public function destroy($id)
    {
        $visita = Visita::findOrFail($id);
        $visita->delete();

        return redirect()->route('visitas.index')->with('success', 'Visita eliminada exitosamente');
    }
}
