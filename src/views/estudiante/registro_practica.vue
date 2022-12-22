<template>
    <v-container fluid class="down-top-padding">
      <v-row>
        <v-col cols="12" lg="12">
          <v-card>
            <v-card-text class="text-left p-5">
                <h1 style="color: #2c4a73; font-weight: bold">{{titulo}}</h1>
                <hr>
                <form  @submit.prevent="registrar_practica" method="post" ref="form_registro_practica" id="form_registro_practica">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Nombres y Apellidos</label>
                            <input v-model="registro.nombre_completo" placeholder="Nombres y Apellidos" required type="text"  class="form-control" id="nombre" name="nombre">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Semestre</label>
                            <select v-model="registro.semestre" style="height: 40px;" required name="semestre" id="semestre" class="form-control">
                                <option value="">Seleccione.....</option>
                                <option value="I">I Semestre</option>
                                <option value="II">II Semestre</option>
                                <option value="III">III Semestre</option>
                                <option value="IV">IV Semestre</option>
                                <option value="V">V Semestre</option>
                                <option value="VI">VI Semestre</option>
                                <option value="VII">VII Semestre</option>
                                <option value="VIII">VIII Semestre</option>
                                <option value="IX">IX Semestre</option>
                                <option value="X">X Semestre</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Fecha</label>
                            <select v-model="registro.fecha" style="height: 40px;" required name="periodo" id="periodo" class="form-control">
                                <option value="">Seleccione....</option>
                                <option value="2021-1">2021-1</option>
                                <option value="2021-2">2021-2</option>
                                <option value="2022-1">2022-1</option>
                                <option value="2022-2">2022-2</option>
                                <option value="2023-1">2023-1</option>
                                <option value="2023-2">2023-2</option>
                                <option value="2024-1">2024-1</option>
                                <option value="2024-2">2024-2</option>
                                <option value="2025-1">2025-1</option>
                                <option value="2025-2">2025-2</option>
                                <option value="2026-1">2026-1</option>
                                <option value="2026-2">2026-2</option>
                                <option value="2027-1">2027-1</option>
                                <option value="2027-2">2027-2</option>
                                <option value="2028-1">2028-1</option>
                                <option value="2028-2">2028-2</option>
                                <option value="2029-1">2029-1</option>
                                <option value="2029-2">2029-2</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Tema de la Practica</label>
                            <input v-model="registro.tema" placeholder="Tema de la Practica" type="text" required class="form-control" id="tema" name="tema">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Sitio de la practica</label>
                            <select style="pointer-events: none;" class="form-control" v-model="convenio_seleccionado" name="sitio" id="sitio" >
                                <option value="">Seleccione un convenio.....</option>
                                <option :value="item.id" v-for="(item) in convenios" :key="item.id">{{item.razon_social}}</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Tutor Sitio de Practica</label>
                            <select style="pointer-events: none;" class="form-control" v-model="tutor_sp_seleccionado" name="tutor_sitio" id="tutor_sitio" >
                                <option value="">Seleccione.....</option>
                                <option :value="item.id" v-for="(item) in tutores_sp" :key="item.id">{{item.nombres}} {{item.apellidos}}</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Valoración del Tutor Sitio de Practica</label>
                            <input v-model="registro.valoracion_tutor_sp" placeholder="Valoración del Tutor Sitio de Practica" type="text" required class="form-control" id="valoracion_sitio" name="valoracion_sitio">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Tutor Universidad Sergio Arboleda</label>
                            <select style="pointer-events: none;" class="form-control" v-model="tutor_usa_seleccionado" name="tutor_usa" id="tutor_usa" >
                                <option value="">Seleccione.....</option>
                                <option :value="item.id" v-for="(item) in tutores_usa" :key="item.id">{{item.nombres}} {{item.apellidos}}</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Valoración del Tutor Universidad Sergio Arboleda</label>
                            <input v-model="registro.valoracion_tutor_usa" placeholder="Valoración del Tutor Universidad Sergio Arboleda" type="text" required class="form-control" id="valoracion_usa" name="valoracion_usa">
                        </div>
                    </div>
                    <br> 
                    <label for="isProductDiscounted" class="text-uppercase font-weight-bold">Aplico Instrumento 1?</label>
                    <br>
                    <div class="row" style="padding-left: 23px;">
                        <div class="col-lg-4">
                            <input v-model="registro.aplico_instrumento" @input="updateStatus('si')" id="si_ins_1" required class="form-check-input" name="ins_1" type="radio" value = "si">
                            <label style="margin-left: 10px; !important"  for="si_ins_1" class="text-left">Si</label>
                        </div>
                        <div class="col-lg-4">
                            <input v-model="registro.aplico_instrumento" @input="updateStatus('no')" id="no_ins_1" required class="form-check-input" name="ins_1" type="radio" value = "no">
                            <label style="margin-left: 10px; !important"  for="no_ins_1">No</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Cual?</label>
                            <input v-model="registro.instrumento" placeholder="Cual?" type="text" disabled  class="form-control" id="cual_ins_1" name="cual_ins_1">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="excel_1_R">Subir archivo (Excel)</label>
                            <input type="file" accept=".xlsx" disabled class="form-control" id="excel_1_R" name="excel_1_R">
                            <br>
                            <a style="color: red" @click="descargar_archivo(registro.excel_1)"  v-if="registro.aplico_instrumento=='si'"><u>Descargar Archivo <i class="fa-solid fa-file-excel"></i></u></a>
                        </div>
                    </div>
                    <br>  
                    <label for="isProductDiscounted" class="text-uppercase font-weight-bold">Aplico Instrumento 2?</label>
                    <br>
                    <div class="row" style="padding-left: 23px;">
                        <div class="col-lg-4">
                            <input v-model="registro.aplico_instrumento_2" @input="updateStatus2('si')" id="si_ins_2" class="form-check-input" name="ins_2" type="radio" value = "si">
                            <label style="margin-left: 10px; !important"  for="si_ins_2" class="text-left">Si</label>
                        </div>
                        <div class="col-lg-4">
                            <input v-model="registro.aplico_instrumento_2" @input="updateStatus2('no')" id="no_ins_2" class="form-check-input" name="ins_2" type="radio" value = "no">
                            <label style="margin-left: 10px; !important" for="no_ins_2">No</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="">Cual?</label>
                            <input v-model="registro.instrumento_2" placeholder="Cual?" type="text" disabled  class="form-control" id="cual_ins_2" name="cual_ins_2">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="excel_2_R">Subir archivo (Excel)</label>
                            <input type="file" accept=".xlsx" disabled class="form-control" id="excel_2_R" name="excel_2_R">
                            <br>
                            <a style="color: red" @click="descargar_archivo(registro.excel_2)"  v-if="registro.aplico_instrumento_2=='si'"><u>Descargar Archivo <i class="fa-solid fa-file-excel"></i></u></a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="proyecto">Subir archivo (Practicas - PDF o DOCX)</label>
                            <input type="file" required accept=".pdf, .docx" class="form-control" id="proyecto" name="proyecto">
                            <br>
                            <a v-if="registro.proyecto != ''" style="color: red" @click="descargar_archivo(registro.proyecto)"><u>Descargar Archivo <i class="fa-solid fa-file-pdf"></i></u></a>
                            <input type="hidden" v-model="registro.id" class="form-control" id="id_practica" name="id_practica">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <button style="width: 100%" type="submit" class="btn btn-primary"><i class="fa-solid fa-comment"></i> Observaciones </button>
                        </div>
                        <div class="col-lg-6 text-center">
                            <button style="width: 100%" type="submit" class="btn btn-warning"><i class="fa-solid fa-floppy-disk"></i> Guardar </button>
                        </div>
                    </div>
                </form>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script>
  import * as estudianteService from "../../servicios/estudiante_service"
  import * as practicasService from "../../servicios/practicas"
  import store from "../../store";

  export default {
    name: "Profile",
    data: () => ({  
        opcion: "guardar",
        id_estudiante: "",
        asignacion: {},
        tutores_sp: [],
        tutores_usa: [],
        convenios: [],
        convenio_seleccionado: "",
        tutor_sp_seleccionado: "",
        tutor_usa_seleccionado: "",
        titulo: "Registro de Practicas",
        registro: {
            semestre: "",
            fecha: "",
            proyecto: ""
        },
        ruta: "",
    }),
    components: {},
    mounted() {
        this.id_estudiante = this.$session.get("id_estudiante");
        this.verificar_asignacion();
        this.listar_tutores_sp();
        this.listar_tutores_usa();
        this.listar_convenios();
        this.verificar_registro();
    },
    methods: {
        updateStatus(opcion) {  
            var cual_ins_1 = document.getElementById('cual_ins_1');
            var excel_1 = document.getElementById('excel_1_R');

            if (opcion == "si") {
                cual_ins_1.disabled = false;
                excel_1.disabled = false;
            } else {
                cual_ins_1.disabled = true;
                excel_1.disabled = true;
            }
        },
        updateStatus2(opcion) {  
            var cual_ins_1 = document.getElementById('cual_ins_2');
            var excel_1 = document.getElementById('excel_2_R');

            if (opcion == "si") {
                cual_ins_1.disabled = false;
                excel_1.disabled = false;
            } else {
                cual_ins_1.disabled = true;
                excel_1.disabled = true;
            }
        },
        async registrar_practica(){
          const formData = new FormData(this.$refs['form_registro_practica']); 
          const data = {};
          for (let [key, val] of formData.entries()) {
            Object.assign(data, { [key]: val })
          }
          
          Object.assign(data, { 'id_estudiante':  this.id_estudiante })

          if(this.opcion == "guardar"){
            await estudianteService.registrar_practica(data).then(respuesta => {
                if(respuesta.data.codigo == 1){
                    this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                }else{
                    this.$swal('Error...', respuesta.data.respuesta, 'error');
                }

                this.verificar_registro();
            });
          }else{
            await estudianteService.editar_practica(data).then(respuesta => {
                if(respuesta.data.codigo == 1){
                    this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                }else{
                    this.$swal('Error...', respuesta.data.respuesta, 'error');
                }

                this.verificar_registro();
            });
          }
        },
        async verificar_asignacion(){
            await estudianteService.verificar_asignacion(this.id_estudiante).then(respuesta => {
                this.asignacion = respuesta.data.asignacion;  
                if(this.asignacion != null){
                    this.convenio_seleccionado = this.asignacion.id_convenio;
                    this.tutor_sp_seleccionado = this.asignacion.id_tutor_sp;
                    this.tutor_usa_seleccionado = this.asignacion.id_tutor_usa;
                }
            });
        },
        async listar_tutores_sp() {
            await practicasService.listar_tutores_sp().then(respuesta => {
                this.tutores_sp = respuesta.data.tutores;
            });
        },
        async listar_tutores_usa() {
            await practicasService.listar_tutores_usa().then(respuesta => {
             this.tutores_usa = respuesta.data.tutores;
            });
        },
        async listar_convenios() {
            await practicasService.listar_convenios().then(respuesta => {
                this.convenios = respuesta.data.convenios;
            });
        },
        async verificar_registro() {
            await estudianteService.verificar_registro(this.id_estudiante).then(respuesta => {
                this.registro = respuesta.data.registro;  
                if(this.registro != null){
                    this.opcion = "editar";
                    this.titulo = "Editar Practica Registrada";

                    var cual_ins_1 = document.getElementById('cual_ins_1');
                    var excel_1 = document.getElementById('excel_1_R');

                    if (this.registro.aplico_instrumento == "si") {
                        cual_ins_1.disabled = false;
                        excel_1.disabled = false;
                    } else {
                        cual_ins_1.disabled = true;
                        excel_1.disabled = true;
                    }

                    var cual_ins_2 = document.getElementById('cual_ins_2');
                    var excel_2 = document.getElementById('excel_2_R');

                    if (this.registro.aplico_instrumento_2 == "si") {
                        cual_ins_2.disabled = false;
                        excel_2.disabled = false;
                    } else {
                        cual_ins_2.disabled = true;
                        excel_2.disabled = true;
                    }
                }
            });
        },
        descargar_archivo(ruta){
            var ruta_archivo = store.state.apiURL+"archivos_practica/"+ ruta;
            var element = document.createElement('a');
            element.setAttribute('href', ruta_archivo);
            element.setAttribute('download', ruta);
            element.setAttribute('target', '_blank');
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
        }
    },
  };
</script>
<style>
    label{
        color: #2c4a73;
        font-weight: bold;
    }
</style>
  