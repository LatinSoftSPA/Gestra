<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\DBGestra\Movil;
use Illuminate\Http\Request;



class MovilController extends Controller
{
    public function index(Request $request)
    {
        try {
            $docu_empre = $request->docu_empre;
            $listado = Movil::_listar($docu_empre);
            return response()
                ->json($listado, 200);
        } catch (\Exception $e) {
            return response('No se han Encontrado Moviles', 404);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        try {
            if ($request->pate_movil || $request->nume_movil) {
                $pate_movil = $request->pate_movil;
                $nume_movil = $request->nume_movil;

                $obj = Movil::_buscar($nume_movil, $pate_movil);

                if (count($obj) > 0) {
                    return response()
                        ->json($obj, 200);
                } else {
                    return response('No se Encontro el Movil', 404);
                }
            }
        } catch (\Exception $e) {
            return response('No se Encontro el Movil', 404);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
