import { http } from "./http_services";

export function mis_asignaciones($id, $tipo) {
    return http().get('/tutor/mis-asignaciones?id='+$id+'&tipo='+$tipo);
}
