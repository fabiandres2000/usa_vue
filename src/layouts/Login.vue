<template lang="">
    <div style="background-color: #dee2e6">
      <section id='loading'>Validando Datos....</section>
      <div id="nav_index">
        <div class="row" style="padding-top: 5px !important">
          <div class="col-3" style="margin-top: -22px !important; padding: 12px">
            <img src="../assets/logo2.png" id="img_logo_2" alt="">
          </div>
          <div class="col-8" id="menu_prin" style="margin-left: 3%">
            <div class="row" style="padding-top: 0px !important">
              <div class="col-7"></div>
              <div class="itemcol col-2 text-right" style="padding: 12px">
                <a href="#" v-b-modal.modal_s1><i class="fa-sharp fa-solid fa-circle-user fa-xl"></i> Iniciar sesión</a>
              </div>
              <div class="itemcol col-3 text-right"  style="padding: 12px">
                <a href="#" v-b-modal.modal-rc><i class="fa-solid fa-circle-info fa-xl"></i>  Recuperar Contraseña</a>
              </div>
            </div>
            <div class="row" style="padding-top: 6px !important">
              <div class="col-12 text-center" style="height: 60px; background-color: #00447a; padding-top: 14px">
                <a href="https://twitter.com/LaSergioSM"><i class="fa-brands fa-twitter fa-2x"></i></a>
                <a href="https://www.facebook.com/lasergiosm"><i class="fa-brands fa-facebook fa-2x"></i></a>
                <a href="https://www.youtube.com/channel/UCSskbG_tBKvRf9Ma4x6F29w"><i class="fa-brands fa-youtube fa-2x"></i></a>
                <a href="https://www.instagram.com/lasergiosm/"><i class="fa-brands fa-instagram fa-2x"></i></a>
                <a href="https://www.linkedin.com/school/universidad-sergio-arboleda/"><i class="fa-brands fa-linkedin fa-2x"></i></a>
              </div>
            </div>     
          </div>
        </div>
      </div>
      <nav id="menu_mobil" style="display: none" class="navbar navbar-expand-lg navbar-light bg-light">
        <button @click="abrirMenu" class="navbar-toggler" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
              <div class="itemcol">
                <a href="#" v-b-modal.modal-rc><i class="fa-solid fa-circle-info"></i> Recuperar Contraseña</a>
              </div>
              <div class="itemcol">
                <a href="#" v-b-modal.modal_s1><i class="fa-sharp fa-solid fa-circle-user"></i> Iniciar sesión</a>
              </div>
              <div class="row">
                <div class="col-12 text-center social_movil" style="height: 75px;">
                  <hr>
                  <a href="https://twitter.com/LaSergioSM"><i class="fa-brands fa-twitter fa-2x"></i></a>
                  <a href="https://www.facebook.com/lasergiosm"><i class="fa-brands fa-facebook fa-2x"></i></a>
                  <a href="https://www.youtube.com/channel/UCSskbG_tBKvRf9Ma4x6F29w"><i class="fa-brands fa-youtube fa-2x"></i></a>
                  <a href="https://www.instagram.com/lasergiosm/"><i class="fa-brands fa-instagram fa-2x"></i></a>
                  <a href="https://www.linkedin.com/school/universidad-sergio-arboleda/"><i class="fa-brands fa-linkedin fa-2x"></i></a>
                </div>
              </div>
          </div>
        </div>
      </nav>
      <br>
      <br>
      <div class="col-lg-12 text-left" style="padding-left: 10%; padding-right: 10%">
      <h2 style="color: #00447a; text-align: left">Escuela de Comunicación, Periodismo y Psicología <br> Programa de Psicología</h2>
      <hr>
      <div class="card">
        <div class="row">
          <div class="col-6">
            <div class="d-flex align-items-end p-2">
              <form @submit.prevent="registro_estudiante" method="post" ref="form_init" id="form_init">
                <div class="row text-left" style="padding-left: 40px;">
                      <div class="col-lg-12">
                        <h3 style="font-weight: bold; color: #2C4A73;">Cordial saludo,</h3>  
                        <h3 style="font-weight: bold; text-align: justify;">Registro estudiante.</h3>
                      </div>
                  </div>
                  <div class="row" style="padding-left: 40px;">
                      <div class="col-lg-12" style="padding-top: 15px;"><input name="cedula" id="cedula" type="number" class="form-control" placeholder="Cédula" required></div>
                      <div class="col-lg-12" style="padding-top: 15px;"><input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre Completo" required></div>
                      <div class="col-lg-12" style="padding-top: 15px;"><input name="correo" id="correo" type="email" class="form-control" placeholder="Correo Electronico" required></div>
                      <div class="col-lg-12" style="padding-top: 15px;"><input name="celular" id="celular" type="text" class="form-control" placeholder="Número de Celular" required></div>
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
                  <div class="row" style="padding-left: 40px;">
                    <div class="col-12" id="budiv">
                      <hr>
                      <button style="cursor: pointer;" class="btn btn-warning" type="submit" >Guardar Datos</button>
                    </div>       
                  </div>
                </form>
              </div>
          </div>
          <div class="col-6" style="padding: 0px">
            <img id="fondo_psi" style="width: 100%;" src="../assets/psicologia.jpg" alt="">
          </div>
        </div> 
        </div>
      </div>
        
      <b-modal id="modal_s1" title="Iniciar sesión" hide-footer>
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
      <footer style="margin-top: 30px">
        <div style="width: 100%; padding-left: 100px; padding-right: 100px; background-color: #003d6e">
          <div class="row">
            <div class="col-lg-3">
              <img src="../assets/footer.png" alt="">
              <br>
              <p style="padding-top: 3px !important">
                PBX: (605) 434 6444
              </p>
            </div>
            <div class="col-lg-6 text-center">
              <p>
                CAMPUS CENTRO
                <br>
                CALLE 18 N° 14A - 18
              </p>
              <hr>
              <p>
                CAMPUS RODRIGO NOGUERA LABORDE
                <br>
                CARRERA 29D N° 30 - 207
              </p>
            </div>
            <div class="col-lg-3 text-right p-3"><img style="width: 180px" src="../assets/icontec.png" alt=""></div>
          </div> 
        </div>
        <div style="width: 100%; padding-left: 100px; padding-right: 100px; text-align: center; padding-top: 15px; padding-bottom: 4px; background-color: #00345e">
          <p style="color: white;font-size:12px;text-transform: inherit;line-height: 1.4;">SNIES 1733 - Resolución personería jurídica 16377  del 29 de octubre de 1984 y 6423 del 05 de agosto de 2011 ● Carácter académico: Universidad ● Resolución creación seccional 946 del 02 de mayo de 2002 ● Institución sujeta a inspección y vigilancia por el Ministerio de Educación Nacional.</p>
        </div>
      </footer>
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
        abierto: false,
      };
  },
  mounted() {
    const load = document.querySelector("#loading");
    load.style.display = "none";
  },
  methods: {
    async login() {

      const load = document.querySelector("#loading");
      load.style.display = "grid";

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
          this.$session.set('id_estudiante', respuesta.data.usuario[0].id_estudiante)
          this.$session.set('id_tutor_usa', respuesta.data.usuario[0].id_tutor_usa)
          this.$session.set('id_tutor_sp', respuesta.data.usuario[0].id_tutor_sp)

          const load = document.querySelector("#loading");
          load.style.display = "none";

          this.$router.push({ name: 'admin' })
        }else{
          this.$swal('Error...', respuesta.data.respuesta, 'error');
          const load = document.querySelector("#loading");
          load.style.display = "none";
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
    },
    abrirMenu(){
      if(this.abierto){
        document.getElementById("navbarNavAltMarkup").classList.remove("show");
        this.abierto = false;
      }else{
        document.getElementById("navbarNavAltMarkup").classList.add("show");
        this.abierto = true;
      }
    }
  },
}
</script>
<style>
  .fa-brands{
    color: white;
    padding-left: 15px;
    padding-right: 15px;
  }

  .social_movil a .fa-brands{
    color: #00345e;
    padding-left: 15px;
    padding-right: 15px;
  }

  .itemcol i {
    color: #f7c000;
  }

  .col-lg-3 p {
    padding-top: 40px;
    color: white;
  }

  footer hr {
    background-color: #00345e;
  }

  .col-lg-6 p {
    color: white;
  }

  @media (max-width: 600px) {
    #fondo_psi {
      display: none;
    }

    #sub{
      height: 75% !important;
    }

    #menu_prin {
      display: none;
    }

    #nav_index{
      padding-left: 65px !important;
    }

    #menu_mobil{
      display: block !important;
    }
  }

  #menu_mobil{
    position: absolute;
    width: 100%;
    top: 0;
    background-color: #ffffff00 !important;
  }

  #navbarNavAltMarkup{
    background-color: #ffff;
    padding: 10px;
    z-index: 1;
    position: absolute;
    width: 90%;
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