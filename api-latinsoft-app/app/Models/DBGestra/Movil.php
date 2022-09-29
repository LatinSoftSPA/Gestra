<?php

namespace App\Models\DBGestra;

use App\Models\DBGestra\Configuracion as Model;
use Illuminate\Support\Facades\DB;

class Movil extends Model
{
    protected $table = 'tb_moviles';
    protected $primaryKey = 'nume_movil';

    protected $fillable = [
        'nume_movil', 'pate_movil', 'docu_empre', 'docu_perso',
        'docu_condu', 'codi_licen', 'ulti_servi', 'anio_movil',
        'fech_revis', 'habilitado', 'codi_equip', 'user_modif'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function _listar($request)
    {
        try {
            $docu_empre = $request->docu_empre;
            return Movil::where('docu_empre', $docu_empre)->get();
        } catch (\Exception $e) {
            DB::rollback();
            return response($e->getMessage(), 500);
        }
    }

    public static function _buscar($request)
    {
        $nume_movil = $request->nume_movil;
        $pate_movil = $request->pate_movil;
        $docu_empre = $request->docu_empre;
        try {
            $obj = Movil::where('docu_empre', $docu_empre)
                ->where('pate_movil', $pate_movil)
                ->where('nume_movil', $nume_movil)
                ->get();
            return $obj;
        } catch (\Exception $e) {
            DB::rollback();
            return response($e->getMessage(), 500);
        }
    }

    public static function _crear($request)
    {
        try {
            $obj = new Movil($request);
            $obj->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response($e->getMessage(), 500);
        }
    }


    public static function _actualizar($request)
    {
        try {
            $obj = Movil::_buscar($request);
            $obj[0]->update($request->toArray());
            return $obj;
        } catch (\Exception $e) {
            // DB::rollback();
            return response($e->getMessage(), 500);
        }
    }

    public static function _eliminar($request)
    {
        try {
            $obj = Movil::destroy($request->toArray());
            return $obj;
        } catch (\Exception $e) {
            // DB::rollback();
            return response($e->getMessage(), 500);
        }
    }
}
