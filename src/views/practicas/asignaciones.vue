<template>
    <v-container fluid class="down-top-padding">
      <v-row>
        <v-col cols="12" lg="12">
          <v-card>
            <v-card-text class="text-left p-4">
              <h3 style="font-weight: bold; color: #2C4A73;">Lista de Asignaciones Registradas</h3>  
              <hr>
              <button @click="listar_asignaciones" class="btn btn-primary">Actualizar <i class="fa-solid fa-arrows-rotate"></i></button>
              <br><br>
              <table style="width: 100%" id="tabla-asignaciones" class="table_data">
                <thead>
                  <tr>
                    <th>Estudiante</th>
                    <th>Semestre</th>
                    <th>Campo</th>
                    <th>Tutor SP</th>
                    <th>Tutor USA</th>
                    <th>Sitio de Practica</th>
                    <th>Fecha</th>
                    <th style="text-align: center">Documentos</th>
                    <th style="text-align: center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item) in lista_asignaciones" :key="item.id">
                    <td>{{item.estudiante}}</td>
                    <td>{{item.semestre}}</td>
                    <td>{{item.campo}}</td>
                    <td>{{item.tutor_sp}}</td>
                    <td>{{item.tutor_usa}}</td>
                    <td>{{item.sp}}</td>
                    <td>{{item.fecha}}</td>
                    <td style="text-align: center"><button @click="mostrarPDFASIGNACIONES(item.arl, 'Documento ARL', 1)" class="btn btn-info"><i class="fa-solid fa-file-pdf"></i></button> <button  @click="mostrarPDFASIGNACIONES(item.comunicado, 'Documento Comunicado', 2)" class="btn btn-warning"><i class="fa-regular fa-file-pdf"></i></button></td>
                    <td style="text-align: center"><button @click="eliminar_asignacion(item.id, item.id_estudiante)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>

      <b-modal
        ref="modal_asignaciones"
        hide-footer
        :title="tipo_doc"
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
  import * as practicasService from "../../servicios/practicas"
  import "jquery/dist/jquery.min.js";
  import "datatables.net-dt/js/dataTables.dataTables";
  import "datatables.net-dt/css/jquery.dataTables.min.css";
  import $ from "jquery";
  import store from "../../store";
  
    export default {
        name: "asignaciones",
        data: () => ({  
            lista_asignaciones: [],  
            rutaPdf: "",
            item_editar: {},
            opcion: "guardar",
            tipo_doc: ""
        }),
        components: {},
        methods: {
            async listar_asignaciones() {
                await practicasService.listar_asignaciones().then(respuesta => {
                this.lista_asignaciones = respuesta.data.asignaciones;
                this.crearDataTable();
                });
            },
            crearDataTable() {
                $("#tabla-asignaciones").dataTable().fnDestroy();
                setTimeout(() => {
                $('#tabla-asignaciones').DataTable({
                "scrollX": true,
                columnDefs: [{
                    width: "200px",
                    targets: 0
                    },
                    {
                    width: "140px",
                    targets: 1
                    },
                    {
                    width: "200px",
                    targets: 2
                    },
                    {
                    width: "400px",
                    targets: 3
                    },
                    {
                    width: "300px",
                    targets: 4
                    },
                    {
                    width: "300px",
                    targets: 5
                    },
                    {
                    width: "800px",
                    targets: 6
                    },
                    {
                    width: "70px",
                    targets: 7
                    },
                    {
                    width: "100px",
                    targets: 8
                    },
                ],
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
            mostrarPDFASIGNACIONES(ruta, titulo, tipo){
              this.tipo_doc = titulo;
              if(tipo == 1){
                this.rutaPdf = store.state.apiURL+"asignaciones/arl/"+ ruta;
              }else{
                this.rutaPdf = store.state.apiURL+"asignaciones/comunicado/"+ ruta;
              }   
              this.$refs.modal_asignaciones.show();
            },
            cerrarModal(){
              this.$refs.modal_asignaciones.hide();
            },
            async eliminar_asignacion(id, id_estudiante){
                this.$swal({
                title: '¿Esta seguro de eliminar esta asignación?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                showCloseButton: true,
                showLoaderOnConfirm: true
                }).then((result) => {
                if(result.value) {
                    this.eliminar_asignacion_ok(id, id_estudiante);
                } else {
                    console.log("cancelado");
                }
                });
            },
            async eliminar_asignacion_ok(id, id_estudiante){
                await practicasService.eliminar_asignacion(id, id_estudiante).then(respuesta => {
                if(respuesta.data.codigo == 1){
                    this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                    this.listar_asignaciones();
                }else{
                    this.$swal('Error...', respuesta.data.respuesta, 'error');
                }
                });
            }
        },
        mounted() {
            this.listar_asignaciones();
        },
    };
</script>
<style>
    label {
      font-weight: bold;
      font-size: 16px; 
    }
  
    th {
      background-color: #003670;
      color: #ffff;
    }
  
    tbody tr:nth-child(odd) {
      background-color: #eeeeee !important;
    }
  
    tbody tr:nth-child(even) {
      background-color: #c0bfbf !important;
    }
  
    .bconvenios {
      margin: 4px !important;
      width: 70px;
    }
</style>
    