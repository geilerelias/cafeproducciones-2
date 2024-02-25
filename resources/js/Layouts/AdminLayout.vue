<script setup>
import {onMounted} from "vue";
import AdminDrawer from "../Base/AdminDrawer.vue";
import AdminHeader from "../Base/AdminHeader.vue";
import AdminFooter from "../Base/AdminFooter.vue";
import {Head} from "@inertiajs/vue3";
import AOS from "aos";


defineProps({
    title: String,
});

onMounted(() => {
    AOS.init();
})
</script>

<template>
    <v-app>
        <Head :title="title"/>
        <v-layout ref="appRef">
            <admin-header name="app-bar"></admin-header>

            <admin-drawer></admin-drawer>
            <v-main style="min-height: 300px;">
                <slot></slot>
            </v-main>

            <admin-footer></admin-footer>
        </v-layout>
    </v-app>
</template>


<style>
.ps {
    height: calc(100vh - 64px);
}
</style>

