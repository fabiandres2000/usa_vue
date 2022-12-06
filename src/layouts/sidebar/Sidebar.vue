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
    
    items: [
      {
        title: "Dashboard",
        icon: "fa-solid fa-house",
        href: "/admin/dashboard/basic-dashboard"
      },
      {
        title: "Practicas",
        icon: "fa-solid fa-person-digging",
        href: "",
        child: [
              {
                  href: '/admin/registro-practica',
                  title: 'Registro'
              },
              {
                  href: '/charts/sublink',
                  title: 'Estado'
              }
          ]
      },
      {
        title: "Caracterización",
        icon: "fa-solid fa-person-circle-question",
        href: "/admin/pages/icons"
      },
      {
        title: "Test 1",
        icon: "fa-solid fa-list-check",
        href: "/admin/pages/alerts"
      },
      {
        title: "Perfil",
        icon: "fa-solid fa-user",
        href: "/admin/pages/profile"
      }
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
    }
  }
};
</script>
<style lang="scss">
.v-sidebar-menu{
  height: 84%;
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