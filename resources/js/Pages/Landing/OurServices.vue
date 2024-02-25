<script setup>
import PageLayout from "@/Layouts/PageLayout.vue";
import bg12 from '../../../images/bg/12.jpg'
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

const procesos = [
    {
        "title": "Investigación y Planificación",
        "description": "Comprender las necesidades y objetivos del cliente, investigar el mercado y la competencia, y planificar estrategias para el evento.",
        "icon": "mdi-calendar-check",
        "color": "amber"
    },
    {
        "title": "Diseño y Conceptualización",
        "description": "Desarrollar conceptos creativos y diseñar el evento, incluyendo la identidad visual, la temática, la decoración y la experiencia general.",
        "icon": "mdi-palette",
        "color": "green"
    },
    {
        "title": "Logística y Producción",
        "description": "Gestionar todos los aspectos logísticos del evento, como la selección de proveedores, la gestión de presupuestos, la coordinación de equipos y la logística de transporte.",
        "icon": "mdi-cogs",
        "color": "red"
    },
    {
        "title": "Marketing y Promoción",
        "description": "Crear estrategias de marketing para promocionar el evento, incluyendo la publicidad, las redes sociales, las relaciones públicas y la venta de entradas.",
        "icon": "mdi-bullhorn",
        "color": "blue"
    },
    {
        "title": "Ejecución y Coordinación",
        "description": "Supervisar la ejecución del evento, coordinar a todos los equipos involucrados y garantizar que todo se desarrolle según lo planeado.",
        "icon": "mdi-truck-delivery",
        "color": "purple"
    },
    {
        "title": "Evaluación y Mejora",
        "description": "Evaluar el éxito del evento, recopilar comentarios de los asistentes y el cliente, y utilizar esta información para mejorar futuros eventos.",
        "icon": "mdi-chart-line",
        "color": "teal"
    }
];


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


        <div class="profile bg-accent py-md-12 py-5">
            <div class="py-md-10 py-sm-5">
                <v-container class="">
                    <v-row class="justify-space-between">
                        <v-col class="v-col-md-6 v-col-12">
                            <div class="position-relative">
                                <img :src="bg12"
                                     alt="banner de perfil" class="w-100 rounded-md"/>
                            </div>
                        </v-col>
                        <v-col class="v-col-md-5 v-col-12">
                            <div>
                                <h2 class="text-h5 text-dark mb-sm-5 mb-3">
                                    Iniciar un
                                    nuevo
                                    proyecto
                                </h2>

                                <p class="text-muted text-body-1">
                                    En <span class="text-nova-round-regular">CAfE Producciones</span>,
                                    nos emociona cada
                                    nuevo proyecto como una
                                    oportunidad para
                                    hacer realidad la visión de nuestros clientes. Trabajamos de cerca con ellos, desde
                                    la conceptualización hasta la ejecución final, para transformar ideas en
                                    experiencias memorables. Nuestro equipo creativo y logístico se compromete a superar
                                    expectativas, ofreciendo soluciones innovadoras y resultados excepcionales en cada
                                    evento. Nos apasiona crear momentos únicos e impactantes que perduren en la memoria
                                    de quienes participan.
                                </p>
                                <div class="mt-sm-10 mt-5 border-top pt-3">
                                    <div class="d-flex align-center mb-2">
                                        <a class="text-decoration-none" href="tel:+573004361660" target="_blank">
                                            <v-icon color="white">mdi-phone</v-icon>
                                        </a> &nbsp;
                                        <a href='https://wa.me/573004361660' target="_blank">
                                            <v-icon color="white">mdi-whatsapp</v-icon>
                                        </a> &nbsp;
                                        <a href="tel:+573003551477">
                                            <h5 class="font-weight-medium text-h5 text-white">
                                                +57 300 436 1660</h5>
                                        </a>
                                    </div>
                                    <div class="d-flex  align-center">
                                        <a class="text-decoration-none" href="mailto:contacto@cafeproducciones.com"
                                           target="_blank">
                                            <v-icon color="white">mdi-email</v-icon>
                                        </a>

                                        <a class="font-weight-medium text-h5 text-white ml-2"
                                           href="mailto:contacto@cafeproducciones.com">
                                            contacto@cafeproducciones.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
        </div>
        <div class="border-bottom">
            <div class="py-md-12 py-5">
                <div class="py-md-10 py-sm-5">
                    <v-container class="">
                        <div class="d-flex flex-column justify-center mb-6">
                            <h2
                                :data-aos="mobile?'fade-up':'fade-right'"
                                class="text-h2 text-center text-dark mb-4 aos-init aos-animate"
                                data-aos-delay="200" data-aos-duration="1000">
                                Proceso de trabajo
                            </h2>
                            <p :data-aos="mobile?'fade-up':'fade-left'"
                               class="text-body-1 text-center text-muted aos-init aos-animate"
                               data-aos-delay="200" data-aos-duration="1000">
                                Te ofrecemos una nueva generación de tareas.
                                y proyecto
                            </p>
                        </div>

                        <v-timeline align="start" fill-dot>
                            <v-timeline-item
                                v-for="(item, i) in procesos"
                                :key="i"
                                :dot-color="item.color"
                                :icon="item.icon"
                                size="x-large"
                            >
                                <template v-slot:icon>
                                    <v-avatar
                                        :color="item.color"
                                        size="30" variant="flat">
                                        <v-icon :icon="item.icon">
                                        </v-icon>
                                    </v-avatar>
                                </template>

                                <template v-slot:opposite>
                                    <div
                                        :class="`pt-1 text-h5 font-weight-bold text-${item.color}`"
                                        v-text="'0'+(1+i)"
                                    ></div>
                                </template>
                                <div>
                                    <h2 :class="`mt-n1 text-h6 font-weight-light mb-4 text-${item.color}`">
                                        {{item.title}}
                                    </h2>
                                    <div>
                                        {{item.description}}
                                    </div>
                                </div>
                            </v-timeline-item>
                        </v-timeline>
                    </v-container>
                </div>
            </div>
        </div>
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
