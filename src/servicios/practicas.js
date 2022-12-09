import { http } from "./http_services";

export function listar_convenios() {
    return http().get('/convenios');
}

export function registrar_convenio($data) {
    return http().post(
        '/registrar-convenio', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function editar_convenio($data) {
    return http().post(
        '/editar-convenio', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function eliminar_convenio($id) {
    return http().get('/eliminar-convenio?id='+$id);
}