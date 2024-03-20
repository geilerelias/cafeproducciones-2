<script setup>
import PageLayout from "@/Layouts/PageLayout.vue";
import bg12 from '../../../images/bg/12.jpg'
import {computed, nextTick, onMounted, ref, watch} from 'vue';
import axios from 'axios';
import {useDisplay} from "vuetify";
import {Link} from "@inertiajs/vue3";
import VueEasyLightbox from 'vue-easy-lightbox';
import LoadingComponent from "@/Components/App/LoadingComponent.vue";

const {xsOnly, xs, md, mobile, mdAndDown, mdAndUp, lgAndUp, smAndUp, smAndDown} = useDisplay()

const loading = ref(false)
const search = ref('')
const selected = ref([])

const allSelected = computed(() => {
    return selected.value.length === allservices.value.length
})

function scrollTo(id) {
    const el = document.getElementById(id);
    if (el) {
        el.scrollIntoView({behavior: 'smooth', block: 'start'});
    }
}

watch(selected, () => {
    search.value = ''
})

const allservices = ref(
    [
        {
            name: 'transmision',
            title: "Transmisión de eventos en vivo o diferido",
            description: `Contamos con los equipos necesarios y de ultima tecnología para Transmitir un evento en vivo,
                esto permite llegar a un público con el que antes
                no contaba. Aquellos que por su situación geográfica no pueden asistir encontraran en su
                página Web, su Blog o su cuenta en redes sociales las imágenes y el audio en vivo, en
                tiempo real del evento. De esta manera cualquier persona conectada a la Internet, de
                cualquier parte del mundo, podrá acompañar las actividades de forma práctica, original y
                atrayente.`,
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'sonido',
            title: "Sonido para auditorios y exteriores",
            description: 'le ofrecemos sistemas de sonido de la más alta calidad para todo tipo de eventos, ' +
                'utilizamos equipos de última generación y contamos con la capacidad de satisfacer las necesidades ' +
                'de cualquier evento según la ocasión y el espacio.',
            images: [],
            firtImage: ''
        },
        {
            name: 'montaje',
            title: "Montaje de todo tipo de evento",
            description: 'Nuestro equipo cuenta con la última tecnología de fácil ensamblaje, lo cual nos permite' +
                ' optimizar los tiempos de montaje así como también los costos y es adaptable a casi cualquier tipo de superficie.'
            ,
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'pirotecnia',
            title: "Pirotecnia de escenarios y aéreas",
            description: 'un espectáculo de pirotecnia puede presentarse en diversos formatos en función de varios ' +
                'factores: celebración, lugar eb el que se llevará a cabo, duracción, presupuesto... Todos los ' +
                'momentos especiales de nuestros clientes pueden convertirse en extraordinarios con espectáculos ' +
                'de pirotecnia sin importar el tamaño del festejo o la cantidad de invitados.',
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'vallas',
            title: "Vallas de contención de publico",
            description: 'Se colocan en lugares públicos abiertos y/o cerrados  para delimitar espacios con motivo ' +
                'de eventos temporales, como espectaculos, desfiles o procesiones, son en tubo galvanizado de 1.40 de alto X 2 mts de ancho con base de 60 mm, calibre de 1 ¼ ',
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'personal',
            title: "Personal logístico",
            description: 'La logística de un evento incluye la gestión de los servicios de soporte técnico y la ' +
                'gestión competente del flujo de visitantes el día del evento (transporte, coordinación de acciones, ' +
                'etc.) Para hacer frente con éxito a múltiples tareas, debe comprender los diferentes componentes de' +
                ' un plan de logística para un evento y elaborar un plan de logística de eventos efectivo.',
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'moviliarios',
            title: "Carpas, Sillas, Mesas, Computadores impresoras",
            description: 'sabemos que cada cliente así como cada actividad es diferente, Por tal motivo le ofrecemos' +
                ' alternativas innovadoras en estructuras como toldos y carpas, pisos, trussesde aluminio, stands y más.',
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'filmacion',
            title: "Filmación en general - Entrevistas",
            description: 'Contamos  con una amplia trayectoria en el mundo de la producción audiovisual, abarcando todo' +
                ' tipo de trabajos, en función de las necesidades del cliente. Desde servicio de grabación hasta ' +
                'vídeo interactivo, pasando por todo un abanico de servicios con diferentes finalidades: promocionar ' +
                'la empresa, un perfil profesional, presentaciones de proyectos.',
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'refrigerios',
            title: "Refrigerios",
            description: 'Ofrecemos servicios de Brunch o Refrigerios de todo tipo para su empresa, pensado específicamente para cursos, seminarios o reuniones empresariales, con alimentos que deleitarán el paladar de sus empleados y/o clientes.',
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'pantallas',
            title: "Pantallas",
            description: `Ponemos a su disposición el Servicio de Alquiler de Pantallas para brindarle soluciones a
                medida para su evento corporativo, cartelería digital, acto institucional o evento empresarial.
                <br/>
                Nuestro servicio de Alquiler de Pantallas  incluye el traslado, armado y desarmado de las pantallas y, opcionalmente, la operación de las mismas.`,
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'iluminacion',
            title: "Iluminación",
            description: `La iluminación para eventos es uno de los elementos de decoración con más relevancia a la
                hora de organizarlos. Necesitas tener claro qué atmósfera quieres crear, ya que de la manera que
                ilumines tu evento dependerá el ambiente que se genere.`,
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'piso-led',
            title: "Piso led",
            description: `diseñamos y disponemos de pistas y pisos Led para incorporar a cada evento. Nuestra
                tecnología permite manejo de color led, inscripción de texto en pista.
                Los Pisos LED brindan luces y colores permitiendo crear la ambientación necesaria para tu evento.
                Es ideal para escenarios o pistas de baile en discos, eventos, salones y fiestas, o pisos de stands en
                exposiciones, o pasarelas en desfiles. Transmiten todo tipo de contenido y efectos luminosos.`,
            images: [],
            firtImage: '',
            gradient: false,
        },
        {
            name: 'escenografia',
            title: "Escenografías",
            description: `Nuestra vasta experiencia nos permite liderar todas las áreas necesarias para desarrollar
                un proyecto escenográfico integral e impactante.
                Con mas de 5 años de trayectoria diseño & comunicación desarrollando proyectos de escenografía de alto
                nivel con un equipo multidisciplinario con vasta experiencia que garantizan el mejor de los resultados.`,
            images: [],
            firtImage: '',
            gradient: false,
        },

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
    const _search = search.value.toLowerCase()
    if (!_search) return allservices.value
    return allservices.value.filter(service => {
        return service.name.toLowerCase().indexOf(_search) > -1 ||
            service.title.toLowerCase().indexOf(_search) > -1 ||
            service.description.toLowerCase().indexOf(_search) > -1
    });
});

onMounted(async () => {
    await nextTick(); // Espera a que Vue haya renderizado los cambios
    try {
        for (const service of allservices.value) {
            const {data} = await axios.get(`/find/services/${service.name}`);
            const images = data.map(filename => `/src/services/${service.name}/${filename}`);
            service.images = images;
            service.firtImage = images.length > 0 ? images[0] : '';
        }
    } catch (error) {
        console.error("error en onmounted => ", error);
    }
});

/*
onMounted(() => {
    let lista = [];
    for (let s = 0; s < allservices.length; s++) {
        let folder = allservices[s].name;
        console.log(folder)

        axios
            .get(`/find/services/${folder}`)
            .then(response => {
                lista = response.data;
                let images = [];
                let firtImage = ``;
                for (let i = 0; i < lista.length; i++) {
                    if (i == 0) {
                        firtImage = `/src/services/${folder}/${lista[i]}`;
                    }
                    images.push(`/src/services/${folder}/${lista[i]}`);
                    console.log(`/src/services/${folder}/${lista[i]}`)
                }
                allservices[s].images = images;
                allservices[s].firtImage = firtImage;
            })
            .catch(error => {
                console.log(error);
            });
    }


    /!*allservices.forEach(service => {
        const folder = service.name;
        axios.get(`/find/services/${folder}`)
            .then(response => {
                /!*const lista = response.data;
                const images = lista.map(image => `/src/services/${folder}/${image}`);
                const firstImage = images[0] || '';
                service.images = images;
                service.firtImage = firstImage;*!/
                const lista = response.data;
                let images = [];
                let firtImage = ``;
                for (let i = 0; i < lista.length; i++) {
                    if (i === 0) {
                        firtImage = `/src/services/${folder}/${lista[i]}`;
                    }
                    images.push(`/src/services/${folder}/${lista[i]}`);
                   // console.log(`/src/services/${folder}/${lista[i]}`)
                }
                allservices[s].images = images;
                allservices[s].firtImage = firtImage;
            })
            .catch(error => {
                console.error(error);
            });
    });*!/
});
*/

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


const visibleRef = ref(false);
const indexRef = ref(0);
const lightboxImages = ref([]);

const showImg = (index) => {
    indexRef.value = index;
    const service = allservices.value[index];
    lightboxImages.value = service.images.map(image => ({src: image}));
    visibleRef.value = true;
}

const onHide = () => visibleRef.value = false;

</script>

<template>
    <page-layout class="pt-12" title="Servicios">

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
                    <v-responsive class="bg-primary mx-auto mb-6" style="max-width: 28px;">
                        <v-divider aria-orientation="horizontal" class=" theme--light" role="separator"/>
                    </v-responsive>
                </div>

                <v-row>
                    <v-col class="col v-col-12">
                        <div class="d-flex flex-column flex-sm-row justify-space-between align-sm-end ">
                            <div>
                                <h2>Explorar</h2>
                                <h6 class="text-grey font-weight-regular text-truncate">
                                    Listado de los principales servicios que ofrece CAFE producciones
                                </h6>
                            </div>
                        </div>
                    </v-col>
                </v-row>

                <v-divider v-if="!allSelected"></v-divider>


                <v-row v-if="mdAndUp" class="mt-5">
                    <v-col v-for="(item, index) in services" :key="item.id" cols="12" lg="3" md="4" sm="6">

                        <v-hover v-slot="{ hover }">
                            <v-card :aspect-ratio="1/1" class="br-10 " color="grey darken-2" light
                                    @click="scrollTo(item.name)">
                                <v-img :aspect-ratio="1/1"
                                       :class="hover ? 'zoom' : ''"
                                       :gradient="item.gradient?'rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.65), rgb(0, 0, 0)':''"
                                       :src="item.firtImage"
                                       class="fill-height"
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
                                        <loading-component></loading-component>
                                    </template>
                                </v-img>
                            </v-card>
                        </v-hover>
                    </v-col>
                </v-row>

                <v-list v-else link two-line>

                    <v-list-item v-for="(item, index) in services" :key="item.title"
                                 @click="scrollTo(item.name)">
                        <template v-slot:prepend>
                            <v-avatar>
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
                            </v-avatar>
                        </template>

                        <v-list-item-title v-html="item.title"></v-list-item-title>
                        <v-list-item-subtitle
                            v-html="`${item.images.length} imagenes`"></v-list-item-subtitle>

                        <template v-slot:append>
                            <v-icon class="white--text"
                                    size="16">
                                mdi-chevron-right
                            </v-icon>
                        </template>
                    </v-list-item>

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
                    <v-card :color="smAndDown?'':'transparent'" class="my-2 fill-height" outlined>
                        <div :class="{'flex-md-row-reverse':n%2===0}" class="d-flex flex-column flex-md-row">
                            <div class="w-full w-md-half d-flex align-center">
                                <div class="pa-6 pa-md-12">

                                    <h2 class="text-h5 text-lg-h4 font-weight-bold">{{ item.title }}</h2>
                                    <div class="text-h6  mt-4 text-justify">
                                        {{ item.description }}
                                    </div>
                                </div>
                            </div>
                            <v-card :aspect-ratio="1" :class="smAndDown?'':'elevation-6'"
                                    class="w-full w-md-half  rounded pa-5"
                                    height="500"
                                    @click="showImg(n)">

                                <v-img :src="item.firtImage" class="fill-height" cover></v-img>

                            </v-card>
                            <vue-easy-lightbox :imgs="lightboxImages" :index="indexRef" :visible="visibleRef"
                                               @hide="onHide"></vue-easy-lightbox>
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
                        <Link href="/about-us">
                            <v-btn class="my-1 bg-primary" elevated flat
                                   rounded>
                                Saber más
                            </v-btn>
                        </Link>
                        <Link href="/contact-us">
                            <v-btn class="my-1 mx-sm-2 " color="" elevated rounded
                                   variant="outlined">
                                Contactanos
                            </v-btn>
                        </Link>
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
                                        {{ item.title }}
                                    </h2>
                                    <div>
                                        {{ item.description }}
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

.v-img__placeholder .v-skeleton-loader .v-skeleton-loader__image {
    height: 100% !important;
}

div.v-img__placeholder.fade-transition-leave-from.fade-transition-leave-active > div > div {
    height: 100% !important;
}

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

@media (min-width: 960px) {
    .v-application .w-md-half {
        width: 50% !important;
    }
}

.w-full {
    width: 100% !important;
}

/*.v-card {*/
/*    transition: opacity .4s ease-in-out;*/
/*}*/

/*.v-card:not(.on-hover) {*/
/*    opacity: 0.6;*/
/*}*/

/*.show-btns {*/
/*    color: rgba(255, 255, 255, 1) !important;*/
/*}*/

.bottom-0 {
    bottom: 0 !important;
}

.p-absolute {
    position: absolute !important;
}

.bottom-gradient {
    /*background-image: linear-gradient(to top, rgba(0, 0, 0, 0.4) 70%, transparent 30%);*/

    /*background-image: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(0,0,0,1) 50%, transparent 100%);*/
}

/*zoom en imagenes*/
.v-image .v-image__image {
    transition: all 0.6s;
}

.v-image.zoom .v-image__image {
    transform: scale(1.2);
}

div.v-image__placeholder > div > div {
    height: 100% !important;
}

</style>

