<script setup>
import {computed, ref} from "vue";
import {useDisplay, useTheme} from 'vuetify';

import {useAdminDrawerStore} from '../../stores/adminDrawer';
import {useAuthLinksStore} from "../../stores/authLinks";
import Logo from "@/Components/Logo.vue";
import name from '../../images/logo/name.png'
import SettingsDropdown from "@/Components/SettingsDropdown.vue";

const adminDrawerStore = useAdminDrawerStore();
const authLinksStore = useAuthLinksStore();


const links = authLinksStore.authLinks

const listNewNotification = [
    {type: 'subheader', title: 'Today'},
    {
        prependAvatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
        title: 'Brunch this weekend?',
        subtitle: `<span class="text-primary">Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?`,
    },
    {type: 'divider', inset: true},
    {
        prependAvatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
        title: 'Summer BBQ',
        subtitle: `<span class="text-primary">to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.`,
    },
    {type: 'divider', inset: true},
    {
        prependAvatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
        title: 'Oui oui',
        subtitle: '<span class="text-primary">Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?',
    },
    {type: 'divider', inset: true},
    {
        prependAvatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
        title: 'Birthday gift',
        subtitle: '<span class="text-primary">Trevor Hansen</span> &mdash; Have any ideas about what we should get Heidi for her birthday?',
    },
    {type: 'divider', inset: true},
    {
        prependAvatar: 'https://cdn.vuetifyjs.com/images/lists/5.jpg',
        title: 'Recipe to try',
        subtitle: '<span class="text-primary">Britta Holt</span> &mdash; We should eat this: Grate, Squash, Corn, and tomatillo Tacos.',
    },
];

const toggleDrawer = () => {
    adminDrawerStore.toggleDrawer();
};

const rail = computed(() => adminDrawerStore.rail)
const menuNotification = ref(null)

function changeRail() {
    adminDrawerStore.changeDrawerRail();
}

const {mdAndUp} = useDisplay()
const layoutStyle = computed(() => {
    console.error('este es un mensaje: ', mdAndUp && rail)
    if (mdAndUp && rail) {
        return 'width: 260px !important';
    } else {
        return 'width: 0px !important';
    }
});
let loading = ref(false)


function getRoute(name) {
    // this.$inertia.route(this.$route(name)).url()
    return name;
}

function onClick() {
    loading = true
    alert("llega")
    setTimeout(() => {
        loading = false
        let loaded;
        loaded = true

    }, 2000)

}

const theme = useTheme()

function toggleTheme() {
    theme.global.name.value = theme.global.current.value.dark ? 'light' : 'dark'
}


</script>

<template>
    <v-app-bar class="bg-primary position-fixed">
        <template v-slot:prepend>
            <div :style="{ width: !mdAndUp || rail ?'': '260px !important' }" class="d-flex  align-center">
                <logo :size="50"
                      data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000"></logo>
                <p v-if="!rail" class="ml-1 text-h6 font-weight-bold">
                    <img :src="name" alt="logo name" class="h-14 mt-4" data-aos="fade-down"
                         data-aos-delay="200" data-aos-duration="1000"
                         style="object-fit: contain;width: 80%;"/>
                </p>
            </div>

        </template>

        <v-app-bar-nav-icon v-if="!mdAndUp" @click="toggleDrawer"></v-app-bar-nav-icon>
        <v-app-bar-nav-icon v-if="mdAndUp" @click="changeRail"></v-app-bar-nav-icon>
        <v-menu :close-on-content-click="false"
                location="end"
                offset-y>
            <template v-slot:activator="{ props }">
                <v-btn icon="mdi-magnify" v-bind="props"></v-btn>
            </template>

            <v-sheet class="elevation-10 rounded-md" style="width: 360px;">
                <div class="d-flex align-center justify-space-between px-5 pt-5">
                    <v-text-field
                        :loading="loading"
                        append-inner-icon="mdi-magnify"
                        color="primary"
                        density="compact"
                        hide-details
                        label="Search templates"
                        single-line
                        variant="outlined"
                        @click:append-inner="onClick"
                    ></v-text-field>
                </div>

                <div class="ps ps--active-y" style="height: 380px;">
                    <v-list
                        :lines="false"
                        density="compact"
                        lines="two"
                    >
                        <v-list-subheader>Enlaces de página rápida</v-list-subheader>
                        <v-list-item
                            v-for="(item, i) in links"
                            :key="i"
                            :prepend-icon="item.icon"
                            :subtitle="getRoute(item.route)"
                            :title="item.title"
                            :value="item"
                            color="primary"
                        >
                        </v-list-item>
                    </v-list>
                </div>
            </v-sheet>
        </v-menu>
        <v-spacer></v-spacer>

        <v-btn icon @click="toggleTheme">
            <v-icon :icon="$vuetify.theme.name === 'dark' ? 'mdi-weather-sunny' : 'mdi-weather-night'"></v-icon>
        </v-btn>

        <v-menu
            v-model="menuNotification"
            :close-on-content-click="false"
            location="end"
        >
            <template v-slot:activator="{ props }">
                <v-btn class="text-none mr-2" icon v-bind="props">
                    <v-badge color="error" content="2">
                        <v-icon>mdi-bell-outline</v-icon>
                    </v-badge>
                </v-btn>
            </template>

            <v-card max-width="450" min-width="300">
                <v-toolbar>
                    <v-btn icon="mdi-menu" variant="text"></v-btn>

                    <v-toolbar-title>Notifications</v-toolbar-title>

                    <v-spacer></v-spacer>

                    <v-btn icon="mdi-magnify" variant="text"></v-btn>
                </v-toolbar>

                <v-list
                    :items="listNewNotification"
                    item-props
                    lines="three"
                >
                    <template v-slot:subtitle="{ subtitle }">
                        <div v-html="subtitle"></div>
                    </template>
                </v-list>
            </v-card>
        </v-menu>


        <template v-slot:append>
            <settings-dropdown></settings-dropdown>
        </template>
    </v-app-bar>
</template>

