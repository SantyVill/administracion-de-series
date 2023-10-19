<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Intenta realizar una prueba de conexión a la base de datos
        try {
            DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            // Si ocurre una excepción, significa que no hay conexión a la base de datos
            return view('home');
        }
        return DB::connection()->getDatabaseName();
        // Si la prueba de conexión fue exitosa, redirige a la vista 'series.index'
        //return redirect()->route('series.index');
    }

    public function guardar_configuracion(Request $request){
        $request->validate([
            'servidor' => 'required',
            'puerto' => 'required',
            'base_datos' => 'required',
            'usuario' => 'required',
            'contrasena' => 'required',
        ]);

       // Obtener los valores del formulario
       $servidor = $request->input('servidor');
       $puerto = $request->input('puerto');
       $base_datos = $request->input('base_datos');
       $usuario = $request->input('usuario');
       $contrasena = $request->input('contrasena');

       // Obtener el contenido actual del archivo .env
       $contenido = file_get_contents(base_path('.env'));

       // Reemplazar los valores en el contenido
       $contenido = preg_replace('/DB_HOST=.*/', 'DB_HOST=' . $servidor, $contenido);
       $contenido = preg_replace('/DB_PORT=.*/', 'DB_PORT=' . $puerto, $contenido);
       $contenido = preg_replace('/DB_DATABASE=.*/', 'DB_DATABASE=' . $base_datos, $contenido);
       $contenido = preg_replace('/DB_USERNAME=.*/', 'DB_USERNAME=' . $usuario, $contenido);
       $contenido = preg_replace('/DB_PASSWORD=.*/', 'DB_PASSWORD=' . $contrasena, $contenido);

       // Guardar el contenido modificado en el archivo .env
       file_put_contents(base_path('.env'), $contenido);

       // Puedes agregar un mensaje de éxito o redireccionar a otra página aquí
       return redirect()->back()->with('success', 'Configuración de la base de datos guardada con éxito');
    }
}
