import { http } from "./http_services";

export function registrar_practica($data) {
    return http().post(
        '/registrar-practica', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function verificar_asignacion($id) {
    return http().get('/verificar-asignacion?id='+$id);
}
