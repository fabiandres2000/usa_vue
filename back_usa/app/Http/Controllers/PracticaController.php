<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        ->insert([
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

    #region tutores
    public function listar_tutores_usa(){
        $tutores = DB::connection("mysql")
        ->table("tutor_usa")
        ->select("*")
        ->get();

        return response()->json([
            'tutores' => $tutores,
        ]);
    }

    public function registrar_tutor_usa(){
        $data = request()->all();
        $password = Hash::make(Str::random(8));

        $usuarios = DB::connection("mysql")
        ->table("usuario")
        ->where("correo", $data["correo"])
        ->select("*")
        ->get();

        if(count($usuarios) != 0){
            return response()->json([
                'respuesta' => "Existe un usuaio registrado con ese correo.",
                'codigo' => 0,
            ]);
        }else{

            $documento_tmp1 = $data['documento_contrato']; 
            if ($documento_tmp1->isValid()) {    
                $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
            }else{
                $filename1 = "NADA";
            }
        
            $insert = DB::connection("mysql")
            ->table("tutor_usa")
            ->insert([
                'nombres' => $data["nombres"],
                'apellidos' => $data["apellidos"],
                'correo'=> $data["correo"],
                'celular'=> $data["celular"],
                'cedula'=> $data["cedula"],
                'campo'=> $data["campo"],
                'fecha'=> $data["fecha"],
                'documento_contrato'=> $filename1,
            ]);
    
            if($insert){
                  
                if ($documento_tmp1->isValid()) {    
                    $documento_tmp1->move(public_path().'/contratos_tutores_usa/', $filename1);
                }
                
                DB::connection("mysql")
                ->table("usuario")
                ->insert([
                    'correo' => $data["correo"],
                    'password' =>md5($password),
                    'nombre' => $data["nombres"]." ".$data["apellidos"],
                    'foto'=> "pic.png",
                    'tipo'=> "Tutor USA",
                ]);

                $objeto = new EmailController();
                $objeto->enviar_correo($data["correo"], $data["nombres"]." ".$data["apellidos"], $password, "Registro Tutor USA");

                return response()->json([
                    'respuesta' => "Tutor Registrado Correctamente!",
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

    public function editar_tutor_usa()
    {
        $data = request()->all();
        
        File::delete(public_path('contratos_tutores_usa/'.$data['documento_contrato_viejo']));

        $documento_tmp1 = $data['documento_contrato']; 
        if ($documento_tmp1->isValid()) {    
            $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
        }else{
            $filename1 = "NADA";
        }
       
        $tutor_viejo = DB::connection("mysql")
        ->table("tutor_usa")
        ->where("id", $data["id"])
        ->select("*")
        ->first();
 
        $update = DB::connection("mysql")
        ->table("tutor_usa")
        ->where("id", $data['id'])
        ->update([
            'nombres' => $data["nombres"],
            'apellidos' => $data["apellidos"],
            'correo'=> $data["correo"],
            'celular'=> $data["celular"],
            'cedula'=> $data["cedula"],
            'campo'=> $data["campo"],
            'fecha'=> $data["fecha"],
            'documento_contrato'=> $filename1,
        ]);

        if($update){
                
            if ($documento_tmp1->isValid()) {    
                $documento_tmp1->move(public_path().'/contratos_tutores_usa/', $filename1);
            }

            DB::connection("mysql")
            ->table("usuario")
            ->where("correo", $tutor_viejo->correo)
            ->update([
                'correo' => $data["correo"],
                'nombre' => $data["nombres"]." ".$data["apellidos"],
            ]);

            return response()->json([
                'respuesta' => "Tutor Modificado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function cambiar_estado_tutor_usa()
    {
        $data = request()->all();
        
        $tutor = DB::connection("mysql")
        ->table("tutor_usa")
        ->where("id", $data["id"])
        ->select("*")
        ->first();

        if($tutor->estado == 1){
            $update = DB::connection("mysql")
            ->table("tutor_usa")
            ->where("id", $data['id'])
            ->update([
                'estado' => '0',
            ]);
        }else{
            $update = DB::connection("mysql")
            ->table("tutor_usa")
            ->where("id", $data['id'])
            ->update([
                'estado' => '1',
            ]);
        }

        if($update){
           
            return response()->json([
                'respuesta' => "Estado Actualizado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function listar_tutores_sp(){
        $tutores = DB::connection("mysql")
        ->table("tutor_sp")
        ->join("convenio","convenio.id","tutor_sp.id_convenio")
        ->select("tutor_sp.*","convenio.razon_social")
        ->get();

        return response()->json([
            'tutores' => $tutores,
        ]);
    }

    public function registrar_tutor_sp(){
        $data = request()->all();
        $password = Hash::make(Str::random(8));

        $usuarios = DB::connection("mysql")
        ->table("usuario")
        ->where("correo", $data["correo"])
        ->select("*")
        ->get();

        if(count($usuarios) != 0){
            return response()->json([
                'respuesta' => "Existe un usuaio registrado con ese correo.",
                'codigo' => 0,
            ]);
        }else{

            $insert = DB::connection("mysql")
            ->table("tutor_sp")
            ->insert([
                'nombres' => $data["nombres"],
                'apellidos' => $data["apellidos"],
                'correo'=> $data["correo"],
                'celular'=> $data["celular"],
                'cedula'=> $data["cedula"],
                'campo'=> $data["campo"],
                'fecha'=> $data["fecha"],
                'id_convenio'=> $data["convenio"],
            ]);
    
            if($insert){
             
                DB::connection("mysql")
                ->table("usuario")
                ->insert([
                    'correo' => $data["correo"],
                    'password' =>md5($password),
                    'nombre' => $data["nombres"]." ".$data["apellidos"],
                    'foto'=> "pic.png",
                    'tipo'=> "Tutor SP",
                ]);

                $objeto = new EmailController();
                $objeto->enviar_correo($data["correo"], $data["nombres"]." ".$data["apellidos"], $password, "Registro Tutor SP");

                return response()->json([
                    'respuesta' => "Tutor Registrado Correctamente!",
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

    public function editar_tutor_sp()
    {
        $data = request()->all();
       
        $tutor_viejo = DB::connection("mysql")
        ->table("tutor_sp")
        ->where("id", $data["id"])
        ->select("*")
        ->first();
 
        $update = DB::connection("mysql")
        ->table("tutor_sp")
        ->where("id", $data['id'])
        ->update([
            'nombres' => $data["nombres"],
            'apellidos' => $data["apellidos"],
            'correo'=> $data["correo"],
            'celular'=> $data["celular"],
            'cedula'=> $data["cedula"],
            'campo'=> $data["campo"],
            'fecha'=> $data["fecha"],
            'id_convenio'=> $data["convenio"],
        ]);

        if($update){
                
            DB::connection("mysql")
            ->table("usuario")
            ->where("correo", $tutor_viejo->correo)
            ->update([
                'correo' => $data["correo"],
                'nombre' => $data["nombres"]." ".$data["apellidos"],
            ]);

            return response()->json([
                'respuesta' => "Tutor Modificado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }
    #endregion tutores
}
