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

export function listar_tutores_usa() {
    return http().get('/tutores-usa');
}

export function registrar_tutor_usa($data) {
    return http().post(
        '/registrar-tutor-usa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function editar_tutor_usa($data) {
    return http().post(
        '/editar-tutor-usa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function eliminar_tutuor_usa($id) {
    return http().get('/cambiar-estado-tutor-usa?id='+$id);
}

export function listar_tutores_sp() {
    return http().get('/tutores-sp');
}

export function registrar_tutor_sp($data) {
    return http().post('/registrar-tutor-sp', $data);
}

export function editar_tutor_sp($data) {
    return http().post('/editar-tutor-sp', $data);
}

export function cambiar_estado_tutor_sp($id) {
    return http().get('/cambiar-estado-tutor-sp?id='+$id);
}
