<template lang="">
    <v-container fluid class="down-top-padding">
        <section id='loading'>Guardando Datos....</section>
        <v-row>
            <v-col cols="12" lg="12">
                <!-- MultiStep Form -->
                <div class="container-fluid" id="grad1">
                    <div class="card">
                        <h2><strong>Asignación de Practicas</strong></h2>
                        <p>Rellene todos los campos del formulario para ir al siguiente paso</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <div id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong>Campo</strong></li>
                                        <li id="personal"><strong>Asignación</strong></li>
                                    </ul>
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <div class="card_section">
                                            <h2 class="fs-title">Seleccione un campo</h2>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div id="r1" class="card_radio">
                                                        <input @click="select_radio('r1')" v-model="campo_elegido" value="Campo Educativo" class="radio_b" type="radio" name="campo" id="card1">
                                                        <label for="card1">
                                                            <h5>Campo Educativo</h5>
                                                            <i class="fa-solid fa-school fa-5x"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div id="r2" class="card_radio">
                                                        <input @click="select_radio('r2')" v-model="campo_elegido" value="Campo Social" class="radio_b" type="radio" name="campo" id="card2">
                                                        <label for="card2">
                                                            <h5>Campo  Social</h5>
                                                            <i class="fa-solid fa-user-group fa-5x"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div id="r3" class="card_radio">
                                                        <input @click="select_radio('r3')" v-model="campo_elegido" value="Campo Organizacional" class="radio_b" type="radio" name="campo" id="card3">
                                                        <label for="card3">
                                                            <h5>Campo  Organizacional</h5>
                                                            <i class="fa-solid fa-users-viewfinder fa-5x"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div id="r4" class="card_radio">
                                                        <input @click="select_radio('r4')" v-model="campo_elegido" value="Campo Clinico y Salud" class="radio_b" type="radio" name="campo" id="card4">
                                                        <label for="card4">
                                                            <h5>Campo  Clinico y Salud</h5>
                                                            <i class="fa-solid fa-user-doctor fa-5x"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div id="r5" class="card_radio">
                                                        <input @click="select_radio('r5')" v-model="campo_elegido" value="Campo Juridico" class="radio_b" type="radio" name="campo" id="card5">
                                                        <label for="card5">
                                                            <h5>Campo  Juridico</h5>
                                                            <i class="fa-solid fa-gavel fa-5x"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <br>
                                        <button type="button" name="next" class="next action-button">Siguiente Paso <i class="fa-solid fa-right-long"></i></button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="card_section">
                                            <h2 class="fs-title">Complete los Siguientes Datos</h2>
                                            <h4><strong>Campo: </strong>{{campo_elegido}}</h4>  
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h5 for="">Estudiante</h5>
                                                    <model-list-select 
                                                        :list="options1"
                                                        v-model="estudiante_seleccionado"
                                                        option-value="id"
                                                        :custom-text="codeAndNameAndDesc"
                                                        placeholder="Seleccione Un Estudiante......"
                                                    >
                                                    </model-list-select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5 for="convenio">Convenio</h5>
                                                    <select class="form-control" v-model="convenio_seleccionado" @change="tutores_sp_por_convenio($event)" name="convenio" id="convenio" >
                                                        <option value="">Seleccione un convenio.....</option>
                                                        <option :value="item.id" v-for="(item) in convenios_vigentes" :key="item.id">{{item.razon_social}}</option>
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h5 for="tutor_sp">Tutor (Sitio de Practica)</h5>
                                                    <select class="form-control" v-model="tutor_sp_seleccionado" name="tutor_sp" id="tutor_sp" >
                                                        <option value="">Seleccione un tutor.....</option>
                                                        <option :value="item.id" v-for="(item) in tutores_sp" :key="item.id">{{item.nombres}} {{item.apellidos}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5 for="tutor_usa">Tutor (Universidad Sergio Arboleda)</h5>
                                                    <select class="form-control" v-model="tutor_usa_seleccionado" name="tutor_usa" id="tutor_usa" >
                                                        <option value="">Seleccione un tutor.....</option>
                                                        <option :value="item.id" v-for="(item) in tutores_usa" :key="item.id">{{item.nombres}} {{item.apellidos}}</option>
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h5 for="fecha_inicio">Fecha de Inicio</h5>
                                                    <input type="date" class="form-control" v-model="fecha_inicio">
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5 for="fecha_final">Fecha de finalización</h5>
                                                    <input type="date" class="form-control" v-model="fecha_final">
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <h5 for="fecha_inicio">Registro ARL</h5>
                                                    <input type="file" class="form-control" id="archivo_arl">
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5 for="fecha_final">Comunicado</h5>
                                                    <input type="file" class="form-control" id="archivo_comunicado">
                                                </div>
                                                <div class="col-lg-1">
                                                    <button @click="agregar()" style="position: absolute;bottom: 5px;right: 11px; padding: 11px" class="btn btn-success"><i class="fa-solid fa-user-plus fa-2x"></i></button>
                                                </div>
                                            </div>                                     
                                        </div>
                                        <br>
                                        <hr>                  
                                        <div v-if="lista_asignaciones.length != 0">
                                            <h2><strong>Lista de Asignaciones</strong></h2>
                                            <table id="tabla-tsp" class="table_data" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th>Campo</th>
                                                    <th>Estudiante</th>
                                                    <th>Convenio</th>
                                                    <th>Tutor SP</th>
                                                    <th>Tutor USA</th>
                                                    <th>Fecha de Inicio</th>
                                                    <th>Fecha de Finalización</th>
                                                    <th>ARL</th>
                                                    <th>Comunicado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(item, index) in lista_asignaciones" :key="item.id">
                                                    <td>{{item.campodata}}</td>
                                                    <td>{{item.estudiantedata.nombre}}</td>
                                                    <td>{{item.conveniodata.razon_social}}</td>
                                                    <td>{{item.tutor_sp.nombres}} {{item.tutor_sp.apellidos}}</td>
                                                    <td>{{item.tutor_usa.nombres}} {{item.tutor_usa.apellidos}}</td>
                                                    <td>{{item.fecha_inicio}}</td>
                                                    <td>{{item.fecha_final}}</td>
                                                    <td><button @click="mostrarPDF(item.arl)" class="btn btn-info"><i class="fa-solid fa-file-pdf"></i></button></td>
                                                    <td><button @click="mostrarPDF(item.comunicado)" class="btn btn-info"><i class="fa-solid fa-file-pdf"></i></button></td>
                                                    <td><button @click="eliminar(index)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                        </div>   
                                        <button type="button" name="previous" class="previous action-button-previous"><i class="fa-solid fa-left-long"></i> Paso Anterior</button>
                                        <button @click="asignar_lista_estudiantes" type="button" class="btn-guardar btn btn-success">Guardar <i class="fa-solid fa-save fa-"></i></button>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </v-col>
        </v-row>

        <b-modal
        ref="modalpdfadjunto"
        hide-footer
        title="Archivo Adjunto"
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
import $ from "jquery";
import { ModelListSelect } from 'vue-search-select'
import * as practicasService from "../../servicios/practicas"

export default {
    components: {ModelListSelect},
    data() {
        return {
            campo_elegido: "",
            estudiante_seleccionado: {},
            options1: [],
            convenio_seleccionado: "",
            convenios_vigentes: [],
            tutores_sp: [],
            tutor_sp_seleccionado: "",
            tutores_usa: [],
            tutor_usa_seleccionado: "",
            fecha_inicio: "",
            fecha_final: "",
            lista_asignaciones: [],
            rutaPdf: ""
        }
    },
    methods: { 
        multi(){
            const load = document.querySelector("#loading");
            load.style.display = "none";

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            
            $(".next").click(function(){
                
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                
                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                
                //show the next fieldset
                next_fs.show(); 
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
            
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    }, 
                    duration: 600
                });
            });
            
            $(".previous").click(function(){
                
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                
                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                
                //show the previous fieldset
                previous_fs.show();
            
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
            
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    }, 
                    duration: 600
                });
            });
            
            $('.radio-group .radio').click(function(){
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });
            
            $(".submit").click(function(){
                return false;
            })
        },
        select_radio(id){
           
            for (let index = 1; index < 6; index++) {
                let id_l = "r"+index;
                if(id == id_l){
                    document.getElementById(id_l).classList.remove("card_radio");    
                    document.getElementById(id_l).classList.add("card_radio_active");
                }else{
                    document.getElementById(id_l).classList.add("card_radio");    
                    document.getElementById(id_l).classList.remove("card_radio_active");
                }
            }   
        },
        async listar_estudiantes_no_asignados() {
            await practicasService.listar_estudiantes_no_asignados().then(respuesta => {
                this.options1 = respuesta.data.estudiantes_no_asignados;
            });
        },
        codeAndNameAndDesc (item) {
            return `${item.cedula} - ${item.nombre} - ${item.semestre}`
        },
        async listar_convenios_vigentes() {
            await practicasService.listar_convenios_vigentes().then(respuesta => {
                this.convenios_vigentes = respuesta.data.convenios_vigentes;
            });
        },
        async tutores_sp_por_convenio(event) {
            await practicasService.tutores_sp_por_convenio(event.target.value).then(respuesta => {
                this.tutores_sp = respuesta.data.tutores_sp;
                this.tutor_sp_seleccionado = "";
            });
        },
        async listar_tutores_usa() {
            await practicasService.listar_tutores_usa().then(respuesta => {
                var res = respuesta.data.tutores;
                res.forEach(element => {
                    if(element.estado == '1'){
                        this.tutores_usa.push(element);
                    }
                });
            });
        },
        async agregar(){

            if(this.campo_elegido == ""){
                this.$swal('Error...', "Debe seleccionar un campo", 'error');
                return 0;
            }

            if($.isEmptyObject(this.estudiante_seleccionado)){
                this.$swal('Error...', "Debe seleccionar un estudiante", 'error');
                return 0;
            }

            if(this.convenio_seleccionado == ""){
                this.$swal('Error...', "Debe seleccionar un convenio", 'error');
                return 0;
            }
           
            if(this.tutor_sp_seleccionado == ""){
                this.$swal('Error...', "Debe seleccionar un tutor SP", 'error');
                return 0;
            }

            if(this.tutor_usa_seleccionado == ""){
                this.$swal('Error...', "Debe seleccionar un tutor USA", 'error');
                return 0;
            }

            if(this.fecha_inicio == ""){
                this.$swal('Error...', "Debe seleccionar una fecha de inicio", 'error');
                return 0;
            }

            if(this.fecha_final == ""){
                this.$swal('Error...', "Debe seleccionar una fecha de finalización", 'error');
                return 0;
            }

            if(document.getElementById("archivo_arl").files.length == 0){
                this.$swal('Error...', "Debe seleccionar un documento del registro de la ARL", 'error');
                return 0;
            }

            if(document.getElementById("archivo_comunicado").files.length == 0){
                this.$swal('Error...', "Debe seleccionar un documento del comunicado", 'error');
                return 0;
            }

        
            var objeto = {
                campodata: this.campo_elegido,
                estudiantedata: this.estudiante_seleccionado,
                conveniodata: this.convenios_vigentes.filter((item) => { return item.id == this.convenio_seleccionado})[0],
                tutor_sp: this.tutores_sp.filter((item) => { return item.id == this.tutor_sp_seleccionado})[0],
                tutor_usa: this.tutores_usa.filter((item) => { return item.id == this.tutor_usa_seleccionado})[0],
                fecha_inicio: this.fecha_inicio,
                fecha_final: this.fecha_final,
                arl: document.getElementById('archivo_arl').files[0],
                comunicado: document.getElementById('archivo_comunicado').files[0]
            }

            this.lista_asignaciones.push(objeto);

            this.limpiarCampos();          
        }, 
        async asignar_lista_estudiantes(){
            if(this.lista_asignaciones.length != 0){
                const load = document.querySelector("#loading");
                load.style.display = "grid";

                var lista_errores = [];
                
                for (let index = 0; index < this.lista_asignaciones.length; index++) {
                    const element = this.lista_asignaciones[index];

                    let formData = new FormData()
                    formData.append('estudiante',  JSON.stringify(element.estudiantedata))
                    formData.append('convenio', JSON.stringify(element.conveniodata))
                    formData.append('tutor_sp', JSON.stringify(element.tutor_sp))
                    formData.append('tutor_usa', JSON.stringify(element.tutor_usa))
                    formData.append('campo', element.campodata)
                    formData.append('arl', element.arl)
                    formData.append('comunicado', element.comunicado)
                    formData.append('fecha_inicio', element.fecha_inicio)
                    formData.append('fecha_final', element.fecha_final)

                    await practicasService.asignar_practicas(formData).then(respuesta => {
                        if(respuesta.data.codigo == 0){
                            lista_errores.push(respuesta.data.respuesta);
                        }
                    });
                }

                if(lista_errores.length != 0){
                    var mensaje = "";
                    lista_errores.forEach(element => {
                        mensaje = mensaje+element+"<br>"
                    });
                    this.$swal('Error...', mensaje, 'error');
                    load.style.display = "none";
                }else{
                    this.$swal('Correcto...', "Asignaciones Guardadas Correctamente", 'success');
                    load.style.display = "none";
                    this.lista_asignaciones = [];
                }

                this.listar_estudiantes_no_asignados();
            }else{
                this.$swal('Error...', "No hay asignaciones que guardar.", 'error');
            } 
        },
        limpiarCampos(){
            this.estudiante_seleccionado = {};
            this.convenio_seleccionado = "";
            this.tutor_sp_seleccionado = "";
            this.tutor_usa_seleccionado = "";
            this.fecha_final = "";
            this.fecha_inicio = "";
            document.getElementById('archivo_arl').value = "";
            document.getElementById('archivo_comunicado').value = "";
        },
        mostrarPDF(ruta){
            this.rutaPdf = URL.createObjectURL(ruta)
            this.$refs.modalpdfadjunto.show();
        },
        cerrarModal(){
            this.$refs.modalpdfadjunto.hide();
        }
    },
    mounted() {
        this.multi();
        this.listar_estudiantes_no_asignados();
        this.listar_convenios_vigentes();
        this.listar_tutores_usa();
    },
    
}
</script>
<style>

#progressbar {
    padding-left: 0px !important;
    widows: 100%;
}
/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;

    /*stacking fieldsets above each other*/
    position: relative;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;

    /*stacking fieldsets above each other*/
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E;
}


/*Blue Buttons*/
#msform .action-button {
    width: 200px;
    background: #00345e;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
}

/*Previous Buttons*/
#msform .action-button-previous {
    width: 200px;
    background: #f7c000;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #f7c000;
}

/*Dropdown List Exp Date*/
select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px;
}



/*The background card*/
.card {
    z-index: 0;
    border: none;
    position: relative;
}

/*FieldSet headings*/
.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
}

#progressbar .active {
    color: #000000;
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 50%;
    float: left;
    position: relative;
}

/*Icons in the ProgressBar*/
#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f1ad";
    color: #00345e;
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007";
    color: #00345e;
}


/*ProgressBar before any progress*/
#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
}

/*ProgressBar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
}

/*Color number of the step and the connector before it*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #f7c000;
}


.card_radio{
    border: 4px solid rgb(209, 209, 209) !important;
    padding: 20px;
    width: 100%;
    cursor: pointer;
    border-radius: 30px;
}

.card_radio_active{
    border: 4px solid #00345e !important;
    background-color: #00345e;
    padding: 20px;
    width: 100%;
    cursor: pointer;
    border-radius: 30px;
}

.card_radio_active input{
   position: absolute;
   right: 40px;
   bottom: 40px;
   scale: 1.5;
} 

.card_radio_active label{
  cursor: pointer;
  color: #ffff;
} 

.card_radio input{
   position: absolute;
   right: 40px;
   bottom: 40px;
   scale: 1.5;
} 

.card_radio label{
  cursor: pointer;
} 

.card_section {
    border: 2px solid lightgray;
    padding: 20px;
    color: rgb(100, 98, 98);
    text-align: left;
    border-radius: 10px;
}

.selection .default {
    background-color: #007bff00 !important;
    border-color: #563dea00 !important;
    font-size: 16px;
    color: #343638 !important;
}

.selection .menu {
    height: 200px !important;
    overflow-y: scroll;
}

th {
    background-color: #003670;
    color: #ffff;
}

th, td {
    padding: 10px;
}

tbody tr:nth-child(odd) {
    background-color: #eeeeee !important;
}

tbody tr:nth-child(even) {
    background-color: #c0bfbf !important;
}

.btn-guardar{
    border-radius: 0;
    font-size: 13px;
    font-weight: bold;
    padding: 9px;
    width: 200px;
}

#loading {
  position: fixed;
  inset: 0;
  background: #0009;
  display: grid;
  place-items: center;
  font-size: 4rem;
  color: #fff;
  z-index: 1000;
}
</style>