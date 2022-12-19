<template lang="">
    <v-container fluid class="down-top-padding">
        <v-row>
            <v-col cols="12" lg="12">
                <v-card>
                    <v-card-text class="text-left p-3">
                        <b-tabs content-class="mt-3">
                            <b-tab title="Asignaciones Registradas" active>
                                <Asignaciones></Asignaciones>
                            </b-tab>
                            <b-tab title="Nueva Asignación">
                                <nuevaAsignacionVue></nuevaAsignacionVue>
                            </b-tab>
                        </b-tabs>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import nuevaAsignacionVue from './nuevaAsignacion.vue';
import Asignaciones from './asignaciones.vue';
export default {
    components:{
        nuevaAsignacionVue,
        Asignaciones
    },
}
</script>
<style lang="">
    
</style>