<template>
    <!-- Settings Dropdown -->

    <div v-if="$page.props.auth!==null" class="text-center hidden-xs-only">
        <v-menu
            :close-on-content-click="false"
            location="end"
            offset-y
        >
            <template v-slot:activator="{ props }">
                <v-btn v-if="$page.props.jetstream.managesProfilePhotos"
                       dark
                       icon size="large"
                       v-bind="props"
                       variant="tonal"
                >
                    <v-avatar size="50">
                        <v-img :alt="$page.props.auth.user.name" :src="$page.props.auth.user.profile_photo_url"
                               contain
                        >
                        </v-img>
                    </v-avatar>
                </v-btn>
            </template>

            <v-card class="pa-5">
                <div class="px-8 pt-6">
                    <h6 class="text-h6 font-weight-medium">Perfil del usuario</h6>
                    <div class="d-flex align-center mt-4 pb-6">
                        <v-avatar color="primary" size="80">
                            <v-avatar size="76">
                                <v-img :alt="$page.props.auth.user.name"
                                       :src="$page.props.auth.user.profile_photo_url"
                                       contain
                                >
                                </v-img>
                            </v-avatar>
                        </v-avatar>
                        <div class="ml-3">
                            <h6 class="text-h6 mb-n1">{{ $page.props.auth.user.name }}</h6>
                            <div class="d-flex align-center mt-1">
                                <v-icon size="18">mdi-email-outline</v-icon>
                                <span class="text-subtitle-1 font-weight-regular textSecondary ml-2">
                                       {{ $page.props.auth.user.email }}
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <v-divider></v-divider>

                <!-- Responsive Settings Options -->
                <v-list v-if="$page.props.auth!==null" dense rounded>
                    <v-list-subheader>Administración</v-list-subheader>

                    <v-list-item
                        :active="route().current('dashboard')"
                        :class="route().current('dashboard')?'active bg-primary':''"
                        :dark="route().current('dashboard')"
                        class="text-decoration-none mr-1"
                        prepend-icon="mdi-view-dashboard-outline"
                        rounded="lg"
                        title="Dashboard"
                        @click="navigateTo(route('dashboard'))"
                    >
                    </v-list-item>
                </v-list>

                <v-list v-if="$page.props.auth!==null" dense rounded>
                    <v-list-subheader>Settings Options</v-list-subheader>


                    <v-list-item
                        :active="route().current('profile.show')"
                        :class="route().current('profile.show')?'active bg-primary':''"
                        :dark="route().current('profile.show')"
                        class="text-decoration-none mr-1"
                        rounded="lg"
                        @click="navigateTo(route('profile.show'))">
                        <template v-slot:prepend>
                            <v-icon>mdi-account-circle</v-icon>
                        </template>
                        <template v-slot:subtitle="{ subtitle }">
                            <v-list-item-title> Profile</v-list-item-title>
                        </template>
                    </v-list-item>
                    <v-list-item
                        v-if="$page.props.jetstream.hasApiFeatures" :active="route().current('api-tokens.index')"
                        :class="route().current('api-tokens.index')?'active bg-primary':''"
                        :dark="route().current('api-tokens.index')"
                        class="text-decoration-none mr-1"
                        rounded="lg"
                        @click="navigateTo(route('api-tokens.index'))"
                    >
                        <template v-slot:prepend>
                            <v-icon>mdi-lan</v-icon>
                        </template>
                        <template v-slot:subtitle="{ subtitle }">
                            <v-list-item-title> API Tokens</v-list-item-title>
                        </template>
                    </v-list-item>


                </v-list>

                <v-list-subheader>Authentication</v-list-subheader>
                <v-list dense rounded>
                    <v-list-item @click="logout">
                        <template v-slot:prepend>
                            <v-icon>mdi-logout</v-icon>
                        </template>
                        <template v-slot:subtitle="{ subtitle }">
                            <v-list-item-title>Logout</v-list-item-title>
                        </template>
                    </v-list-item>
                </v-list>
            </v-card>
        </v-menu>
    </div>

    <!--Usuario no autenticado-->
    <div v-if="$page.props.auth==null" class="text-center">
        <v-menu
            :close-on-content-click="false"
            :nudge-width="200"
            offset-y
        >
            <template v-slot:activator="{ props }">
                <v-btn class="ml-2 hidden-xs-only white--text"
                       icon
                       v-bind="props"
                >
                    <v-icon>
                        mdi-dots-vertical
                    </v-icon>
                </v-btn>
            </template>

            <v-card>
                <v-list>
                    <template v-if="$page.props.auth===null">
                        <v-list-subheader>Autenticación</v-list-subheader>
                        <v-divider></v-divider>
                        <v-list-item
                            v-for="item in items"
                            :key="item.title"
                            :href="item.route"
                        >
                            <template v-slot:prepend>
                                <v-icon>{{ item.icon }}</v-icon>
                            </template>

                            <template v-slot:subtitle="{ subtitle }">
                                <v-list-item-title>{{ item.title }}</v-list-item-title>
                            </template>
                        </v-list-item>

                    </template>
                </v-list>
            </v-card>
        </v-menu>
    </div>

</template>

<script setup>

import {router} from "@inertiajs/vue3";
import {ref} from "vue";


const menu = ref(false)

const items = [
    {title: 'Login', icon: 'mdi-account-lock', route: '/login'},
    {title: 'Sign Up', icon: 'mdi-account-plus', route: '/register'}
]

function navigateTo(route) {
    router.get(route);
}

const logout = () => {
    router.post(route('logout'));
};

</script>

<style scoped>

</style>
