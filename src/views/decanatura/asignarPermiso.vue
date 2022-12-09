<template>
    <v-container fluid class="down-top-padding">
      <v-row>
        <v-col cols="12" lg="12">
          <v-card>
            <v-card-text class="text-left p-5">
                <form @submit.prevent="asignar_permiso" method="post" ref="form_ap" id="form_ap">
                    <div class="row" style="width: 100%; text-align: left; padding-left: 40px; padding-right: 40px;">
                        <div class="col-lg-12">
                            <h3 style="font-weight: bold; color: #2C4A73;">Asignar permiso a módulos</h3>  
                            <h3 style="font-weight: bold; text-align: justify;">Complete los siguientes datos: </h3>
                        </div>
                    </div>
                    <div class="row" style="padding-left: 40px; padding-right: 40px;">
                        <div class="col-lg-12" style="padding-top: 15px;">
                            <label for="nombre">Nombres y Apellidos</label>
                            <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombres y Apellidos" required>
                        </div>
                        <div class="col-lg-12" style="padding-top: 15px;">
                            <label for="correo">correo</label>
                            <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo Electronico" required>
                        </div>
                        <div class="col-lg-12" style="padding-top: 15px;">
                            <label for="tipo_registro">Módulo al cual le dará autorización</label>
                            <select  style="height: 34px;" name="tipo_registro" id="tipo_registro" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="Investigación e innovación">Investigación e innovación</option>
                                <option value="Proyección social y extensión">Proyección social y extensión</option>
                                <option value="Extension - Educacion continua">Extension - Educacion continua</option>
                                <option value="Profesores y Currículo">Profesores y Currículo</option>
                                <option value="Practicas">Practicas</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6 text-center" id="budiv"><button style="cursor: pointer; width: 91%;" class="btn btn-warning" type="submit" >Guardar Datos</button></div>       
                        <div class="col-6 text-center" id="budiv"><button style="cursor: pointer; width: 91%;" class="btn btn-danger" type="submit" >Cancelar</button></div>       
                    </div>
                </form>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script>

  import * as decanaturaServices from "../../servicios/decanatura_services";

  export default {
    name: "asignarPermiso",
    data: () => ({    
    }),
    components: {},
    methods: {
        async asignar_permiso() {
            const formData = new FormData(this.$refs['form_ap']); 
            const data = {};
            for (let [key, val] of formData.entries()) {
                Object.assign(data, { [key]: val })
            }
            await decanaturaServices.asignar_permiso(data).then(respuesta => {
                if(respuesta.data.codigo == 1){
                    this.$swal('Correcto...', respuesta.data.respuesta, 'success');
                    setTimeout(()=>{
                        this.$forceUpdate();
                    }, 1500)
                }else{
                    this.$swal('Error...', respuesta.data.respuesta, 'error');
                }
            });
        },
    },
  };
  </script>
  