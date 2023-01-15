<template>
  <v-navigation-drawer
    v-model="Sidebar_drawer"
    :dark="SidebarColor !== 'white'"
    :color="SidebarColor"
    mobile-break-point="960"
    clipped
    :right="$vuetify.rtl"
    mini-variant-width="70"
    :expand-on-hover="expandOnHover"
    app
    id="main-sidebar"
  >
    <v-list dense nav>
      <!---USer Area -->
      <v-list-item two-line class="px-0">
        <v-list-item-avatar>
          <img
            v-if="imagen != null"
            alt="Logo"
            :src="
                `${$store.state.serverPath}assets/perfiles/${imagen}`
            "
            width="70"
            style="margin-left:5px;"
          />
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title>{{this.nombre}}</v-list-item-title>
          <v-list-item-subtitle class="caption">{{this.correo}}</v-list-item-subtitle>
          <v-list-item-subtitle class="caption">{{this.tipo}}</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <!---USer Area -->
      <!---Sidebar Items -->
      <hr>
      <sidebar-menu :menu="items" theme="white-theme"/>
      <!---Sidebar Items -->
    </v-list>
  </v-navigation-drawer>
</template>
<script>

import { mapState } from "vuex";
import { SidebarMenu } from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'

export default {
  name: "Sidebar",
  components: {
    SidebarMenu
  },
  props: {
    expandOnHover: {
      type: Boolean,
      default: false
    }
  },
  data: () => ({
    items:[],
    itemsEstudiante: [
      {
        title: "Dashboard",
        icon: "fa-solid fa-house",
        href: "/admin/dashboard/basic-dashboard"
      },
      {
        title: "Practicas",
        icon: "fa-solid fa-person-digging",
        href: "/admin/registro-practica"
      },
      {
        title: "Test",
        icon: "fa-solid fa-person-circle-question",
        href: "",
        child: [
              {
                href: "/estudiante/caracterizacion",
                title: 'Caracterización',
                icon: "fa-sharp fa-solid fa-circle"
              },
              {
                href: '/charts/sublink',
                title: 'Vocacional',
                icon: "fa-sharp fa-solid fa-circle"
              },
              {
                href: '/estudiante/test-personalidad',
                title: 'Personalidad',
                icon: "fa-sharp fa-solid fa-circle"
              }
          ]
      },
      {
        title: "Perfil",
        icon: "fa-solid fa-user",
        href: "/admin/pages/profile"
      }
    ],
    itemsPracticas: [
      {
        title: "Convenios",
        icon: "fa-solid fa-handshake",
        href: "/practicas/convenios"
      },
      {
        title: "Tutores SP",
        icon: "fa-solid fa-person-chalkboard",
        href: "/practicas/tutor-sp"
      },
      {
        title: "Tutores USA",
        icon: "fa-solid fa-person-chalkboard",
        href: "/practicas/tutor-usa"
      },
      {
        title: "Asig. de practicantes",
        icon: "fa-solid fa-user-tag",
        href: "/practicas/asignaciones"
      },
      {
        title: "Asig. fecha máxima",
        icon: "fa-solid fa-calendar-day",
        href: "/admin/asignar-permiso2"
      },
    ],
    itemDecanatura:[
      {
        title: "Permisos",
        icon: "fa-solid fa-unlock-keyhole",
        href: "/admin/asignar-permiso"
      },
      {
        title: "Test Personalidad",
        icon: "fa-solid fa-comments",
        href: "/decanatura/estudiantes-personalidad"
      },
    ],
    itemTutor:[
      {
        title: "Asignaciones",
        icon: "fa-solid fa-people-arrows",
        href: "/tutor/mis-asignaciones"
      },
      {
        title: "Observaciones",
        icon: "fa-solid fa-comments",
        href: "/tutor/mis-observaciones"
      },
    ],
    imagen: "pic.png",
    nombre: "",
    correo: "",
    tipo: "",
  }),
  computed: {
    ...mapState(["SidebarColor", "SidebarBg"]),
    Sidebar_drawer: {
      get() {
        return this.$store.state.Sidebar_drawer;
      },
      set(val) {
        this.$store.commit("SET_SIDEBAR_DRAWER", val);
      }
    }
  },
  watch: {
    "$vuetify.breakpoint.smAndDown"(val) {
      this.$emit("update:expandOnHover", !val);
    }
  },
  mounted() {
    this.foto_perfil();
  },
  methods: {
    async foto_perfil(){
      this.imagen = this.$session.get("foto");
      this.nombre = this.$session.get("usuario");
      this.correo = this.$session.get("correo");
      this.tipo = this.$session.get("tipo");

      switch (this.tipo) {
        case "Decanatura":
          this.items = this.itemDecanatura;
        break;
        case "Estudiante":
          this.items = this.itemsEstudiante;
        break;
        case "Practicas":
          this.items = this.itemsPracticas;
        break;
        case "Tutor SP":
          this.items = this.itemTutor;
        break;
        case "Tutor USA":
          this.items = this.itemTutor;
        break;
        default:
        break;
      }
    }
  }
};
</script>
<style lang="scss">
.v-sidebar-menu{
  height: 86%;
  margin-top: 110px;
}
#main-sidebar{
  box-shadow:1px 0 20px rgba(0,0,0,.08);
  -webkit-box-shadow:1px 0 20px rgba(0,0,0,.08);
  .v-navigation-drawer__border{
    display: none;
  }
  .v-list{
    padding: 8px 15px;
  }
  .v-list-item{
      &__icon--text,
      &__icon:first-child{
        justify-content: center;
        text-align: center;
        width: 20px;
        
      }
  }   
  
  .vsm--toggle-btn{
    height: 67px !important;
  }
}
</style>