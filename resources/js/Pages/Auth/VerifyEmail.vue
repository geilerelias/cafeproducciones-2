<script setup>
import {computed} from 'vue';
import {Link, useForm} from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthLayout from "../../Layouts/AuthLayout.vue";

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <auth-layout title="Verificación de Email ">
        <AuthenticationCard>
            <template #logo>
                <AuthenticationCardLogo/>
                <h2 class="font-weight-bold mt-4 blue-grey--text text--darken-2">Verificar email</h2>

            </template>

            <div class="mb-4 text-sm text-gray-600">
                Antes de continuar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que
                le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.
            </div>

            <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
                Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó en la
                configuración de su perfil.
            </div>

            <form @submit.prevent="submit">
                <div class="mt-4 flex items-center justify-between flex-column">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" block>
                        Resend Verification Email
                    </PrimaryButton>
                    <div class="d-flex justify-space-between py-4">
                        <div>
                            <Link
                                :href="route('profile.show')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Edit Profile
                            </Link>
                        </div>
                        <div>
                            <Link
                                :href="route('logout')"
                                as="button"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2"
                                method="post"
                            >
                                Log Out
                            </Link>
                        </div>
                    </div>
                </div>
            </form>
        </AuthenticationCard>

    </auth-layout>
</template>
