<template lang="">
    <v-container fluid class="down-top-padding">
        <v-row>
            <v-col cols="12" lg="12">
                <v-card>
                    <v-card-text class="text-left p-5">
                        <h1 style="color: #2c4a73; font-weight: bold">Test de Personalidad</h1>
                        <br>
                        <div class="row">
                            <div class="col-9">
                                <h3><span span class="theme_color">Estudiante: {{estudiante.nombre}}</span></h3>
                            </div>
                            <div class="col-3" style="text-align: right">
                            
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12" style="text-align: center;">
                                <div style="text-align: center; width: 100%">
                                    <table id="customers" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                                <th>Correo</th>
                                                <th>Nombre</th>
                                                <th>Semestre</th>
                                                <th>Periodo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">{{this.$session.get("correo")}}</td>
                                                <td style="text-align: center;">{{estudiante.nombre}}</td>
                                                <td style="text-align: center;">{{estudiante.semestre}}</td>
                                                <td style="text-align: center;">{{estudiante.periodo}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <table id="customers" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Puntaje Directo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Ansiedad</td>
                                            <td style="text-align: center;">{{detalle.Ansiedad}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Hostilidad</td>
                                            <td style="text-align: center;">{{detalle.Hostilidad}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Depresión</td>
                                            <td style="text-align: center;">{{detalle.Depresion}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Ansiedad Social</td>
                                            <td style="text-align: center;">{{detalle.Ansiedad_Social}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Impulsividad</td>
                                            <td style="text-align: center;">{{detalle.Impulsividad}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Vulnerabilidad</td>
                                            <td style="text-align: center;">{{detalle.Vulnerabilidad}}</td>
                                        </tr>
                                        <tr>
                                            <th>Neuroticismo</th>
                                            <th>{{detalle.Neuroticismo}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table id="customers" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Puntaje Directo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Cordialidad</td>
                                            <td style="text-align: center;">{{detalle.Cordialidad}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Gregarismo</td>
                                            <td style="text-align: center;">{{detalle.Gregarismo}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Asertividad</td>
                                            <td style="text-align: center;">{{detalle.Asertividad}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Actividad</td>
                                            <td style="text-align: center;">{{detalle.Actividad}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Búsqueda Emociones</td>
                                            <td style="text-align: center;">{{detalle.Busqueda_emociones}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Emociones Positivas</td>
                                            <td style="text-align: center;">{{detalle.Emociones_positivas}}</td>
                                        </tr>
                                        <tr>
                                            <th>Extraversion</th>
                                            <th>{{detalle.Extraversion}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6">
                                <table id="customers" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Puntaje Directo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Fantasía</td>
                                            <td style="text-align: center;">{{detalle.Fantasia}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Estética</td>
                                            <td style="text-align: center;">{{detalle.Estetica}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Sentimientos</td>
                                            <td style="text-align: center;">{{detalle.Sentimientos}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Acciones</td>
                                            <td style="text-align: center;">{{detalle.Acciones}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Ideas</td>
                                            <td style="text-align: center;">{{detalle.Ideas}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Valores</td>
                                            <td style="text-align: center;">{{detalle.Valores}}</td>
                                        </tr>
                                        <tr>
                                            <th>Apertura</th>
                                            <th>{{detalle.Apertura}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table id="customers" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Puntaje Directo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Confianza</td>
                                            <td style="text-align: center;">{{detalle.Confianza}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Franqueza</td>
                                            <td style="text-align: center;">{{detalle.Franqueza}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Altruismo</td>
                                            <td style="text-align: center;">{{detalle.Altruismo}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">A. Conciliadora</td>
                                            <td style="text-align: center;">{{detalle.A_Conciliadora}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Modestia</td>
                                            <td style="text-align: center;">{{detalle.Modestia}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Sensibilidad</td>
                                            <td style="text-align: center;">{{detalle.Sensibilidad}}</td>
                                        </tr>
                                        <tr>
                                            <th>Amabilidad</th>
                                            <th>{{detalle.Amabilidad}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-lg-6">
                                <table id="customers" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Puntaje Directo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Competencia</td>
                                            <td style="text-align: center;">{{detalle.Competencia}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Orden</td>
                                            <td style="text-align: center;">{{detalle.Orden}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Deber</td>
                                            <td style="text-align: center;">{{detalle.Deber}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Logro</td>
                                            <td style="text-align: center;">{{detalle.Logro}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Autodisciplina</td>
                                            <td style="text-align: center;">{{detalle.Autodisciplina}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Deliberación</td>
                                            <td style="text-align: center;">{{detalle.Deliberacion}}</td>
                                        </tr>
                                        <tr>
                                            <th>Responsabilidad</th>
                                            <th>{{detalle.Responsabilidad}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table id="customers" style="width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Puntaje Directo</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Negativismo</td>
                                            <td style="text-align: center;">{{detalle.Negativismo}}</td>
                                            <td>
                                                <p v-if="detalle.Negativismo >= 150">Negativismo</p>
                                                <p v-if="detalle.Negativismo < 150">No Negativismo</p>                             
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Aquiescencia</td>
                                            <td style="text-align: center;">{{detalle.Aquiescencia}}</td>
                                            <td>
                                                <p v-if="detalle.Aquiescencia >= 150">Aquiescencia</p>
                                                <p v-if="detalle.Aquiescencia < 150">No Aquiescencia</p>                             
                                            </td>  
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Neutral</td>
                                            <td style="text-align: center;">{{240-(detalle.Negativismo+detalle.Aquiescencia) }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th>{{(detalle.Negativismo+detalle.Aquiescencia)+(240-(detalle.Negativismo+detalle.Aquiescencia))}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <button  @click="$router.go(-1)" class="btn btn-danger" style="width: 100%"><i class="fa-solid fa-arrow-left"></i> volver</button>
                            </div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
  
import * as estudianteService from "../../servicios/estudiante_service"
//import * as practicasService from "../../servicios/practicas"
//import store from "../../store";
//import $ from "jquery";

export default {
    name: "PersonalidadDetalle",
    data: () => ({  
        id_estudiante: "",
        estudiante: {
            nombre: "",
        },
        detalle: {}
    }),
    components: {},
    mounted() {
        this.id_estudiante = this.$route.params.idEstudiante;
        this.consultar_estudiante();
        this.detalle_personalidad();
    },
    methods: {
        async consultar_estudiante(){
            await estudianteService.consultar_estudiante(this.id_estudiante).then(respuesta => {
                this.estudiante = respuesta.data.estudiante;
            });
        },
        async detalle_personalidad(){
            await estudianteService.detalle_personalidad(this.id_estudiante).then(respuesta => {
                this.detalle = respuesta.data.detalle;
            });
        }
    }
};
</script>
<style>
    label{
        color: #2c4a73;
        font-weight: bold;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
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