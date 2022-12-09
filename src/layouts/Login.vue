<template lang="">
    <div id="cuerpo">
        <div id= "sub" :style="{ backgroundImage: `url(${backgroundUrl})` }">
            <div class="text-center p-4">
                <b-navbar toggleable="lg" type="dark" variant="info" id="nav_index">
                    <img src="../assets/logo2.png" alt="" width="16%">
                    <b-collapse id="nav-collapse" is-nav>
                        <!-- Right aligned nav items -->
                        <b-navbar-nav class="ml-auto">
                            <b-button variant="warning" v-b-modal.modal-rc>Recuperar Contraseña</b-button>
                            <div style="width: 20px"></div>
                            <b-button variant="primary" v-b-modal.modal-1>Iniciar sesión</b-button>
                        </b-navbar-nav>
                    </b-collapse>
                </b-navbar>
                <br>
                <div class="col-lg-12 text-center" style="padding-left: 20%; padding-right: 20%">
                <h2>Universidad Sergio Arboelda - Sede Santa Marta</h2>
                <br>
                <h2 style="color: #d4a81e;">Escuela de Comunicación, Periodismo y Psicología <br> Programa de Psicología</h2>
                <div class="card">
                  <div class="d-flex align-items-end p-2">
                    <form @submit.prevent="registro_estudiante" method="post" ref="form_init" id="form_init">
                      <div class="row" style="width: 100%; text-align: left; padding-left: 40px; padding-right: 40px;">
                            <div class="col-lg-12">
                              <h3 style="font-weight: bold; color: #2C4A73;">Cordial saludo,</h3>  
                              <h3 style="font-weight: bold; text-align: justify;">Registro de nuevo estudiante.</h3>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 40px; padding-right: 40px;">
                            <div class="col-lg-6" style="padding-top: 15px;"><input name="cedula" id="cedula" type="number" class="form-control" placeholder="Cédula" required></div>
                            <div class="col-lg-6" style="padding-top: 15px;"><input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre Completo" required></div>
                            <div class="col-lg-6" style="padding-top: 15px;"><input name="correo" id="correo" type="email" class="form-control" placeholder="Correo Electronico" required></div>
                            <div class="col-lg-6" style="padding-top: 15px;"><input name="celular" id="celular" type="text" class="form-control" placeholder="Número de Celular" required></div>
                            <div class="col-lg-6" style="padding-top: 15px;">
                                <select  style="height: 34px;" name="semestre" id="semestre" class="form-control">
                                    <option value="">Semestre cursado</option>
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
                            <div class="col-lg-6" style="padding-top: 15px;">
                                <select  style="height: 34px;" name="periodo" id="periodo" class="form-control">
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
                        <hr>
                        <div class="row">
                          <div class="col-4"></div>
                          <div class="col-4" id="budiv"><button style="cursor: pointer;" class="btn btn-warning" type="submit" >Guardar Datos</button></div>       
                          <div class="col-4"></div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        
        <b-modal id="modal-1" title="Iniciar sesión" hide-footer>
            <form class="mb-3" @submit.prevent="login" method="post" ref="isesion" id="isesion">
              <div class="mb-3">
                <label for="email" class="form-label">Email o Usuario</label>
                <input
                  type="email"
                  class="form-control"
                  id="usuario"
                  name="usuario"
                  placeholder="Email o Usuario"
                  required
                />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Contraseña</label>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="pass"
                    class="form-control"
                    name="pass"
                    placeholder="*************"
                    aria-describedby="password"
                    required
                  />
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-warning d-grid w-100" type="submit">Ingresar</button>
              </div>
            </form>
        </b-modal>

        <b-modal id="modal-rc" title="Recuperar Contraseña" hide-footer>
            <h4 class="mb-2">Has olvidado tu contraseña? 🔒</h4>
            <p class="mb-4">Ingrese su correo electrónico y le enviaremos instrucciones para restablecer su contraseña.</p>
            <form class="mb-3" @submit.prevent="recuperar_clave" method="post" ref="form_cambio_pass" id="form_cambio_pass">
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="correo"
                    name="correo"
                    placeholder="Ingrese su correo electrónico"
                    autofocus
                  />
                </div>
              <div class="mb-3">
                <button class="btn btn-warning d-grid w-100" type="submit">Ingresar</button>
              </div>
            </form>
        </b-modal>
    </div>
</template>
<style scoped src="@/assets/styles/login.css"></style>
<script>
import backgroundUrl from "../assets/banner_img.png";
import * as userService from "../servicios/user.js"

export default {
  data() {
      return {
        backgroundUrl,
      };
  },
  mounted() {
    
  },
  methods: {
    async login() {
      const formData = new FormData(this.$refs['isesion']); 
      const data = {};
      for (let [key, val] of formData.entries()) {
        Object.assign(data, { [key]: val })
      }
      await userService.login(data).then(respuesta => {
        if(respuesta.data.codigo == 1){
          this.$session.start()
          this.$session.set('usuario', respuesta.data.usuario[0].nombre)
          this.$session.set('correo', respuesta.data.usuario[0].correo)
          this.$session.set('foto', respuesta.data.usuario[0].foto)
          this.$session.set('tipo', respuesta.data.usuario[0].tipo)

          this.$router.push({ name: 'admin' })
        }else{
          this.$swal('Error...', respuesta.data.respuesta, 'error');
        }
      });
    },
    async registro_estudiante() {
      const formData = new FormData(this.$refs['form_init']); 
      const data = {};
      for (let [key, val] of formData.entries()) {
        Object.assign(data, { [key]: val })
      }
      Object.assign(data, { "tipo_registro": "Estudiante" })
      await userService.registro_usuario(data).then(respuesta => {
        if(respuesta.data.codigo == 1){
          this.$swal('Error...', respuesta.data.respuesta, 'success');
        }else{
          this.$swal('Error...', respuesta.data.respuesta, 'error');
        }
      });
    },
    async recuperar_clave() {
      const formData = new FormData(this.$refs['form_cambio_pass']); 
      const data = {};
      for (let [key, val] of formData.entries()) {
        Object.assign(data, { [key]: val })
      }
      await userService.recuperar_clave(data).then(respuesta => {
        if(respuesta.data.codigo == 1){
          this.$swal('Error...', respuesta.data.respuesta, 'success');
        }else{
          this.$swal('Error...', respuesta.data.respuesta, 'error');
        }
      });
    }
  },
}
</script>
<style lang="">
    
</style>