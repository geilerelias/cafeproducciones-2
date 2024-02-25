<script setup>
import logo from '../../../images/logo/logo.png';
import logoTransparent from '../../../images/logo/logo.png';
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    color: {
        default: "white",
        type: String
    },
    circle: {
        default: true,
        type: Boolean
    },
    transparent: {
        default: false,
        type: Boolean
    },
    size: {
        default: 55,
        type: Number
    }
});
</script>

<template>
    <Link class="d-flex align-center text-decoration-none  router-link-exact-active router-link-active"
          href="/">
        <v-avatar :color="color" :size="size+2">
            <v-avatar :size="size">
                <v-img :src="transparent?logoTransparent:logo" alt="logo"/>
            </v-avatar>
        </v-avatar>
    </Link>
</template>


<style scoped>

</style>
