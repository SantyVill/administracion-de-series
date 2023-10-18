<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $series=Serie::all();
        return view('series.index',compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            request()->validate([
                'titulo'=>'required|max:'.config('tam_numSerie'),
                'descripcion'=>'',
                'fecha_estreno'=>'required|max:'.config('tam_tipo'),
                'estrellas'=>'required|max:'.config('tam_marca'),
                'genero'=>'required|max:'.config('tam_modelo'),
                'precio_alquiler'=>'',
                'atp'=>'',
            ]);

            $serie=Serie::firstOrCreate([
                'titulo'=>ucfirst(request('titulo')),
                'descripcion'=>ucfirst(request('descripcion')),
                'fecha_estreno'=>request('fecha_estreno'),
                'estrellas'=>request('estrellas'),
                'genero'=>ucfirst(request('genero')),
                'precio_alquiler'=>request('precio_alquiler'),
                'atp'=>request('atp'),
            ]);
            
            return redirect()->route('series.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $mensaje = 'Se ha producido un error al intentar cargar los datos';
            return redirect()->back()->with('message', $mensaje);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = Serie::find($id);
        return view('series.show',compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie)
    {
        return view('equipos.edit',compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Serie $serie)
    {
        try {
            request()->validate([
                'titulo'=>'required|max:'.config('tam_numSerie'),
                'descripcion'=>'',
                'fecha_estreno'=>'required|max:'.config('tam_tipo'),
                'estrellas'=>'required|max:'.config('tam_marca'),
                'genero'=>'required|max:'.config('tam_modelo'),
                'precio_alquiler'=>'',
                'atp'=>'',
            ]);

            $serie=Serie::firstOrCreate([
                $serie->titulo=>ucfirst(request('titulo')),
                $serie->descricion=ucfirst(request('descripcion')),
                $serie->fecha_streno=request('fecha_estreno'),
                $serie->estrelas=request('estrellas'),
                $serie->genero=ucfirst(request('genero')),
                $serie->precioalquiler=request('precio_alquiler'),
                $serie->atp=request('atp'),
            ]);
            
            return redirect()->route('series.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $mensaje = 'Se ha producido un error al intentar cargar los datos';
            return redirect()->back()->with('message', $mensaje);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        try {
            $serie->delete();
            return redirect()->route('series.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $mensaje = 'Se ha producido un error al intentar eliminar la serie.'/*  . $e->getMessage() */;
            return redirect()->back()->with('message', $mensaje);
        }
    }
}
