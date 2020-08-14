<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UsuarioController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string',],
            'domicilio' => ['required', 'string',],
            'tel' => ['required', 'string',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'domicilio' => $data['domicilio'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_empleado' => 1
        ]);
    }

    //ABM Usuario
    //leer
    public function leer(Request $request){

        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        $variablesurl = $request->all();

        $usuarios = User::isempleado()
        ->isadmin()
        ->buscarpor($tipo, $buscar)
        ->paginate(5)
        ->appends($variablesurl);

        return view('panel.user.user', compact('usuarios'));
    }

    //acceder editar
    public function editar($id){

        $usuario = User::findOrFail($id);

        return view('panel.user.user_editar',compact('usuario'));
    }

    //update
    public function update(Request $request, $id){

        //validacion
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'apellido' => 'required',
            'domicilio' => 'required',
            'tel'=>'required'
        ]);

        $usuarioUpdate = User::findOrFail($id);

        $usuarioUpdate->name = $request->name;
        $usuarioUpdate->email = $request->email;
        $usuarioUpdate->apellido = $request->apellido;
        $usuarioUpdate->domicilio = $request->domicilio;
        $usuarioUpdate->tel = $request->tel;


        $usuarioUpdate->save();

        return redirect('user')->with('mensaje', 'Usuario actualizado con exito!');

    }

    //baja
    public function baja($id){

        $usuarioEliminar = User::findOrFail($id);
        $usuarioEliminar->delete();

        return redirect('user')->with('mensaje', 'Usuario eliminado con exito!');
    }

    //exportar a pdf
    public function exporPdf(){

        $usuarios = User::get();

        $pdf = PDF::loadView('pdf.userpdf', compact('usuarios'));

        return $pdf->download('usuarios-panzotti-lista.pdf');

    }


    //-- ABM EMPLEADO -- //
    public function leerEmpleado(Request $request){

        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        $variablesurl = $request->all();

        $empleados = User::empleado()
        ->buscarpor($tipo, $buscar)
        ->paginate(5)
        ->appends($variablesurl);

        return view('panel.user.empleado', compact('empleados'));
    }

    //-- ACCEDER EDITAR -- //
    public function editarEmpleado($id){

        $empleado = User::findOrFail($id);

        return view('panel.user.empleado_editar',compact('empleado'));
    }

    //-- UPDATE EMPLEADO -- //
    public function updateEmpleado(Request $request, $id){

        //validacion
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'apellido' => 'required',
            'domicilio' => 'required',
            'tel'=>'required'
        ]);

        $EmpleadoUpdate = User::findOrFail($id);

        $EmpleadoUpdate->name = $request->name;
        $EmpleadoUpdate->email = $request->email;
        $EmpleadoUpdate->apellido = $request->apellido;
        $EmpleadoUpdate->domicilio = $request->domicilio;
        $EmpleadoUpdate->tel = $request->tel;


        $EmpleadoUpdate->save();

        return redirect('empleado')->with('mensaje', 'Empleado actualizado con exito!');

    }

    //-- BAJA EMPLEADO -- //
    public function bajaEmpleado($id){

        $empleadoEliminar = User::findOrFail($id);
        $empleadoEliminar->delete();

        return redirect('empleado')->with('mensaje', 'Empleado eliminado con exito!');
    }

    //-- ACCEDER ALTA EMPLEADO -- //
     public function accederEmpleado(){

        return view('panel.user.empleado_alta');
    }

    //-- ALTA EMPLEADO -- //
    public function altaEmpleado(Request $request){

         $request->validate([
            'name' => 'required',
            'email' => 'required',
            'apellido' => 'required',
            'domicilio' => 'required',
            'tel'=>'required'
        ]);

        $nuevoEmpleado = new User();

        $nuevoEmpleado->name = $request->name;
        $nuevoEmpleado->email = $request->email;
        $nuevoEmpleado->apellido = $request->apellido;
        $nuevoEmpleado->domicilio = $request->domicilio;
        $nuevoEmpleado->password = $request->password;
        $nuevoEmpleado->is_empleado = 1;
        $nuevoEmpleado->tel = $request->tel;

        $nuevoEmpleado->save();

        return redirect('empleado')->with('mensaje', 'Empleado agregado con exito!');
    }
}
