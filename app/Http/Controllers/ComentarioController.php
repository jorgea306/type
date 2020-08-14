<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class ComentarioController extends Controller{

    // //auth
    // public function __construct(){

    //     $this->middleware('auth');
    // }

    public function mostrar(){

        return view('/panel/comentario/comentario');
    }

    //leer
    public function leer(){

        $comentarios = Comentario::paginate(10);;

        return view('/panel/comentario/comentario',compact('comentarios'));
    }
}
