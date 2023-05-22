<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Modulo;
use App\Models\ModuloUF;
use App\Models\ProfeModulo;
use Illuminate\Http\Request;
use App\Models\UnidadFormativa;
use Illuminate\Support\Facades\Auth;
use App\Models\AlumnoModulo;



class ModuloController extends Controller
{
    public function showModulos()
    {
        $modulos = Modulo::paginate(10);
        return view('funcionalidad.listamodulos', compact('modulos'));
    }

    public function misModulos()
    {
        $userId = Auth::id();

        $modulos = ProfeModulo::where('id_user', $userId)
                    ->with(['user' => function ($query) {
                        $query->select('id_user', 'name');
                    }])
                    ->with(['modulo' => function ($query) {
                        $query->select('id_modulo', 'nombre');
                    }])
                    ->get();

        return view('funcionalidad.mismodulos', compact('modulos'));
    }

    public function viewAddModulo(){
        $modulos = Modulo::paginate(10);
        return view('funcionalidad.addmodulo', compact('modulos'));
    }

    public function addModulo(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            // Agrega aquí las reglas de validación para otros campos del módulo
        ]);

        // Si se llega a este punto, significa que los datos son válidos

        $modulo = new Modulo();
        $modulo->nombre = $validatedData['nombre'];
        // Asigna los demás valores de los campos del módulo

        $modulo->save();

        return redirect()->back()->with('success', 'El módulo ha sido añadido correctamente.');
    }

    public function viewAddUf(){

        $ufes = UnidadFormativa::paginate(10);
        return view('funcionalidad.adduf', compact('ufes'));
    }

    public function addUf(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            // Agrega aquí las reglas de validación para otros campos del módulo
        ]);

        // Si se llega a este punto, significa que los datos son válidos

        $uf = new UnidadFormativa();
        $uf->nombre = $validatedData['nombre'];
        // Asigna los demás valores de los campos del módulo

        $uf->save();

        return redirect()->back()->with('success', 'La UF ha sido añadido correctamente.');
    }

    public function viewDeleteUser(){
        $users = User::paginate(10);
        return view('funcionalidad.deleteUser', compact('users'));
    }

    public function deleteUser(Request $request)
    {
        $id = $request->input('iduser');

        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'El user ha sido eliminado correctamente.');
        }
        return redirect()->back()->with('error', 'No se encontró el user especificado.');
    }


    //RECORRER LA TABLA MODULO_UF Y MOSTRAR LOS NOMBRES DE LOS MÓDULOS Y LAS UNIDADES FORMATIVAS
    public function mostrarFormulario()
    {
        $modulos = Modulo::all();
        $unidadesFormativas = UnidadFormativa::all();

        // return view('funcionalidad.modulouf', compact('modulos', 'unidadesFormativas'));

        $ufes = ModuloUF::paginate(10);

        // Obtener los nombres de los módulos y las unidades formativas
        $moduloss = Modulo::pluck('nombre', 'id_modulo');
        $ufs = UnidadFormativa::pluck('nombre', 'id_uf');

        return view('funcionalidad.modulouf', compact('ufes', 'moduloss', 'ufs', 'modulos', 'unidadesFormativas'));
    }

    public function guardarRelacion(Request $request)
    {
        $idModulo = $request->input('modulo');
        $idUF = $request->input('unidadFormativa');

        // Guardar la relación en la tabla modulo_uf
        ModuloUF::create([
            'id_modulo' => $idModulo,
            'id_uf' => $idUF
        ]);

        return redirect()->back()->with('success', 'La relación ha sido guardada correctamente.');
    }


    public function viewAvaluacion(){

        $users = User::where('rol', 2)->get();
        $selectedUserId = request()->input('user_id');
        $modulos = [];

        if ($selectedUserId) {
            $modulos = AlumnoModulo::where('id_user', $selectedUserId)->pluck('id_modulo');
        }

        return view('funcionalidad.avaluacion', compact('users', 'modulos', 'selectedUserId'));

        // $users = User::where('rol', 2)->get();
        // return view('funcionalidad.avaluacion', compact('users'));
    }

    public function avaluacion(Request $request)
    {
        // $id = $request->input('iduser');

        // $user = User::find($id);
        // if ($user) {
        //     $user->delete();
        //     return redirect()->back()->with('success', 'El user ha sido eliminado correctamente.');
        // }
        // return redirect()->back()->with('error', 'No se encontró el user especificado.');
    }
}
