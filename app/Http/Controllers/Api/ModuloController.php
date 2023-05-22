<?php

namespace App\Http\Controllers\api;

use App\Models\Modulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::all();
        return response()->json($modulos);
    }

    public function store(Request $request)
    {
        $nombre = $request->input('nombre');
        $numuf = $request->input('numUF');
        $modulo = Modulo::create([
            'nombre' => $nombre,
            'numUF' => $numuf
        ]);
        return response()->json($modulo, 201);
    }

    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        return response()->json($modulo);
    }

    public function update(Request $request, $id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->update($request->all());
        return response()->json($modulo);
    }

    public function destroy($id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->delete();
        return response()->json(null, 204);
    }
}
