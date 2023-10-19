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
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* try { */
            request()->validate([
                'titulo'=>'required|max:150',
                'descripcion'=>'required',
                'fecha_estreno'=>'required',
                'estrellas'=>'required|integer|between:1,5',
                'genero'=>'required',
                'precio_alquiler'=>'required',
            ]);

            $serie=Serie::firstOrCreate([
                'titulo'=>ucfirst(request('titulo')),
                'descripcion'=>ucfirst(request('descripcion')),
                'fecha_estreno'=>request('fecha_estreno'),
                'estrellas'=>request('estrellas'),
                'genero'=>ucfirst(request('genero')),
                'precio_alquiler'=>request('precio_alquiler'),
                'ATP'=>request('atp')=="on",
                'estado'=>"AC"
            ]);
            
            return redirect()->route('series.index');
        /* } catch (\Illuminate\Database\QueryException $e) {
            $mensaje = 'Se ha producido un error al intentar cargar los datos';
            return redirect()->back()->with('message', $mensaje);
        } */
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
    public function edit($id)
    {
        $serie = Serie::find($id);
        if ($serie->estado=="AN") {
            return redirect()->route('series.index')->with('message', 'No se puede modificar una serie anulada');
        }
        return view('series.edit',compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        /* try { */
            $serie= Serie::find($id);
            request()->validate([
                'titulo'=>'required|max:150',
                'descripcion'=>'required',
                'fecha_estreno'=>'required',
                'estrellas'=>'required|integer|between:1,5',
                'genero'=>'required',
                'precio_alquiler'=>'required',
            ]);
            
            
                $serie->titulo=ucfirst(request('titulo'));
                $serie->descripcion=ucfirst(request('descripcion'));
                $serie->fecha_estreno=request('fecha_estreno');
                $serie->estrellas=request('estrellas');
                $serie->genero=ucfirst(request('genero'));
                $serie->precio_alquiler=request('precio_alquiler');
                $serie->ATP=request('atp')=="on";
            $serie->save();
            return redirect()->route('series.index');
        /* } catch (\Illuminate\Database\QueryException $e) {
            $mensaje = 'Se ha producido un error al intentar cargar los datos';
            return redirect()->back()->with('message', $mensaje);
        } */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $serie = Serie::find($id);
            $serie->delete();
            return redirect()->route('series.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $mensaje = 'Se ha producido un error al intentar eliminar la serie.'/*  . $e->getMessage() */;
            return redirect()->back()->with('message', $mensaje);
        }
    }

    public function anular($id)
    {
        $serie = Serie::Find($id);
        try {
            $serie->estado="AN";
            $serie->save();
            return redirect()->route('series.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $mensaje = 'Se ha producido un error al intentar eliminar la serie.'/*  . $e->getMessage() */;
            return redirect()->back()->with('message', $mensaje);
        }
    }
}
