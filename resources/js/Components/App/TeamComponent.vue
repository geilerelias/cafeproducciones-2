<script setup>
import equipodetrabajo from '@/../images/team/equipodetrabajo.jpg'
import carmenbarros from '@/../images/team/carmenbarros.png'
import ferneybarros from '@/../images/team/ferneybarros.png'
import gennerradillo from '@/../images/team/gennereliasradillosarmiento.png'
import geilerradillo from '@/../images/team/geilerelias.png'
import {useDisplay} from "vuetify";

const {xsOnly, xs, md, mobile, mdAndDown, mdAndUp, lgAndUp, smAndUp, smAndDown} = useDisplay()

const team = [

    {
        name: 'Carmen Barros Diaz',
        src: carmenbarros,
        ocupation: 'Fundador - CEO -Gerente',
        perfil: ''
    },
    {
        name: 'Genner Radillo Sarmiento',
        src: gennerradillo,
        ocupation: 'Director de operaciones',
        perfil: ''
    },
    {
        name: 'Ferney Barros Diaz',
        src: ferneybarros,
        ocupation: 'Fundador - Coordinador general',
        perfil: ''
    },
    {
        name: 'Geiler Radillo Sarmiento',
        src: geilerradillo,
        ocupation: 'Ing. Desarrollo',
        perfil: ''
    },

];

</script>

<template>
    <v-sheet>
        <v-container class="py-4 py-lg-8">
            <div :data-aos="mobile?'fade-up':'fade-left'" class="text-center"
                 data-aos-delay="200" data-aos-duration="1000">
                <div :data-aos="mobile?'fade-up':'fade-right'" class="text-uppercase text-overline mb-2"
                     data-aos-delay="200"
                     data-aos-duration="1000">trabajando con nosotros
                </div>
                <h2 :data-aos="mobile?'fade-up':'fade-left'" class="text-h5 font-weight-bold mb-2 text-center"
                    data-aos-delay="200" data-aos-duration="1000">Conoce nuestro equipo</h2>


                <v-responsive class="base-divider bg-primary mx-auto mb-6" style="max-width: 28px;">
                    <v-divider style="padding-bottom: 1px"></v-divider>
                </v-responsive>

                <v-responsive class="mx-auto" style="max-width: 1200px;">
                    <div class="subtitle-1 text-lg-subtitle-1  mt-4">
                        Contamos con un talento comprometido, apasionados y emprendedor, cuya motivación y
                        dedicación a su trabajo es vital para el éxito de CAFE Producciones.
                        <br>Promovemos un entorno de trabajo
                        basado en la
                        igualdad de oportunidades, la diversidad y la inclusión.
                    </div>
                </v-responsive>
            </div>


            <div class="d-flex align-center justify-center flex-wrap mt-sm-8 mt-5">
                <div
                    v-for="(item,n) in team"
                    :key="n"
                    class="pa-2 d-flex flex-column align-center"
                >
                    <v-card class="hover-card overflow-hidden rounded-md lh-10 mb-7 " height="250" width="200">

                        <!--                                <v-img
                                                            :alt="team.name"
                                                            :aspect-ratio="4/5"
                                                            :src="team.img"
                                                            class="zoom-in w-100"
                                                            cover=""
                                                        />-->


                        <v-img :alt="item.name" :src="item.src" class="zoom-in w-100"
                               cover
                               height="250"
                               width="200"/>

                    </v-card>
                    <h2 class="text-h5 text-dark font-weight-bold">{{ item.name }}</h2>
                    <p class="text-muted">{{ item.ocupation }}</p>
                </div>
            </div>

        </v-container>
        <v-card class="pa-6 bg-background">
            <div class="hover-card">
                <v-img :src="equipodetrabajo" class="zoom-in "></v-img>
            </div>
        </v-card>
    </v-sheet>
</template>


<style>

</style>
