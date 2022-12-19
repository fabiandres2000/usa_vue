<template>
    <v-container fluid class="down-top-padding">
      <v-row>
        <v-col cols="12" lg="12">
          <v-card>
            <v-card-text class="text-left p-5">
              <h3 style="font-weight: bold; color: #2C4A73;">Gestión de tutores SP (Sitio de Practica)</h3>  
              <h3 style="font-weight: bold; text-align: justify;">Lista de tutores registrados</h3>
              <hr>
              <b-button variant="primary" v-b-modal.modal-tsp> Nuevo tutor <i class="fa-solid fa-square-plus"></i></b-button>
              <br><br>
              <table style="width: 100%" id="tabla-tsp" class="table_data">
                <thead>
                  <tr>
                    <th style="text-align: center">Estado</th>
                    <th>Identificación</th>
                    <th>Nombre Completo</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Campo</th>
                    <th>Fecha</th>
                    <th>Convenio</th>
                    <th style="text-align: center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item) in tutores" :key="item.id">
                    <td style="text-align: center">
                      <b-badge :variant="item.estado == '1' ? 'success' : 'danger'"> <p class="bconvenios">{{item.estado == '1' ? 'Activo' : 'Inactivo'}}</p></b-badge>
                    </td>
                    <td>{{item.cedula}}</td>
                    <td>{{item.nombres}} {{item.apellidos}}</td>
                    <td>{{item.correo}}</td>
                    <td>{{item.celular}}</td>
                    <td>{{item.campo}}</td>
                    <td>{{item.fecha}}</td>
                    <td>{{item.razon_social}}</td>
                    <td style="text-align: center"><button @click="cambiar_estado_tutor_sp(item.id)" :class="item.estado == '0' ? 'btn btn-success' : 'btn btn-danger'"><i :class="item.estado == '1' ? 'fa-sharp fa-solid fa-trash': 'fa-solid fa-circle-check'"></i></button> <button  @click="abrir_modal_editar_tutor_sp(item)" class="btn btn-info"><i class="fa-solid fa-pen"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
  
      <b-modal 
        id="modal-tsp" 
        ref="modal-tsp" 
        :title="titulo_rc"
        size="xl"
        centered
        header-bg-variant="primary"
        header-text-variant="light"
        :no-close-on-backdrop="true"
        hide-footer
      >
        <form @submit.prevent="registrar_tutor_sp" method="post" ref="form_rtusa" id="form_rtusa">
          <div class="row" style="width: 100%; text-align: left; padding-left: 40px; padding-right: 40px;">
              <div class="col-lg-12">
                  <h3 style="font-weight: bold; text-align: justify;">Complete los siguientes datos: </h3>
              </div>
          </div>
          <div class="row" style="padding-left: 40px; padding-right: 40px;">
              <div class="col-lg-12" style="padding-top: 10px;">
                  <label for="cedula">N° de Identificación</label>
                  <input name="id" id="id" type="hidden" class="form-control" :value="item_editar.id">
                  <input name="cedula" id="cedula" type="number" class="form-control" placeholder="N° de Identificación" :value="item_editar.cedula" required>
              </div>
              <div class="col-lg-6" style="padding-top: 10px;">
                  <label for="nombres">Nombres</label>
                  <input name="nombres" id="nombres" type="text" class="form-control" placeholder="Nombres"  :value="item_editar.nombres" required>
              </div>
              <div class="col-lg-6" style="padding-top: 10px;">
                  <label for="apellidos">Apellidos</label>
                  <input name="apellidos" id="apellidos" type="text" class="form-control" placeholder="Apellidos" :value="item_editar.apellidos" required>
              </div>
              <div class="col-lg-6" style="padding-top: 10px;">
                  <label for="correo">Correo</label>
                  <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo" :value="item_editar.correo" required>
              </div>
              <div class="col-lg-6" style="padding-top: 10px;">
                  <label for="celular">Celular</label>
                  <input name="celular" id="celular" type="number" placeholder="Celular" class="form-control" :value="item_editar.celular" required>
              </div>
              <div class="col-lg-6" style="padding-top: 10px;">
                <label for="Campo">Campo</label>
                <select style="height: 34px;" name="campo" id="campo" class="form-control" required :value="item_editar.campo">
                    <option value="">Seleccione...</option>
                    <option value="Campo Educativo">Campo Educativo</option>
                    <option value="Campo Social">Campo Social</option>
                    <option value="Campo Organizacional">Campo Organizacional</option>
                    <option value="Campo clinico y salud">Campo clinico y salud</option>
                    <option value="Campo Juridico">Campo Juridico</option>
                </select>
              </div>
              <div class="col-lg-6" style="padding-top: 10px;">
                <label for="Fecha">Fecha</label>
                <select style="height: 34px;" name="fecha" id="fecha" class="form-control" required :value="item_editar.fecha">
                    <option value="">Seleccione...</option>
                    <option :value='year+"-I"'>{{year}}-I</option>
                    <option :value='year+"-II"'>{{year}}-II</option>
                </select>
              </div>  
              <div class="col-lg-12" style="padding-top: 10px;">
                <hr>
                <label for="convenio">Convenio</label>
                <select style="height: 34px;" name="convenio" id="convenio" class="form-control" required :value="item_editar.id_convenio">
                    <option value="">Seleccione...</option>
                    <option v-for="(item) in convenios" :key="item.id" :value="item.id" >{{item.razon_social}}</option>
                </select>
              </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-6 text-center" id="budiv"><button style="cursor: pointer; width: 91%;" class="btn btn-primary" type="submit" >Guardar Datos</button></div>       
              <div class="col-6 text-center" id="budiv"><a style="cursor: pointer; width: 91%;" class="btn btn-danger" @click="cerrarModal" >Cancelar</a></div>       
          </div>
        </form>
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
    name: "tutorUsa",
    data: () => ({  
        tutores: [],
        convenios: [],  
        rutaPdf: [],
        titulo_rc: "Registro de nuevo tutor",
        item_editar: {},
        opcion: "guardar",
        year: ""
    }),
    components: {},
    methods: {
        async listar_tutores_sp() {
            await practicasService.listar_tutores_sp().then(respuesta => {
            this.tutores = respuesta.data.tutores;
            this.crearDataTable();
            });
        },
        async listar_convenios() {
            await practicasService.listar_convenios().then(respuesta => {
                this.convenios = respuesta.data.convenios;
            });
        },
        crearDataTable() {
            $("#tabla-tsp").dataTable().fnDestroy();
            setTimeout(() => {
            $('#tabla-tsp').DataTable({
              "scrollX": true,
              columnDefs: [{
                  width: "160px",
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
        mostrarPDFTUSA(ruta){
            this.rutaPdf = store.state.apiURL+"contratos_tutores_usa/"+ ruta;
            this.$refs.modalpdftusa.show();
        },
        cerrarModal(){
            this.$refs['modal-tsp'].hide();
            this.item_editar = {};
            this.titulo_rc = "Registro de nuevo tutor",
            this.opcion = "guardar";
        },
        async registrar_tutor_sp(){
          const formData = new FormData(this.$refs['form_rtusa']); 
          const data = {};
          for (let [key, val] of formData.entries()) {
          Object.assign(data, { [key]: val })
          }
  
          if(this.opcion == "guardar"){
          await practicasService.registrar_tutor_sp(data).then(respuesta => {
              if(respuesta.data.codigo == 1){
              this.$swal('Correcto...', respuesta.data.respuesta, 'success');
              this.listar_tutores_sp();
              this.cerrarModal();
              }else{
                  this.$swal('Error...', respuesta.data.respuesta, 'error');
              }
          });
          }else{
            await practicasService.editar_tutor_sp(data).then(respuesta => {
                if(respuesta.data.codigo == 1){
                this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                this.listar_tutores_sp();
                this.cerrarModal();
                }else{
                    this.$swal('Error...', respuesta.data.respuesta, 'error');
                }
            });
          }
        },
        abrir_modal_editar_tutor_sp(item){
            this.opcion = "editar";
            this.titulo_rc = "Editar tutor registrado";
            this.$refs['modal-tsp'].show();
            this.item_editar = item;
        },
        async cambiar_estado_tutor_sp(id){
            this.$swal({
            title: '¿Esta seguro de cambiar el estado a este tutor?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
            showCloseButton: true,
            showLoaderOnConfirm: true
            }).then((result) => {
            if(result.value) {
                this.cambiar_estado_tutor_sp_ok(id);
            } else {
                console.log("cancelado");
            }
            });
        },
        async cambiar_estado_tutor_sp_ok(id){
            await practicasService.cambiar_estado_tutor_sp(id).then(respuesta => {
            if(respuesta.data.codigo == 1){
                this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                this.listar_tutores_sp();
            }else{
                this.$swal('Error...', respuesta.data.respuesta, 'error');
            }
            });
        }
        },
        mounted() {
          this.listar_tutores_sp();
          this.listar_convenios();
          this.year = new Date().getFullYear();
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
    