<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;

class NotaController extends Controller
{
    //leer
    public function leer(Request $request){

        $tipo = $request->get('tipo');

        $variablesurl = $request->all();

        if ($tipo == "mas reciente") {

            $notas = Nota::sinterminar()->orderBy('created_at', 'DESC')->paginate(8)->appends($variablesurl);

            return view('panel.nota.notas',compact('notas'));
        }

        if ($tipo == "menos reciente") {

            $notas = Nota::sinterminar()->orderBy('created_at', 'ASC')->paginate(8)->appends($variablesurl);

            return view('panel.nota.notas',compact('notas'));
        }

        if ($tipo == "mas urgente") {

            $notas = Nota::sinterminar()->orderBy('urgencia', 'ASC')->paginate(8)->appends($variablesurl);

            return view('panel.nota.notas',compact('notas'));
        }

        if ($tipo == "menos urgente") {

            $notas = Nota::sinterminar()->orderBy('urgencia', 'DESC')->paginate(8)->appends($variablesurl);

            return view('panel.nota.notas',compact('notas'));
        }

        $notas = Nota::sinterminar()->paginate(8);

        return view('panel.nota.notas',compact('notas'));
    }

    public function archivo(){

        $notas = Nota::terminado()->paginate(8);

        return view('panel.nota.archivo',compact('notas'));
    }

    public function archivarNota($id){

        $nota = Nota::findOrFail($id);
        $nota->terminado = 1;
        $nota->save();

        return redirect('notas')->with('mensaje', 'nota archivada!');
    }

    //acceder alta
    public function acceder(){

        return view('panel.nota.nota_alta');
    }

    //alta
    public function alta(Request $request){

        //validacion
        $request->validate([
            'descripcion' => 'required'
        ]);

        $nuevaNota = new Nota;

        $nuevaNota->descripcion = $request->descripcion;
        $nuevaNota->urgencia = $request->input('urgencia');

        $nuevaNota->save();

        return redirect('notas')->with('mensaje', 'Nueva Tarea agregada!');
    }

    //baja
    public function baja($id){

        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();

        return redirect()->back()->with('mensaje', 'tarea eliminada con exito');
    }
}
