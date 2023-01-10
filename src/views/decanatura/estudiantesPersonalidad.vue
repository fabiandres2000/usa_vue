<template lang="">
    <v-container fluid class="down-top-padding">
        <v-row>
          <v-col cols="12" lg="12">
            <v-card>
                <v-card-text class="text-left p-5">
                    <h3 style="font-weight: bold; color: #2C4A73;">Test de Personalidad</h3>  
                    <h3 style="font-weight: bold; text-align: justify;">Estudiantes que han respondido el test</h3>
                    <hr>
                    <table id="ep_table" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Semestre</th>
                                <th>Negativismo</th>
                                <th>Aquiescencia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in listaep" :key="index">
                                <td style="text-align: center;">{{item.cedula}}</td>
                                <td style="text-align: center;">{{item.nombre}}</td>
                                <td style="text-align: center;">{{item.semestre}}</td>
                                <td style="text-align: center;">
                                    <p v-if="item.Negativismo >= 150">Negativismo</p>
                                    <p v-if="item.Negativismo < 150">No Negativismo</p>
                                </td>
                                <td style="text-align: center;">
                                    <p v-if="item.Aquiescencia >= 150">Aquiescencia</p>
                                    <p v-if="item.Aquiescencia < 150">No Aquiescencia</p>  
                                </td>
                                <td style="text-align: center;">
                                    <button  @click="ver_resumen(item.id_estudiante)" class="btn btn info" title="Detalle"><i style="color: white" class="fa-solid fa-circle-info"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
  </v-container>
</template>
<script>
import * as decanaturaService from "../../servicios/decanatura_services"
import "jquery/dist/jquery.min.js";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
export default {
    data() {
        return {
            listaep: []
        }
    },
    mounted() {
      this.crearDataTable();  
      this.listar_convenios();
    },
    methods: {
        crearDataTable() {
            $("#ep_table").dataTable().fnDestroy();
            setTimeout(() => {
                $('#ep_table').DataTable({
                "ordering": true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                    "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
                });
            }, 100);
        },
        async listar_convenios() {
            await decanaturaService.lista_ep().then(respuesta => {
                this.listaep = respuesta.data.listaep;
                this.crearDataTable();
            });
        },
        ver_resumen(id_estudiante){
            this.$router.push({ name: "DetallePersonalidad", params: {idEstudiante: id_estudiante}})
        }
    }, 
}
</script>
<style>
    label{
        color: #2c4a73;
        font-weight: bold;
    }

    #ep_table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #ep_table td, #ep_table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #ep_table tr:nth-child(even){background-color: #f2f2f2;}

    #ep_table tr:hover {background-color: #ddd;}

    #ep_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #2C4A73;
        color: white;
    }

    .cen {
        text-align: center;
    }

    input[type=radio] {
        border: 0px;
        height: 1em;
    }
</style>