<script setup>
import PageLayout from "@/Layouts/PageLayout.vue";

import {computed, onMounted, ref} from 'vue';
import axios from 'axios';


const search = ref('');
const allservices = ref([
    // Define tus servicios aquí
]);
const images = ref([
    "/services/vallas/01.jpg",
    "/services/vallas/02.jpg",
    "/services/vallas/03.jpg",
    "/services/vallas/04.jpg",
    // Agrega más imágenes si es necesario
]);
const active = ref(null);

const services = computed(() => {
    const lowerSearch = search.value.toLowerCase();
    if (!lowerSearch) return allservices.value;
    return allservices.value.filter(service =>
        service.name.toLowerCase().includes(lowerSearch) ||
        service.title.toLowerCase().includes(lowerSearch) ||
        service.description.toLowerCase().includes(lowerSearch)
    );
});

onMounted(() => {
    allservices.value.forEach(service => {
        const folder = service.name;
        axios.get(`/find/services/${folder}`)
            .then(response => {
                const lista = response.data;
                const images = lista.map(image => `/src/services/${folder}/${image}`);
                const firstImage = images[0] || '';
                service.images = images;
                service.firtImage = firstImage;
            })
            .catch(error => {
                console.error(error);
            });
    });
});

const getImage = (item) => {
    if (item.images === undefined) {
        console.log("nada que mostrar")
    } else {
        console.log("esta es la imagen ", item.images[0])
    }
};
</script>

<template>
    <page-layout title="Servicios">
        <v-sheet>
            <v-container class="py-6">
                <div class="text-center mb-6">
                    <div class="d-inline-flex mb-4">
                        <v-avatar class="primary"
                                  size="56">
                            <v-icon dark
                                    size="28">
                                mdi-face-agent
                            </v-icon>
                        </v-avatar>
                    </div>
                    <h1 class="text-uppercase text-h5 font-weight-bold mb-2 text-center">
                        Nuestros Servicios
                    </h1>
                    <v-responsive class="primary mx-auto mb-6" style="max-width: 28px;">
                        <v-divider aria-orientation="horizontal" class=" theme--light" role="separator"/>
                    </v-responsive>
                </div>

                <v-row>
                    <v-col class="col col-12">
                        <div class="d-flex flex-column flex-sm-row justify-space-between align-sm-end flex-sm-wrap">
                            <div>
                                <h2>Explorar</h2>
                                <h6 class="grey--text grey--lighten-3 font-weight-regular trun">
                                    Listado de los principales servicios que ofrece CAFE producciones
                                </h6>
                            </div>
                            <div>
                                <v-text-field
                                    ref="search"
                                    v-model="search"
                                    class="mx-auto"
                                    full-width
                                    hide-details
                                    label="Search"
                                    single-line
                                ></v-text-field>

                            </div>
                        </div>
                    </v-col>
                </v-row>

                <v-row v-if="mdAndUp">
                    <v-col v-for="(item, index) in services" :key="item.id"
                           class="col-sm-6 col-md-4 col-lg-3 col-12">

                        <v-hover v-slot="{ hover }">
                            <v-card :aspect-ratio="1/1" class="br-10 " color="grey darken-2" light
                                    @click="$vuetify.goTo(`#${item.name}`,{duration: '900',offset: '0',easing: 'easeInOutCubic'})">
                                <v-img :aspect-ratio="1/1"
                                       :class="hover ? 'zoom' : ''"
                                       :gradient="item.gradient?'rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.65), rgb(0, 0, 0)':''"
                                       :src="item.firtImage"
                                       cover
                                       style="transition: all 0.5s;"
                                       @load="item.gradient=true">
                                    <div class="p-absolute bottom-0 pa-5">
                                        <h5 class="white--text">
                                            {{ item.title }}
                                        </h5>
                                        <div class="d-flex">
                                            <p class="text-sm white--text mb-0">{{ item.images.length }}
                                                Imagenes</p>
                                            <v-icon class="white--text"
                                                    size="16">
                                                mdi-chevron-right
                                            </v-icon>
                                        </div>
                                    </div>
                                    <template v-slot:placeholder>
                                        <v-skeleton-loader
                                            class="fill-height ma-0"
                                            type="image"
                                        ></v-skeleton-loader>
                                    </template>
                                </v-img>
                            </v-card>
                        </v-hover>
                    </v-col>
                </v-row>

                <v-list v-else link two-line>

                    <v-list-item v-for="(item, index) in services" :key="item.title"
                                 @click=" $vuetify.goTo(`#${item.name}`,{duration:'900',offset: '0',easing: 'easeInOutCubic'})">
                        <v-list-item-avatar>
                            <v-img :src="item.firtImage">
                                <template v-slot:placeholder>
                                    <v-row
                                        align="center"
                                        class="fill-height ma-0"
                                        justify="center"
                                    >
                                        <v-progress-circular
                                            color="primary"
                                            indeterminate
                                        ></v-progress-circular>
                                    </v-row>
                                </template>
                            </v-img>
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title v-html="item.title"></v-list-item-title>
                            <v-list-item-subtitle
                                v-html="`${item.images.length} imagenes`"></v-list-item-subtitle>
                        </v-list-item-content>

                        <v-list-item-action>
                            <v-icon class="white--text"
                                    size="16">
                                mdi-chevron-right
                            </v-icon>
                        </v-list-item-action>
                    </v-list-item>

                    <v-divider></v-divider>

                </v-list>

            </v-container>
        </v-sheet>

        <section class="grey lighten-4 py-6">
            <v-container>
                <h1 class="text-h5 font-weight-bold mb-2">
                    Detalle de servicios
                </h1>

                <div class="v-responsive base-divider primary  mb-6" style="max-width: 28px;">
                    <v-divider style="padding-bottom: 1px"></v-divider>
                </div>


                <div v-for="(item,n) in services" :id="item.name" :key="item.id" class="">
                    <v-card :color="$vuetify.breakpoint.smAndDown?'':'transparent'" class="my-2" outlined>
                        <div :class="{'flex-md-row-reverse':n%2===0}" class="d-flex flex-column flex-md-row">
                            <div class="w-full w-md-half d-flex align-center">
                                <div class="pa-6 pa-md-12">

                                    <h2 class="text-h5 text-lg-h4 font-weight-bold">{{ item.title }}</h2>
                                    <div class="text-h6  mt-4 text-justify">
                                        {{ item.description }}
                                    </div>
                                </div>
                            </div>
                            <v-sheet :aspect-ratio="1"
                                     :class="$vuetify.breakpoint.smAndDown?'':'elevation-6'"
                                     class="w-full w-md-half  rounded pa-5">
                                <lightbox :cells="3" :items="item.images"></lightbox>
                            </v-sheet>
                        </div>
                    </v-card>
                </div>
            </v-container>
        </section>
        <v-sheet light>
            <v-container class="container py-8">
                <div class="text-center">
                    <div>
                        <div class=" primary--text">¿Quieres hablar con nosotros?</div>
                        <div class=" mt-1">Nuestro equipo esta aqui para ayudar.</div>
                    </div>
                    <div class="mt-4">
                        <inertia-link href="/about-us">
                            <v-btn class="my-1 "
                                   elevated>
                                Saber más
                            </v-btn>
                        </inertia-link>
                        <inertia-link href="/contact-us">
                            <v-btn class="my-1 mx-sm-2  primary"
                                   elevated>
                                Contactanos
                            </v-btn>
                        </inertia-link>
                    </div>
                </div>
            </v-container>
        </v-sheet>

    </page-layout>
</template>

<style scoped>
.bg-gradient {
    background: linear-gradient(to bottom, #10578b, #2ba9e1);
}

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */
{
    opacity: 0;
}

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to {
    opacity: 0;
}

custom-transition-enter-active, .custom-transition-leave-active {
    transition: opacity 0.5s, transform 0.5s;
}

.custom-transition-enter, .custom-transition-leave-to {
    opacity: 0;
    transform: scale(0);
}

.custom-transition-enter-to, .custom-transition-leave {
    opacity: 1;
    transform: scale(1);
}


.custom-btn {
}

.custom-btn span {
    white-space: nowrap;
    transition: opacity 0.3s ease-in-out;
}

.custom-btn:hover span {
    opacity: 1;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}

.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>
