<?php

namespace App\Http\Controllers\Gestra;

use App\Http\Controllers\Controller;
use App\Models\DBGestra\Movil;
use Illuminate\Http\Request;


class MovilesController extends Controller
{
    // private $_docu_empre = 96711420;

    public function index(Request $request)
    {
        $listado = Movil::_listar($request);

        if (count($listado) == 0) {
            return response()->json(['error' => 1, 'message' => 'No se han Encontrado Moviles...!!!'], 404);
        }
        return response()->json(['error' => 0, 'message' => 'Moviles Encontrado Exitosamente...!!!', 'moviles' => $listado], 200);
    }

    public function show(Request $request)
    {
        $obj = Movil::_buscar($request);
        if (count($obj) == 0) {
            return response()->json(['error' => 1, 'message' => 'No se ha Encontrado el Movil...!!!'], 404);
        }
        return response()->json(['error' => 0, 'message' => 'Movil Encontrado Exitosamente...!!!', 'movil' => $obj], 200);
    }

    public function store(Request $request)
    {
        $obj = Movil::_buscar($request);
        if (count($obj) == 0) {
            Movil::_crear($request->toArray());
            return response()->json(['error' => 0, 'message' => 'Movil Registrado Exitosamente...!!!'], 200);
        }
        return response()->json(['error' => 1, 'message' => 'El Movil ya se Encuentra Resgistado en la DB...!!!'], 500);
    }

    public function update(Request $request)
    {
        $obj = Movil::_buscar($request);
        if (count($obj) == 0) {
            return response()->json(['error' => 1, 'message' => 'No se ha Encontrado el Movil...!!!'], 404);
        }
        Movil::_actualizar($request);
        return response()->json(['error' => 0, 'message' => 'Movil Actualizado Exitosamente...!!!'], 200);
    }

    public function destroy(Request $request)
    {
        $obj = Movil::_buscar($request);
        if (count($obj) == 0) {
            return response()->json(['error' => 1, 'message' => 'No se ha Encontrado el Movil...!!!'], 404);
        }
        Movil::_eliminar($request);
        return response()->json(['error' => 0, 'message' => 'Movil Eliminado Exitosamente...!!!'], 200);
    }
}
