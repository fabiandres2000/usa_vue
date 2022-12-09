<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;

class PracticaController extends Controller
{
    public function listar_convenios(){
        $convenios = DB::connection("mysql")
        ->table("convenio")
        ->where("estado", '1')
        ->select("*")
        ->get();

        foreach ($convenios as $item) {
            $fecha_actual = date('Y-m-d');
            if($item->fecha_final >= $fecha_actual){
                $item->estado = "Vigente";
            }else{
                $item->estado = "No Vigente";
            }
        }
        
        return response()->json([
            'convenios' => $convenios,
        ]);
    }

    public function registrar_convenio()
    {
        $data = request()->all();
        
        
        $documento_tmp1 = $data['documento_convenio']; 
        if ($documento_tmp1->isValid()) {    
            $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
        }else{
            $filename1 = "NADA";
        }
       
 
        $insert = DB::connection("mysql")
        ->table("convenio")
        ->insertGetId([
            'nit' => $data["nit"],
            'razon_social' => $data["razon_social"],
            'direccion'=> $data["direccion"],
            'representante_legal'=> $data["representante_legal"],
            'fecha_inicio'=> $data["fecha_inicio"],
            'fecha_final'=> $data["fecha_final"],
            'campo_educativo'=> $data["campo_educativo"],
            'campo_social'=> $data["campo_social"],
            'campo_organizacional'=> $data["campo_organizacional"],
            'campo_clinico_salud'=> $data["campo_clinico_salud"],
            'campo_juridico'=> $data["campo_juridico"],
            'documento_convenio'=> $filename1,
        ]);

        if($insert){
                
            if ($documento_tmp1->isValid()) {    
                $documento_tmp1->move(public_path().'/documentos_convenios/', $filename1);
            }

            return response()->json([
                'respuesta' => "Convenio Registrado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function editar_convenio()
    {
        $data = request()->all();
        
        File::delete(public_path('documentos_convenios/'.$data['documento_convenio_viejo']));

        $documento_tmp1 = $data['documento_convenio']; 
        if ($documento_tmp1->isValid()) {    
            $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
        }else{
            $filename1 = "NADA";
        }
       
 
        $update = DB::connection("mysql")
        ->table("convenio")
        ->where("id", $data['id'])
        ->update([
            'nit' => $data["nit"],
            'razon_social' => $data["razon_social"],
            'direccion'=> $data["direccion"],
            'representante_legal'=> $data["representante_legal"],
            'fecha_inicio'=> $data["fecha_inicio"],
            'fecha_final'=> $data["fecha_final"],
            'campo_educativo'=> $data["campo_educativo"],
            'campo_social'=> $data["campo_social"],
            'campo_organizacional'=> $data["campo_organizacional"],
            'campo_clinico_salud'=> $data["campo_clinico_salud"],
            'campo_juridico'=> $data["campo_juridico"],
            'documento_convenio'=> $filename1,
        ]);

        if($update){
                
            if ($documento_tmp1->isValid()) {    
                $documento_tmp1->move(public_path().'/documentos_convenios/', $filename1);
            }

            return response()->json([
                'respuesta' => "Convenio Modificado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function eliminar_convenio()
    {
        $data = request()->all();
        
    
        $update = DB::connection("mysql")
        ->table("convenio")
        ->where("id", $data['id'])
        ->update([
            'estado' => '0',
        ]);

        if($update){
           
            return response()->json([
                'respuesta' => "Convenio Eliminado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }
}
