<template lang="">
    <v-container fluid class="down-top-padding">
        <v-row>
          <v-col cols="12" lg="12">
            <v-card>
                <v-card-text class="text-left p-5">
                    <h3 style="font-weight: bold; color: #2C4A73;">Gestión de Observaciones</h3>  
                    <h3 style="font-weight: bold; text-align: justify;">Observaciones Realizadas</h3>
                    <hr>
                    <table id="table_asignaciones" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Tema</th>
                                <th>Documento</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in observaciones" :key="index">
                                <td style="text-align: center;">{{item.cedula}}</td>
                                <td style="text-align: center;">{{item.nombre}}</td>
                                <td style="text-align: center;">{{item.tema}}</td>
                                <td style="text-align: center;"> 
                                    <button @click="mostrarPDF(item.archivo)" class="btn btn-info"><i class="fa-solid fa-file-pdf"></i></button>
                                </td>
                                <td style="text-align: center;">{{item.fecha_observacion}}</td>
                                <td style="text-align: center;">{{item.hora_observacion}}</td>
                                <td style="text-align: center;">{{item.observaciones}}</td>
                                <td style="text-align: center;">
                                    <button @click="eliminar_observacion(item.id)" title="Eliminar Observación" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>

    <b-modal
      ref="modalpdf"
      hide-footer
      title="Documento Cargado"
      size="xl"
      centered
      header-bg-variant="warning"
      header-text-variant="light"
      :no-close-on-backdrop="true"
    >
      <embed
        id="divPdf"
        :src="rutaPdf"
        type="application/pdf"
        width="100%"
        height="650px"
      />
      <hr />
      <div class="text-right">
        <button
          type="button"
          class="btn btn-danger"
          @click="cerrarModal"
        >
          <i class="fa fa-window-close"></i> Cancelar
        </button>
      </div>
    </b-modal>
  </v-container>
</template>
<script>

import * as tutorService from "../../servicios/tutor_service"
import "jquery/dist/jquery.min.js";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
import store from "../../store";

export default {
    data() {
        return {
            observaciones: [],
            id_tutor: 0,
            abrev: "",
            rutaPdf: ""
        }
    },
    mounted() {
        if(this.$session.get("tipo") == "Tutor SP"){
            this.id_tutor = this.$session.get("id_tutor_sp");
            this.abrev = "SP"
        }else{
            this.id_tutor = this.$session.get("id_tutor_usa");
            this.abrev = "USA"
        }
        this.mis_observaciones();
    },
    methods: {
        crearDataTable() {
            $("#table_asignaciones").dataTable().fnDestroy();
            setTimeout(() => {
                $('#table_asignaciones').DataTable({
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
        async mis_observaciones(){
            await tutorService.mis_observaciones(this.id_tutor, this.abrev).then(respuesta => {
                this.observaciones = respuesta.data.observaciones;
                this.crearDataTable();
            });
        },
        eliminar_observacion(){

        },
        mostrarPDF(ruta){
            this.rutaPdf = store.state.apiURL+"archivos_observacion/"+ ruta;
            this.$refs.modalpdf.show(); 
        },
        cerrarModal(){
            this.$refs.modalpdf.hide();
        },
    }, 
}
</script>
<style>
    label{
        color: #2c4a73;
        font-weight: bold;
    }

    #table_asignaciones {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table_asignaciones td, #table_asignaciones th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table_asignaciones tr:nth-child(even){background-color: #f2f2f2;}

    #table_asignaciones tr:hover {background-color: #ddd;}

    #table_asignaciones th {
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