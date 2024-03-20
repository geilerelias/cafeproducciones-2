<script setup>
import {useDrawerStore} from "../../stores/drawer";
import {useLinksStore} from "../../stores/links";
import {useDisplay, useTheme} from 'vuetify'
import Logo from "./../Components/App/Logo.vue";
import logo from "./../../images/logo/logo.png";
import {Link} from '@inertiajs/vue3'
import {computed, onMounted, onUnmounted, ref} from "vue";
/*import SettingsDropdown from "../Components/SettingsDropdown.vue";*/

const drawerStore = useDrawerStore();
const linksStore = useLinksStore();

const fab = false;
const localApp = false;
const item = 1;
const authenticated = null;
const user = null;
const items = [
    {title: 'Login', icon: 'mdi-account-lock', route: "/login"},
    {title: 'Sign Up', icon: 'mdi-account-plus', route: "/register"},
]

const theme = useTheme()

function toggleTheme() {
    theme.global.name.value = theme.global.current.value.dark ? 'light' : 'dark'
}

const isDarkTheme = computed(() => {
    return theme.global.current.value.dark
});

defineProps({
    clippedLeft: {
        default: () => {
            return true
        }
    },
    showItems: {
        default: () => {
            return true
        }
    }
});

const menu = ref(false)


const {xsOnly, xs, md, mdAndDown, mdAndUp, lgAndUp, smAndUp, smAndDown} = useDisplay()

const isHomePage = computed(() => route().current('home'));

const isTransparent = ref(true);

// Función para manejar el evento de scroll
const handleScroll = () => {
    isTransparent.value = window.scrollY < 320;
};
const isCurrentRoute = ((item) => {
    return route().current(item)
})

// Registra el evento de scroll al montar el componente
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

// Elimina el evento de scroll al desmontar el componente para evitar pérdidas de memoria
onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

const changeDrawer = (value) => {
    drawerStore.change(!value)
}

const back = () => {
    window.history.back();
}


const showText = ref({});

const navClasses = computed(() => {
    /* { 'bg-transparent white--text': isTransparent && isHomePage,
         'bg-white': !isTransparent || !isHomePage }*/

    return {
        'bg-transparent white--text': isTransparent.value && isHomePage.value,
    };

});
</script>
<template>
    <v-app-bar
        :class="navClasses"
        class="px-sm-12 px-auto py-4"
        density="compact"
        scroll-behavior="elevate">
        <template v-slot:prepend>
            <transition mode="out-in" name="custom-transition">
                <div v-if="!(isTransparent && isHomePage)" key="logo-section" class="d-flex align-center"
                     style="max-width: 200px">
                    <logo :color="'primary'" :size="45"></logo>
                    <div
                        class=" ml-2 text-decoration-none font-weight-bold text-sm-title-1 text-md-h5 text-md-h6 text-nova-round-regular">
                        CAFE PRODUCCIONES
                    </div>
                </div>
            </transition>
        </template>


        <v-spacer v-if="!(isTransparent && isHomePage)"></v-spacer>

        <Link
            v-for="(item, index) in linksStore.links"
            :key="item.id"
            :href="route(item.route)"
            class="text-decoration-none d-md-flex d-none  py-0  menu text-capitalize justify-center"

        >
            <div>
                <v-btn
                    :class="{
                        'active text-secondary font-weight-black': !isDarkTheme &&isCurrentRoute(item.route) &&!(isTransparent && isHomePage) ,
                        'active text-white font-weight-black': (isTransparent && isHomePage) && isCurrentRoute(item.route)||isDarkTheme,
                        'text-black': !isCurrentRoute(item.route) && (!isTransparent || !isHomePage),
                        'text-white': isTransparent && isHomePage ||isDarkTheme
                      }"
                    :variant="isCurrentRoute(item.route)?'outlined':'text'"
                    class="overline font-weight-bold custom-btn"
                    rounded
                    @mouseleave="showText[index] = false"
                    @mouseover="showText[index] = true"
                >

                    <div v-if="(!showText[index] && md && !isCurrentRoute(item.route))  ">
                        <v-icon :icon="item.icon"></v-icon>
                    </div>
                    <div v-else class="d-flex align-center justify-space-between">
                        <v-icon :icon="item.icon" class="mr-1"></v-icon>
                        {{ item.title }}
                    </div>
                    <v-tooltip v-if="(showText[index] && md)" activator="parent" location="bottom">
                        {{ item.title }}
                    </v-tooltip>

                </v-btn>
            </div>
        </Link>

        <v-btn :class="{
                        'text-white font-weight-black': (isTransparent && isHomePage) && isCurrentRoute(item.route),
                        'text-black': !isCurrentRoute(item.route) && (!isTransparent || !isHomePage),
                        'text-white': isTransparent && isHomePage
                      }"
               icon @click="toggleTheme">
            <v-icon
                :icon="theme.global.current.value.dark  !== false ? 'mdi-weather-sunny' : 'mdi-weather-night'"></v-icon>
        </v-btn>

        <div v-if="$page.props.auth.user===null" class="text-center">
            <v-menu
                v-model="menu"
                :close-on-content-click="false"
                :nudge-width="200"
                location="end"
                offset-y
            >
                <template v-slot:activator="{ props }">
                    <v-btn :class="{
                                    'text-white font-weight-black': (isTransparent && isHomePage) && isCurrentRoute(item.route),
                                    'text-black': !isCurrentRoute(item.route) && (!isTransparent || !isHomePage),
                                    'text-white': isTransparent && isHomePage
                                  }"
                           class="ml-2 hidden-sm-and-down"
                           icon=""
                           v-bind="props"
                    >
                        <v-icon icon="mdi-dots-vertical"></v-icon>
                    </v-btn>
                </template>
                <v-card min-width="300">
                    <v-list>
                        <v-list-item>
                            <template v-slot:prepend>
                                <logo></logo>
                            </template>

                            <v-list-item-title class="text-nova-round-regular">
                                CAFE PRODUCCIONES
                            </v-list-item-title>

                            <v-list-item-subtitle>
                                Para todo tipo de eventos
                            </v-list-item-subtitle>
                        </v-list-item>
                    </v-list>

                    <v-divider></v-divider>

                    <v-list>
                        <v-list-subheader>Authentication</v-list-subheader>
                        <v-list-item
                            v-for="item in items"
                            :key="item.title"
                            :href="item.route"
                        >
                            <template v-slot:prepend>
                                <v-icon :icon="item.icon"></v-icon>
                            </template>
                            <v-list-item-title>{{ item.title }}</v-list-item-title>
                        </v-list-item>
                    </v-list>

                    <v-card-actions>
                        <v-spacer></v-spacer>

                        <v-btn
                            color="red"
                            variant="text"
                            @click="menu = false"
                        >
                            Cancel
                        </v-btn>
                    </v-card-actions>
                </v-card>

            </v-menu>
        </div>

        <v-btn
            :class="{ 'text-white bg-primary': isTransparent && isHomePage}"
            class="d-md-none d-flex "
            icon tile
            @click="changeDrawer(drawerStore.drawer)"
        >
            <v-icon dark icon="mdi-menu" size="30"></v-icon>
        </v-btn>
    </v-app-bar>

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

.custom-transition-enter-active, .custom-transition-leave-active {
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

.bgTranparente {
    background-color: transparent !important;
}

.expand-x-transition-enter-active, .fade-enter-active, .fade-leave-active {
    transition: opacity .5s
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
    opacity: 0
}

.text-monserrat {
    font-family: 'Montserrat', sans-serif;
}

.nova-mono-regular {
    font-family: "Nova Mono", monospace;
    font-weight: 400;
    font-style: normal;
}

.text-nova-round-regular {
    font-family: "Nova Round", system-ui;
    font-weight: 400;
    font-style: normal;
}


</style>
