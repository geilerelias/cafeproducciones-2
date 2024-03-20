<script setup>
import logo from "@/../images/logo/logo-transparent.png"
import {useLinksStore} from "../../stores/links.js";
import {Link} from '@inertiajs/vue3'
import WhatsappMessageButton from "@/Components/App/WhatsappMessageButton.vue";
import {useTheme} from "vuetify";
import {computed} from "vue";


const linksStore = useLinksStore();


const theme = useTheme()

const isDarkTheme = computed(() => {
    return theme.global.current.value.dark
});
</script>

<template>
    <div>
        <svg :class="{'svg-dark-theme': isDarkTheme, 'svg-light-theme': !isDarkTheme}" class="logos-bg"
             viewBox="0 0 1442 163" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m-3.90909,6l48.30303,16c48.30303,16 144.90908,48 241.51514,48c96.60606,0 193.21211,-32 289.81817,-32c96.60606,0 193.21211,32 289.81817,53.3c96.60606,21.7 193.21211,31.7 289.81817,16c96.60606,-16.3 193.21211,-58.3 241.51514,-80l48.30303,-21.3l0,160l-48.30303,0c-48.30303,0 -144.90908,0 -241.51514,0c-96.60606,0 -193.21211,0 -289.81817,0c-96.60606,0 -193.21211,0 -289.81817,0c-96.60606,0 -193.21211,0 -289.81817,0c-96.60606,0 -193.21211,0 -241.51514,0l-48.30303,0l0,-160z"></path>
        </svg>

        <v-footer :class="isDarkTheme?'bg-grey-darken-4':'bg-grey-lighten-4'" style="z-index: 9 !important;">
            <v-container :class="isDarkTheme?'bg-grey-darken-4':'bg-grey-lighten-4'">
                <v-row>
                    <v-col class="col-md-4 col-12">
                        <div class="text-h6 text-lg-h5 font-weight-bold">Navegación</div>

                        <div class="v-responsive base-divider bg-primary  mb-6" style="max-width: 28px;">
                            <v-divider style="padding-bottom: 1px"></v-divider>
                        </div>

                        <div class="d-flex flex-wrap">
                            <v-img
                                :gradient="isDarkTheme?'rgba(33,33,33,0.6) 40%,rgba(33,33,33,0.8) 70%':'to top, rgb(245 245 245), rgb(245 245 245 / 42%)'"
                                :spect-ratio="5/4"
                                :src="logo"
                                contain
                                style="max-height:200px">

                                <div v-for="item in linksStore.links" :key="item.title"
                                     class="w-half body-1 mb-1">
                                    <Link :href="item.route"
                                          class="text-decoration-none secondary--text text--lighten-2">
                                        {{ item.title }}
                                    </Link>
                                </div>
                            </v-img>
                        </div>
                    </v-col>
                    <v-col class="col-md-4 col-12">
                        <div class="text-h6 text-lg-h5 font-weight-bold">
                            Información de contacto
                        </div>

                        <div class="v-responsive base-divider primary  mb-6" style="max-width: 28px;">
                            <v-divider style="padding-bottom: 1px"></v-divider>
                        </div>

                        <div class="d-flex mb-2 font-weight-bold">
                            <v-icon class="secondary--text text--lighten-1" light>mdi-map-marker-outline</v-icon>
                            Carrera 10 # 41 A - 17 Los Almendros, Riohacha, Colombia
                        </div>

                        <div class="d-flex mb-2">
                            <v-icon class="mr-2 secondary--text text--lighten-1"
                                    light>
                                mdi-phone-outline
                            </v-icon>
                            <div class="d-flex flex-column">
                                <a
                                    class="text-decoration-none secondary--text text--lighten-2" href="tel:3004361660">
                                    +57 300 436 1660
                                </a>
                                <a
                                    class="text-decoration-none secondary--text text--lighten-2" href="tel:3003285091">
                                    +57 300 328 5091
                                </a>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <v-icon class="notranslate mr-2 mdi secondary--text text--lighten-1"
                                    light>
                                mdi-email-outline
                            </v-icon>
                            <a
                                class="text-decoration-none secondary--text text--lighten-2"
                                href="mailto:contacto@cafeproducciones.com">
                                contacto@cafeproducciones.com
                            </a>
                        </div>
                    </v-col>

                    <v-col class="col-md-4 col-12">
                        <div class="text-h6 text-lg-h5 font-weight-bold">
                            Mantenerme informado
                        </div>

                        <div class="v-responsive base-divider primary  mb-6" style="max-width: 28px;">
                            <v-divider style="padding-bottom: 1px"></v-divider>
                        </div>

                        <div class="d-flex align-center flex-column flex-lg-row w-full mb-6">
                            <v-text-field class="mr-lg-2" density="comfortable" enclosed hide-details
                                          is-booted
                                          label="Your email" light outlined
                                          single-line
                                          solo variant="outlined">
                            </v-text-field>
                            <v-btn class="bg-secondary" is-elevated light
                                   size="large">
                                Subscribirse
                            </v-btn>
                        </div>
                        <div class=" d-flex text-center justify-end align-center text-md-right mt-4 mt-lg-2">
                            Conectar

                            <v-btn class="ml-2 bg-blue darken-4" dark fab
                                   href="https://www.facebook.com/CAFE-Producciones-101286955178495"
                                   rounded
                                   small target="_blank">
                                <v-icon light>
                                    mdi-facebook
                                </v-icon>
                            </v-btn>

                            <!--                            <v-btn fab rounded dark small-->
                            <!--                                   href="https://api.whatsapp.com/send?phone=573004361660;"-->
                            <!--                                   class="ml-2 green darken-1" target="_blank">-->
                            <!--                                <v-icon light>-->
                            <!--                                    mdi-whatsapp-->
                            <!--                                </v-icon>-->
                            <!--                            </v-btn>-->
                            <whatsapp-message-button class="ml-2"></whatsapp-message-button>

                            <v-btn class="ml-2 bg-pink darken-1" dark fab
                                   href="https://www.instagram.com/cafeproduccionesrio"
                                   rounded
                                   small target="_blank">
                                <v-icon light>
                                    mdi-instagram
                                </v-icon>
                            </v-btn>

                        </div>
                    </v-col>
                </v-row>
                <hr aria-orientation="horizontal" class="my-3 v-divider theme--light" role="separator">
                <div class="text-center caption"> © cafeproducciones.com 2021 - {{ new Date().getFullYear() }}. todos
                    los derechos reservados
                </div>
            </v-container>
        </v-footer>
    </div>
</template>

<style scoped>
/* Tema claro */
.svg-light-theme path {
    fill: rgb(var(--v-theme-grey-lighten-4)); /* Ajusta el color según necesites para el tema claro */
}

/* Tema oscuro */
.svg-dark-theme path {
    fill: rgb(var(--v-theme-surface)); /* Ajusta el color según necesites para el tema oscuro */
}

.border-bottom {
    border-bottom: 2px solid rgb(var(--v-theme-accent));
}

.logos-bg {
    fill: whitesmoke;
}

.w-half {
    width: 50% !important;
}
</style>
