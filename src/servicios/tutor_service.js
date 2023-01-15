import { http } from "./http_services";

export function mis_asignaciones($id, $tipo) {
    return http().get('/tutor/mis-asignaciones?id='+$id+'&tipo='+$tipo);
}

export function registrar_observacion($data) {
    return http().post(
        '/registrar-observacion', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function mis_observaciones($id, $tipo) {
    return http().get('/tutor/mis-observaciones?id='+$id+'&tipo='+$tipo);
}