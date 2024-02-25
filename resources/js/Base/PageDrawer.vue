<script setup>
import {ref} from "vue";
import {router} from '@inertiajs/vue3'
import bg from '../../images/bg/00.jpg';
import {useDrawerStore} from "../../stores/drawer";
import {useDisplay} from "vuetify";
import {useLinksStore} from "../../stores/links";
import logo from "../../images/logo/logo.png";

const linksStore = useLinksStore();

const drawerStore = useDrawerStore();

const {xsOnly, xs, md, mobile, mdAndDown, mdAndUp, lgAndUp, smAndUp, smAndDown} = useDisplay()

const group = ref(null)
const authentication = [
    {title: 'Login', icon: 'mdi-account-lock', route: "/login"},
    {title: 'Sign Up', icon: 'mdi-account-plus', route: "/register"},
]

const logout = () => {
    router.post(route('logout'));
};

function redirect(dir) {
    router.get(route(dir))
    drawerStore.drawer = false;
}


</script>

<template>
    <v-navigation-drawer
        v-model="drawerStore.drawer"
        expand-on-hover
        style="box-shadow: rgb(0 0 0 / 20%) -20px 1px 17px 8px, rgb(0 0 0 / 14%) 0px 2px 2px 0px, rgb(0 0 0 / 12%) 0px 1px 5px 0px"
        temporary
    >
        <v-img :src="bg" cover gradient="to top right, rgb(21 92 138 / 75%), rgb(4 16 35 / 82%)">
            <v-row class="d-flex fill-height align-center justify-center">
                <v-col class="d-flex justify-center">
                    <div class="d-flex align-center flex-column mt-12">
                        <img :src="logo" alt="logo" data-aos="fade-up"
                             data-aos-delay="200" data-aos-duration="1000" style="height: 100px;"/>

                        <h1 :data-aos="mobile?'fade-down':'fade-right'"
                            class="text-h5 px-2 text-md-h3 font-weight-bold mb-5 text-dark text-nova-round-regular text-white">
                            CAFE PRODUCCIONES
                        </h1>
                    </div>
                </v-col>
            </v-row>
        </v-img>

        <v-divider></v-divider>

        <v-list density="compact" nav="">
            <v-list-item v-for="link in linksStore.links"
                         :class="{
                            'v-list-item--active text-primary font-weight-black': route().current(link.route) ,
                         }"
                         :prepend-icon="link.icon" :title="link.title"
                         @click="redirect(link.route)">
            </v-list-item>
            <v-list-subheader>
                Autenticación
            </v-list-subheader>
            <v-list-item
                :title="'Iniciar sesión'" prepend-icon="mdi-login"
                @click="redirect('login')">

            </v-list-item>
            <v-list-item
                :title="'Registrarse'" prepend-icon="mdi-account-plus"
                @click="redirect('register')">

            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<style scoped>

</style>
