<template lang="">
    <v-container fluid class="down-top-padding">
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
                                                    <select class="form-control" v-model="convenio_seleccionado" name="convenio" id="convenio">
                                                        <option value="">Seleccione un convenio.....</option>
                                                        <option :value="item.id" v-for="(item) in convenios_vigentes" :key="item.id">{{item.razon_social}}</option>
                                                    </select>
                                                </div>
                                            </div>                                          
                                        </div>
                                        <br>
                                        <button type="button" name="previous" class="previous action-button-previous"><i class="fa-solid fa-left-long"></i> Paso Anterior</button>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </v-col>
        </v-row>
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
            estudiante_seleccionado: [],
            options1: [],
            convenio_seleccionado: "",
            convenios_vigentes: []
        }
    },
    methods: { 
        multi(){
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
    },
    mounted() {
        this.multi();
        this.listar_estudiantes_no_asignados();
        this.listar_convenios_vigentes();
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
</style>