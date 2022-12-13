<template>
  <v-app-bar app clipped-left clipped-right color="#003d6e" dark>
    <v-toolbar-title class="align-center d-flex">
      <span class="logo-icon">
        <img width="25%" src="../../assets/logo.png" />
      </span>
    </v-toolbar-title>
    <v-app-bar-nav-icon
      class="d-block d-md-none"
      @click="$vuetify.breakpoint.smAndDown ? setSidebarDrawer(!Sidebar_drawer) : $emit('input', !value)"
    />
    <v-spacer />
    <!---right part -->
    <v-menu bottom left transition="scale-transition">
      <template v-slot:activator="{ on }">
        <v-btn dark icon v-on="on">
          <v-icon x-large>mdi-account-circle</v-icon>
        </v-btn>
      </template>

      <v-list>
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
        <v-list-item v-for="(item, i) in userprofile" :key="i" link @click="menuActionClick(item.action)">
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>

        </v-list-item>
      </v-list>
    </v-menu>
  </v-app-bar>
</template>
<script>
// Utilities
import { mapState, mapMutations } from "vuex";
export default {
  name: "Header",

  components: {},

  props: {
    value: {
      type: Boolean,
      default: false
    }
  },
  data: () => ({
    userprofile: [
      { title: "Mi Perfil", icon: "mdi-account-circle"},
      { title: "Notificaciones " , icon: "mdi-bell"},
      { title: "Configuración de cuenta", icon: "mdi-account-edit"},
      { title: "Salir", icon: "mdi-logout", action: "logout"}
    ],
    href() {
      return undefined;
    },
    imagen: "pic.png",
    nombre: "",
    correo: "",
    tipo: "",
  }),

  computed: {
    ...mapState(["Sidebar_drawer"])
  },
  mounted() {
    this.foto_perfil();
  },
  methods: {
    ...mapMutations({
      setSidebarDrawer: "SET_SIDEBAR_DRAWER"
    }),

    async menuActionClick(action){
      switch (action) {
        case "logout":
          this.$session.destroy();
          this.$router.push({ name: 'Index' })
        break;
        default:
        break;
      }
    },

    async foto_perfil(){
      this.imagen = this.$session.get("foto");
      this.nombre = this.$session.get("usuario");
      this.correo = this.$session.get("correo");
      this.tipo = this.$session.get("tipo");
    }
  }
};
</script>