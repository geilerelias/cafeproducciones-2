<script setup>
import {useDisplay} from 'vuetify'
import {Head, Link} from "@inertiajs/vue3";
import logo from "../../images/logo/logo.png";
import {onMounted} from "vue";
import AOS from "aos";
import lazyBg1 from "../../images/bg/lazy-bg-1.png";
import bg1 from "../../images/bg/bg-1.png";


defineProps({
    banner: {
        type: Boolean,
        default: true
    },
    title: String,
});

onMounted(() => {
    AOS.init();
})

const {smAndDown} = useDisplay()


</script>

<template>
    <v-app>
        <Head>
            <title>{{title}}</title>
        </Head>

        <v-row class="fill-height pa-0 ma-0" no-gutters>
            <v-col v-if="banner"
                   :order="smAndDown?'2':'1'"
                   class=" d-flex flex-column-reverse align-center justify-center fill-height  my-0 py-0 align-center"
                   cols="12"
                   lg="7"
                   md="6"
            >
                <v-img
                    :lazy-src="lazyBg1"
                    :src="bg1"
                    alt="bg lg"
                    class="z-index2  fill-height"
                    cover
                    gradient="rgba(33,33,33,.9) 20%,rgba(33,33,33,0.9) 90%"
                    height="100vh" width="100%">
                    <v-row class="d-flex fill-height align-center justify-center" dark>
                        <v-col>
                            <div class="d-flex align-center flex-column mt-12">
                                <img :src="logo" alt="logo" data-aos="fade-up"
                                     data-aos-delay="200" data-aos-duration="1000" style="height: 300px;"/>

                                <div
                                    class="text-white  ml-2 text-decoration-none font-weight-bold text-sm-h5 text-md-h3 my-4 text-nova-round-regular"
                                    d-flex data-aos="fade-down"
                                    data-aos-delay="200"
                                    data-aos-duration="1000" justify-center>
                                    CAFE PRODUCCIONES
                                </div>
                            </div>
                            <v-container>
                                <v-row class="d-flex justify-center">
                                    <v-col cols="10">
                                        <h1 class="text-h5 text-lg-h4 font-weight-bold text-white  mb-6">
                                            Somos tu empresa de producción, planificación y acompañamiento para todo
                                            tipo evento
                                        </h1>
                                        <p class="text-body-1 text-justify text-white text-muted mb-8">
                                            Somos una empresa dedicada a la asesoría, producción y logística de todo
                                            tipo de evento, con alta experiencia a nivel Nacional, ofreciéndole gran
                                            calidad, inspección y extremado profesionalismo con más de 5 años de
                                            experiencia en el Área. Disponemos de una gran variedad de mobiliario le
                                            ofrecemos diversas decoración, arquetipos de escenarios, centros de mesa,
                                            montajes de Stands entre otros. Poseemos todo lo concerniente al
                                            entretenimiento de su evento. tenemos los dispositivos tecnológicos para
                                            Audio, Sonido y Luces de múltiples categorías.
                                        </p>

                                        <Link class="text-decoration-none" href="/about-us">
                                            <v-btn
                                                class="mt-4 text-capitalize "
                                                color="white"
                                                dark
                                                depressed
                                                size="x-large"
                                                variant="outlined"
                                            >
                                                Saber más
                                            </v-btn>
                                        </Link>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-col>
                    </v-row>

                </v-img>
            </v-col>
            <v-col :order="smAndDown?'1':'2'"
                   class="d-flex align-center "
                   cols="12"
                   lg="5"
                   md="6"
            >
                <v-container>
                    <slot></slot>
                </v-container>
            </v-col>
        </v-row>
    </v-app>
</template>


<style>

.v-field--variant-outlined .v-field__outline__notch {
    flex: none;
    position: relative;
    border-width: 0px;
}

.text-nova-round-regular {
    font-family: "Nova Round", system-ui;
    font-weight: 400;
    font-style: normal;
}
</style>
