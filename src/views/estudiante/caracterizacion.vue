<template>
    <v-container fluid class="down-top-padding">
      <v-row>
        <v-col cols="12" lg="12">
          <v-card>
            <v-card-text class="text-left p-5">
                <h1 style="color: #2c4a73; font-weight: bold">Caracterización  Sociodemográfica</h1>
                <hr>
                
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script>


  export default {
    name: "Caracterizacion",
    data: () => ({  
        
    }),
    components: {},
    mounted() {
        this.id_estudiante = this.$session.get("id_estudiante");
    },
    methods: {
        
    },
  };
  </script>
  