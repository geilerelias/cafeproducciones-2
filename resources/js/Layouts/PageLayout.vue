<script setup>
import {Head} from "@inertiajs/vue3";
import PageHeader from "@/Base/PageHeader.vue";
import PageFooter from "@/Base/PageFooter.vue";

import PageDrawer from "@/Base/PageDrawer.vue";
import {onBeforeUnmount, onMounted, ref} from "vue";
import AOS from "aos";


function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}

defineProps({
    title: String,
});

onMounted(() => {
    AOS.init();
})


const mostrarBoton = ref(false);

// Función para manejar el evento de scroll
const handleScroll = () => {
    mostrarBoton.value = window.scrollY > 100; // Ajusta el valor según tu preferencia
};

// Agrega el evento de scroll cuando el componente está montado
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

// Elimina el evento de scroll cuando el componente se va a desmontar
onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll);
});

</script>

<template>
    <v-app>
        <Head :title="title"/>
        <page-drawer>
        </page-drawer>
        <page-header>
        </page-header>
        <v-main>
            <slot></slot>
            <div class="position-fixed right-0 bottom-0 mb-10 mr-5" style="z-index: 200 !important; ">
                <v-btn v-if="mostrarBoton"

                       class="bg-primary rounded-circle "
                       fab
                       icon="mdi-chevron-up"
                       scroll-to="'#scrolltop'"
                       style="z-index: 200 !important; "
                       variant="elevated"
                       @click="scrollToTop">

                </v-btn>
            </div>
        </v-main>
        <page-footer></page-footer>
    </v-app>
</template>

<style>
.text-nova-round-regular {
    font-family: "Nova Round", system-ui;
    font-weight: 400;
    font-style: normal;
}
</style>
