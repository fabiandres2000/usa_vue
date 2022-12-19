<template>
    <v-container fluid class="down-top-padding">
      <v-row>
        <v-col cols="12" lg="12">
          <v-card>
            <v-card-text class="text-left p-5">
                <h1 style="color: #2c4a73; font-weight: bold">Registro de Practicas</h1>
                <hr>
                <form  @submit.prevent="registrar_practica" method="post" ref="form_registro_practica" id="form_registro_practica">
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Nombres y Apellidos" required type="text"  class="form-control" id="nombre" name="nombre">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <select  style="height: 40px;" required name="semestre" id="semestre" class="form-control">
                                <option value="">Semestre</option>
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
                            <select  style="height: 40px;" required name="periodo" id="periodo" class="form-control">
                                <option value="">Fecha</option>
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
                            <input placeholder="Tema de la Practica" type="text" required class="form-control" id="tema" name="tema">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Sitio de la practica" type="text" required class="form-control" id="sitio" name="sitio">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Tutor Sitio de Practica" type="text" required class="form-control" id="tutor_sitio" name="tutor_sitio">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Valoración del Tutor Sitio de Practica" type="text" required class="form-control" id="valoracion_sitio" name="valoracion_sitio">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Tutor Universidad Sergio Arboleda" type="text" required class="form-control" id="tutor_usa" name="tutor_usa">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Valoración del Tutor Universidad Sergio Arboleda" type="text" required class="form-control" id="valoracion_usa" name="valoracion_usa">
                        </div>
                    </div>
                    <br>
                    
                    <label for="isProductDiscounted" class="text-uppercase font-weight-bold">Aplico Instrumento 1?</label>
                    <br>
                    <div class="row" style="padding-left: 23px;">
                        <div class="col-lg-4">
                            <input @input="updateStatus('si')" id="si_ins_1" required class="form-check-input" name="ins_1" type="radio" value = "si">
                            <label style="margin-left: 10px; !important"  for="si_ins_1" class="text-left">Si</label>
                        </div>
                        <div class="col-lg-4">
                            <input @input="updateStatus('no')" id="no_ins_1" required class="form-check-input" name="ins_1" type="radio" value = "no">
                            <label style="margin-left: 10px; !important"  for="no_ins_1">No</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Cual?" type="text" disabled  class="form-control" id="cual_ins_1" name="cual_ins_1">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="excel_1_R">Subir archivo (Excel)</label>
                            <input type="file" accept=".xlsx" disabled class="form-control" id="excel_1_R" name="excel_1_R">
                        </div>
                    </div>
                    <br>  
                    <label for="isProductDiscounted" class="text-uppercase font-weight-bold">Aplico Instrumento 2?</label>
                    <br>
                    <div class="row" style="padding-left: 23px;">
                        <div class="col-lg-4">
                            <input @input="updateStatus2('si')" id="si_ins_2" class="form-check-input" name="ins_2" type="radio" value = "si">
                            <label style="margin-left: 10px; !important"  for="si_ins_2" class="text-left">Si</label>
                        </div>
                        <div class="col-lg-4">
                            <input @input="updateStatus2('no')" id="no_ins_2" class="form-check-input" name="ins_2" type="radio" value = "no">
                            <label style="margin-left: 10px; !important" for="no_ins_2">No</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input placeholder="Cual?" type="text" disabled  class="form-control" id="cual_ins_2" name="cual_ins_2">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="excel_2_R">Subir archivo (Excel)</label>
                            <input type="file" accept=".xlsx" disabled class="form-control" id="excel_2_R" name="excel_2_R">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="proyecto">Subir archivo (Practicas - PDF o DOCX)</label>
                            <input type="file" required accept=".pdf, .docx" class="form-control" id="proyecto" name="proyecto">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button style="width: 100%" type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Guardar </button>
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

  export default {
    name: "Profile",
    data: () => ({  
        opcion: "guardar",
        id_estudiante: "",
        asignacion: {},
        tutores_sp: [],
        tutores_usa: [],
        convenios: []
    }),
    components: {},
    mounted() {
        this.id_estudiante = this.$session.get("id_estudiante");
        this.verificar_asignacion();
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
            });
          }else{
            await estudianteService.editar_practica(data).then(respuesta => {
                if(respuesta.data.codigo == 1){
                    this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                }else{
                    this.$swal('Error...', respuesta.data.respuesta, 'error');
                }
            });
          }
        },
        async verificar_asignacion(){
            await estudianteService.verificar_asignacion(this.id_estudiante).then(respuesta => {
                this.asignacion = respuesta.data.asignacion;  
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
    },
  };
  </script>
  