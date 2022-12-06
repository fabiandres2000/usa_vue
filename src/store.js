import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        Sidebar_drawer: null,
        Customizer_drawer: false,
        SidebarColor: 'white',
        SidebarBg: '',
        apiURL: 'http://127.0.0.1:8000/',
        serverPath: 'http://127.0.0.1:8000/',
        //apiURL: 'https://usa-vue.institutocolombianodepsicometria.com/back_usa/public/',
        //serverPath: 'https://usa-vue.institutocolombianodepsicometria.com/back_usa/public/',
    },
    mutations: {
        SET_SIDEBAR_DRAWER (state, payload) {
            state.Sidebar_drawer = payload
        },
        SET_CUSTOMIZER_DRAWER (state, payload) {
            state.Customizer_drawer = payload
        },
        SET_SIDEBAR_COLOR (state, payload) {
            state.SidebarColor = payload
        }, 
    },
    actions: {

    }
})