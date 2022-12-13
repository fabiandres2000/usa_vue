<template>
  <v-container fluid class="down-top-padding">
    <v-row>
      <v-col cols="12" lg="12">
        <v-card>
          <v-card-text class="text-left p-5">
            <h3 style="font-weight: bold; color: #2C4A73;">Gestión de Convenios</h3>  
            <h3 style="font-weight: bold; text-align: justify;">Lista de convenios registrados</h3>
            <hr>
            <b-button variant="primary" v-b-modal.modal-rc>Nuevo Convenio <i class="fa-solid fa-square-plus"></i></b-button>
            <br><br>
            <table id="tabla-convenios" class="table_data">
              <thead>
                <tr>
                  <th style="text-align: center">Estado</th>
                  <th>NIT</th>
                  <th style="width: 300px">Razón Social</th>
                  <th>Dirección</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Final</th>
                  <th style="width: 300px">Campos</th>
                  <th>Representante</th>
                  <th style="text-align: center">Documento</th>
                  <th style="text-align: center">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item) in convenios" :key="item.id">
                  <td style="text-align: center">
                    <b-badge :variant="item.estado == 'Vigente' ? 'success' : 'danger'"> <p class="bconvenios">{{item.estado}}</p></b-badge>
                  </td>
                  <td>{{item.nit}}</td>
                  <td style="width: 300px">{{item.razon_social}}</td>
                  <td>{{item.direccion}}</td>
                  <td>{{item.fecha_inicio}}</td>
                  <td>{{item.fecha_final}}</td>
                  <td style="width: 300px">
                    <ul>
                      <li><strong>Campo educativo: </strong>{{item.campo_educativo}}</li>
                      <li><strong>Campo social: </strong>{{item.campo_social}}</li>
                      <li><strong>Campo organizacional: </strong>{{item.campo_organizacional}}</li>
                      <li><strong>Campo clinico y salud: </strong>{{item.campo_clinico_salud}}</li>
                      <li><strong>Campo juridico: </strong>{{item.campo_juridico}}</li>
                    </ul>
                  </td>
                  <td>{{item.representante_legal}}</td>
                  <td style="text-align: center"><button @click="mostrarPDF(item.documento_convenio)" class="btn btn-info"><i class="fa-solid fa-file-pdf"></i></button></td>
                  <td style="text-align: center"><button @click="eliminar_convenio(item.id)" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button> <button  @click="abrir_modal_editar(item)" class="btn btn-info"><i class="fa-solid fa-pen"></i></button></td>
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
      title="Documento de Convenio"
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
      id="modal-rc" 
      ref="modal-rc" 
      :title="titulo_rc"
      size="xl"
      centered
      header-bg-variant="primary"
      header-text-variant="light"
      :no-close-on-backdrop="true"
      hide-footer
    >
      <form @submit.prevent="registrar_convenio" method="post" ref="form_rc" id="form_rc">
        <div class="row" style="width: 100%; text-align: left; padding-left: 40px; padding-right: 40px;">
            <div class="col-lg-12">
                <h3 style="font-weight: bold; text-align: justify;">Complete los siguientes datos: </h3>
            </div>
        </div>
        <div class="row" style="padding-left: 40px; padding-right: 40px;">
            <div class="col-lg-12" style="padding-top: 10px;">
                <label for="nit">NIT</label>
                <input name="id" id="id" type="hidden" class="form-control" :value="item_editar.id">
                <input name="nit" id="nit" type="text" class="form-control" placeholder="NIT" :value="item_editar.nit" required>
            </div>
            <div class="col-lg-12" style="padding-top: 10px;">
                <label for="razon_social">Razón Social</label>
                <input name="razon_social" id="razon_social" type="text" class="form-control" placeholder="Razón Social"  :value="item_editar.razon_social" required>
            </div>
            <div class="col-lg-12" style="padding-top: 10px;">
                <label for="direccion">Dirección</label>
                <input name="direccion" id="direccion" type="text" class="form-control" placeholder="Dirección" :value="item_editar.direccion" required>
            </div>
            <div class="col-lg-12" style="padding-top: 10px;">
                <label for="representante_legal">Representante Legal</label>
                <input name="representante_legal" id="representante_legal" type="text" class="form-control" placeholder="Representante Legal" :value="item_editar.representante_legal" required>
            </div>
            <div class="col-lg-6" style="padding-top: 10px;">
                <label for="fecha_inicio">Fecha de Inicio</label>
                <input name="fecha_inicio" id="fecha_inicio" type="date" class="form-control" :value="item_editar.fecha_inicio" required>
            </div>
            <div class="col-lg-6" style="padding-top: 10px;">
                <label for="fecha_final">Fecha de Finalización</label>
                <input name="fecha_final" id="fecha_final" type="date" class="form-control" :value="item_editar.fecha_final" required>
            </div>
            <div class="col-lg-12" style="padding-top: 10px;">
              <hr>
              <h5 style="color: red">Indique si/no según corresponda</h5>
            </div>
            <div class="col-lg-6" style="padding-top: 10px;">
                <label for="campo_educativo">Campo Educativo</label>
                <select name="campo_educativo" id="campo_educativo" class="form-control" :value="item_editar.campo_educativo" required>
                  <option value="">seleccione una opción...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select> 
            </div>
            <div class="col-lg-6" style="padding-top: 10px;">
                <label for="campo_social">Campo Social</label>
                <select name="campo_social" id="campo_social" class="form-control" :value="item_editar.campo_social" required>
                  <option value="">seleccione una opción...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select> 
            </div>
            <div class="col-lg-6" style="padding-top: 10px;">
                <label for="campo_organizacional">Campo Organizacional</label>
                <select name="campo_organizacional" id="campo_organizacional" class="form-control" :value="item_editar.campo_organizacional" required>
                  <option value="">seleccione una opción...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select> 
            </div>
            <div class="col-lg-6" style="padding-top: 10px;">
                <label for="campo_clinico_salud">Campo clinico y salud</label>
                <select name="campo_clinico_salud" id="campo_clinico_salud" class="form-control" :value="item_editar.campo_clinico_salud" required>
                  <option value="">seleccione una opción...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select> 
            </div>
            <div class="col-lg-6" style="padding-top: 10px;">
                <label for="campo_juridico">Campo Juridico</label>
                <select name="campo_juridico" id="campo_juridico" class="form-control" :value="item_editar.campo_juridico" required>
                  <option value="">seleccione una opción...</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </select> 
            </div>
            <div class="col-lg-12" style="padding-top: 10px;">
              <hr>
              <label for="documento_convenio">Documento de Convenio</label>
              <input type="hidden" name="documento_convenio_viejo" id="documento_convenio_viejo" :value="item_editar.documento_convenio">
              <input ref="documento_convenio" name="documento_convenio" id="documento_convenio" type="file" class="form-control" required>
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
  name: "convenios",
  data: () => ({  
    convenios: [],  
    rutaPdf: [],
    titulo_rc: "Registro de nuevo convenio",
    item_editar: {},
    opcion: "guardar"
  }),
  components: {},
  methods: {
    async listar_convenios() {
      await practicasService.listar_convenios().then(respuesta => {
        this.convenios = respuesta.data.convenios;
        this.crearDataTable();
      });
    },
    crearDataTable() {
      $("#tabla-convenios").dataTable().fnDestroy();
      setTimeout(() => {
        $('#tabla-convenios').DataTable({
          "ordering": true,
          "scrollX": true,
          columnDefs: [{
              width: "160px",
              targets: 0
            },
            {
              width: "200px",
              targets: 1
            },
            {
              width: "200px",
              targets: 2
            },
            {
              width: "100px",
              targets: 3
            },
            {
              width: "100px",
              targets: 4
            },
            {
              width: "300px",
              targets: 5
            },
            {
              width: "300px",
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
            {
              width: "100px",
              targets: 9
            }
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
    mostrarPDF(ruta){
      this.rutaPdf = store.state.apiURL+"documentos_convenios/"+ ruta;
      this.$refs.modalpdf.show();
    },
    cerrarModal(){
      this.$refs.modalpdf.hide();
      this.$refs['modal-rc'].hide();
      this.item_editar = {};
      this.opcion = "guardar";
    },
    async registrar_convenio(){

      const formData = new FormData(this.$refs['form_rc']); 
      const data = {};
      for (let [key, val] of formData.entries()) {
        Object.assign(data, { [key]: val })
      }

      if(this.opcion == "guardar"){
        await practicasService.registrar_convenio(data).then(respuesta => {
          if(respuesta.data.codigo == 1){
            this.$swal('Correcto...', respuesta.data.respuesta, 'success');
            this.listar_convenios();
            this.cerrarModal();
          }else{
              this.$swal('Error...', respuesta.data.respuesta, 'error');
          }
        });
      }else{
        await practicasService.editar_convenio(data).then(respuesta => {
          if(respuesta.data.codigo == 1){
            this.$swal('Correcto...', respuesta.data.respuesta, 'success');
            this.listar_convenios();
            this.cerrarModal();
          }else{
              this.$swal('Error...', respuesta.data.respuesta, 'error');
          }
        });
      }
      
    },
    abrir_modal_editar(item){
      this.opcion = "editar";
      this.titulo_rc = "Editar convenio registrado";
      this.$refs['modal-rc'].show();
      this.item_editar = item;
    },
    async eliminar_convenio(id){
      this.$swal({
        title: '¿Esta seguro de eliminar este convenio?',
        text: 'No podra revertir tu acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        showCloseButton: true,
        showLoaderOnConfirm: true
      }).then((result) => {
        if(result.value) {
          this.eliminar_convenio_ok(id);
        } else {
          console.log("cancelado");
        }
      });
    },
    async eliminar_convenio_ok(id){
      await practicasService.eliminar_convenio(id).then(respuesta => {
        if(respuesta.data.codigo == 1){
          this.$swal('Correcto...', respuesta.data.respuesta, 'success');
          this.listar_convenios();
        }else{
          this.$swal('Error...', respuesta.data.respuesta, 'error');
        }
      });
    }
  },
  mounted() {
    this.listar_convenios();
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
  