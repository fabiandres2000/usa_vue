<template lang="">
    <v-container fluid class="down-top-padding">
        <v-row>
          <v-col cols="12" lg="12">
            <v-card>
                <v-card-text class="text-left p-5">
                    <h3 style="font-weight: bold; color: #2C4A73;">Asiganión de practicantes</h3>  
                    <h3 style="font-weight: bold; text-align: justify;">Estudiantes asignados</h3>
                    <hr>
                    <table id="table_asignaciones" style="width: 100% !important;">
                        <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Semestre</th>
                                <th>Tema</th>
                                <th>Documento</th>
                                <th>Ins. 1</th>
                                <th>Ins. 2</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in asignaciones" :key="index">
                                <td style="text-align: center;">{{item.cedula}}</td>
                                <td style="text-align: center;">{{item.nombre}}</td>
                                <td style="text-align: center;">{{item.semestre}}</td>
                                <td style="text-align: center;">
                                    <p v-if="item.practica != null && item.practica.instrumento">{{item.practica.tema}}</p>
                                    <p v-if="item.practica == null">No ha cargado la información</p>
                                </td>
                                <td style="text-align: center;">
                                    <div v-if="item.practica != null">
                                        <button @click="mostrarPDF(item.practica.proyecto)" class="btn btn-info"><i class="fa-solid fa-file-pdf"></i></button>
                                    </div>
                                    <p v-if="item.practica == null">No ha cargado la información</p>
                                </td>
                                <td style="text-align: center;">
                                    <div v-if="item.practica != null && item.practica.instrumento != 'Ninguno'">
                                        <button @click="downloadExel(item.practica.excel_1)" class="btn btn-success"><i class="fa-solid fa-file-excel"></i></button>
                                    </div>
                                    <p v-if="item.practica != null && item.practica.instrumento == 'Ninguno'">Ninguno</p>
                                    <p v-if="item.practica == null">No ha cargado la información</p>
                                </td>
                                <td style="text-align: center;">
                                    <div v-if="item.practica != null && item.practica.instrumento_2 != 'Ninguno'">
                                        <button @click="downloadExel(item.practica.excel_2)" class="btn btn-success"><i class="fa-solid fa-file-excel"></i></button>
                                    </div>
                                    <p v-if="item.practica != null && item.practica.instrumento_2 == 'Ninguno'">Ninguno</p>
                                    <p v-if="item.practica == null">No ha cargado la información</p>
                                </td>
                                <td style="text-align: center;">
                                    <button v-if="item.practica != null" @click="mostrarModalObservacion(item)" title="Realizar Observación" class="btn btn-primary"><i class="fa-solid fa-comment"></i></button>
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

    <b-modal
      ref="modalobservacion"
      hide-footer
      title="Realizar Observación"
      size="lg"
      centered
      header-bg-variant="warning"
      header-text-variant="light"
      :no-close-on-backdrop="true"
    >
        <div class="row">
            <div class="col-lg-12">
                <h3>{{practica_editar.practica.tema}}</h3>
            </div>
            <form @submit.prevent="registrar_observacion" method="post" ref="form_robs"  style="padding-left: 25px">
                <div class="col-lg-12">
                    <input class="form-control" name="id_practica" type="hidden" v-model="practica_editar.practica.id">
                </div>
                <div class="col-lg-12">
                    <label for="file_obs">Archivo con correcciones</label>
                    <input required class="form-control"  accept=".pdf" name="file_obs" type="file">
                </div>
                <div class="col-lg-12">
                    <label for="file_obs">Archivo con correcciones</label>
                    <textarea required class="form-control" name="observaciones" rows="6" cols="100"></textarea>
                </div>
                <hr />
                <div class="col-lg-12 text-right">
                    <button
                        type="submit"
                        class="btn btn-success"
                        style="margin-right: 10px"
                    >
                    <i class="fa fa-save"></i> Guardar
                    </button>

                    <a
                    class="btn btn-danger"
                    @click="cerrarModal"
                    >
                    <i class="fa fa-window-close"></i> Cancelar
                </a>
                </div>
            </form>
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
            asignaciones: [],
            id_tutor: 0,
            tipo_consulta: 0,
            rutaPdf: "",
            practica_editar: {
                practica: {
                    id: 0,
                    tema: ""
                }
            }, 
            tipo_obs: "",
            abrev: ""
        }
    },
    mounted() {
        if(this.$session.get("tipo") == "Tutor SP"){
            this.id_tutor = this.$session.get("id_tutor_sp");
            this.tipo_consulta = 1;
            this.tipo_obs = "Tutor Sitio de Practica";
            this.abrev = "SP"
        }else{
            this.id_tutor = this.$session.get("id_tutor_usa");
            this.tipo_consulta = 2;
            this.tipo_obs = "Tutor Universidad Sergio Arboleda";
            this.abrev = "USA"
        }
      this.mis_asignaciones();
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
        async mis_asignaciones() {
            await tutorService.mis_asignaciones(this.id_tutor, this.tipo_consulta).then(respuesta => {
                this.asignaciones = respuesta.data.asignaciones;
                this.crearDataTable();
            });
        },
        mostrarPDF(ruta){
            this.rutaPdf = store.state.apiURL+"archivos_practica/"+ ruta;
            this.$refs.modalpdf.show(); 
        },
        cerrarModal(){
            this.$refs.modalpdf.hide();
            this.$refs.modalobservacion.hide();
        },
        mostrarModalObservacion(item){
            this.practica_editar = item;
            this.$refs.modalobservacion.show();
        },
        downloadExel(ruta){
            var label = ruta;
            var url = store.state.apiURL+"archivos_practica/"+ ruta;
            const link = document.createElement('a')
            link.setAttribute('download', label);
            link.href = url
            link.click()
        },
        async registrar_observacion(){
            const formData = new FormData(this.$refs['form_robs']); 
            const data = {};
            for (let [key, val] of formData.entries()) {
                Object.assign(data, { [key]: val })
            }

            Object.assign(data, { 'tipo_obs': this.tipo_obs })
            Object.assign(data, { 'id_tutor': this.id_tutor })
            Object.assign(data, { 'tipo': this.abrev })
            
            await tutorService.registrar_observacion(data).then(respuesta => {
              if(respuesta.data.codigo == 1){
                this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                this.cerrarModal();
              }else{
                this.$swal('Error...', respuesta.data.respuesta, 'error');
              }
          });
        }
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