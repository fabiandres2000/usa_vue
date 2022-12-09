import { http } from "./http_services";

export function asignar_permiso($data) {
    return http().post('/asignar-permiso', $data);
}