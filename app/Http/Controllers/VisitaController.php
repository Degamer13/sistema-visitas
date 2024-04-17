<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use Illuminate\Http\Request;


class VisitaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:visita-list|visita-create|visita-edit|visita-delete')->only('index');
         $this->middleware('permission:visita-create', ['only' => ['create','store']]);
         $this->middleware('permission:visita-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:visita-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $visitas = Visita::where('cedula','like','%'.$buscarpor.'%')->paginate(5);
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

        // Verificar si la salida es igual a la fecha actual
        $salidaHoy = $visita->salida == now()->toDateString();

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
