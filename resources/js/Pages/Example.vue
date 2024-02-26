<template>
    <PageLayout>
        <div class="mt-12">
            <v-card v-for="(service, index) in allservices" :key="index" class="pic" @click="showImg(index)">
                {{ service.name }}
                <img :src="service.firtImage || service.images[0]"/>
            </v-card>
            <vue-easy-lightbox :imgs="lightboxImages" :index="indexRef" :visible="visibleRef"
                               @hide="onHide"></vue-easy-lightbox>
        </div>
    </PageLayout>
</template>

<script setup>
import {ref} from 'vue';
import VueEasyLightbox from 'vue-easy-lightbox';
import PageLayout from "@/Layouts/PageLayout.vue";

const visibleRef = ref(false);
const indexRef = ref(0);
const lightboxImages = ref([]);
const allservices = [
    {
        name: 'transmision',
        title: "Transmisión de eventos en vivo o diferido",
        description: `Contamos con los equipos necesarios y de última tecnología para Transmitir un evento en vivo,
            esto permite llegar a un público con el que antes
            no contaba. Aquellos que por su situación geográfica no pueden asistir encontrarán en su
            página Web, su Blog o su cuenta en redes sociales las imágenes y el audio en vivo, en
            tiempo real del evento. De esta manera cualquier persona conectada a la Internet, de
            cualquier parte del mundo, podrá acompañar las actividades de forma práctica, original y
            atrayente.`,
        images: [
            'https://via.placeholder.com/450.png/',
            'https://via.placeholder.com/300.png/',
            'https://via.placeholder.com/150.png/'
        ],
        firtImage: ''
    },
    // Otros servicios
];

const showImg = (index) => {
    indexRef.value = index;
    const service = allservices[index];
    lightboxImages.value = service.images.map(image => ({src: image}));
    visibleRef.value = true;
}

const onHide = () => visibleRef.value = false;
</script>

<style>
.pic {
    cursor: pointer;
}
</style>
