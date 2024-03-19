<script setup>
import {nextTick, onMounted, ref} from 'vue';
import VueEasyLightbox from 'vue-easy-lightbox';
import PageLayout from "@/Layouts/PageLayout.vue";
import axios from "axios";
import LoadingComponent from "@/Components/App/LoadingComponent.vue";

const visibleRef = ref(false);
const indexRef = ref(0);
const lightboxImages = ref([]);

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


const showImg = (index) => {
    indexRef.value = index;
    const service = allservices.value[index];
    lightboxImages.value = service.images.map(image => ({src: image}));
    visibleRef.value = true;
}

const onHide = () => visibleRef.value = false;
</script>

<template>
    <page-layout title="Galería">
        <v-sheet>
            <v-container class="py-6">
                <div class="text-center mb-6">
                    <div class="d-inline-flex mb-4">
                        <v-avatar class="primary"
                                  size="56">
                            <v-icon dark
                                    size="28">
                                mdi-movie-play-outline
                            </v-icon>
                        </v-avatar>
                    </div>
                    <h1 class="text-uppercase text-h5 font-weight-bold mb-2 text-center">
                        Galería de imágenes
                    </h1>
                    <v-responsive class="bg-primary mx-auto mb-6" style="max-width: 28px;">
                        <v-divider aria-orientation="horizontal" class=" theme--light" role="separator"/>
                    </v-responsive>
                </div>
                <p>
                    Explora nuestra galería de imágenes y sumérgete en los momentos capturados de nuestros eventos.
                    Desde bodas y cumpleaños hasta eventos corporativos, cada imagen cuenta una historia única. ¡Déjate
                    inspirar y descubre cómo Café Producciones crea momentos inolvidables!
                </p>

            </v-container>
        </v-sheet>
        <div class="mt-12">
            <v-container>
                <v-row>
                    <v-col v-for="(service, index) in allservices" :key="index"
                           class="d-flex child-flex pic" cols="12" @click="showImg(index)">
                        <v-row>
                            <v-col v-for="(img, index) in service.images">

                                <v-hover v-slot="{ isHovering, props }">
                                    <v-img
                                        :src="img"
                                        aspect-ratio="1"
                                        class="bg-grey-lighten-2 rounded-lg"
                                        cover
                                        v-bind="props"
                                    >
                                        <template v-slot:placeholder>
                                            <loading-component></loading-component>
                                        </template>
                                        <v-expand-transition>
                                            <div
                                                v-if="isHovering"
                                                class="d-flex transition-fast-in-fast-out bg-primary v-card--reveal text-h6 text-uppercase"
                                                style="height: 100%;"
                                            >
                                                {{ service.name }}
                                            </div>
                                        </v-expand-transition>
                                    </v-img>
                                </v-hover>
                            </v-col>
                        </v-row>

                    </v-col>
                </v-row>
            </v-container>
            <vue-easy-lightbox :imgs="lightboxImages" :index="indexRef" :visible="visibleRef"
                               @hide="onHide"></vue-easy-lightbox>


        </div>
    </page-layout>
</template>


<style>
.v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: .9;
    position: absolute;
    width: 100%;
}

.pic {
    cursor: pointer;
}
</style>
