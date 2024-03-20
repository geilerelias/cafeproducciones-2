<script setup>
import {Link, useForm} from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import AuthLayout from "../../Layouts/AuthLayout.vue";
import {ref} from "vue";

const show = ref(false)
const show2 = ref(null)

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});


const nameRules = [
    v => !!v || 'El nombre es requerido',
];
const emailRules = [
    v => !!v || 'El E-mail es requerido',
    v => /.+@.+\..+/.test(v) || 'El email debe ser válido',
];

const passwordRules = [
    value => !!value || 'La contraseña es requerida.',
    v => v.length >= 8 || 'Mínimo 8 caracteres',
];

const confirmPasswordRules = [
    (v) => !!v || 'La confirmación de contraseña es requerida',
    (v) => v === form.password || 'Las contraseñas no coinciden',
];

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};


function reset() {

}
</script>

<template>
    <auth-layout title="Register">

        <AuthenticationCard>
            <template #logo>
                <AuthenticationCardLogo/>
                <h2 class="font-weight-bold mt-4 blue-grey--text text--darken-2">Registrarse</h2>
                <h6 class=" mb-4"> ¿Ya tienes cuenta?
                    <Link href="/login">Inicia sesión</Link>
                </h6>
            </template>

            <form @submit.prevent="submit">
                <div>
                    <v-text-field
                        id="name"
                        v-model="form.name"
                        :error-messages="form.errors.name"
                        :rules="nameRules"
                        autocomplete="name"
                        autofocus
                        class="mt-1 block w-full"
                        label="Nombres"
                        required
                        type="text"
                        variant="outlined"
                    />
                </div>
                <div class="mt-4">
                    <v-text-field
                        id="email"
                        v-model="form.email"
                        :error-messages="form.errors.email"
                        :rules="emailRules"
                        autocomplete="username"
                        class="mt-1 block w-full"
                        label="Email"
                        required
                        type="email"
                        variant="outlined"
                        @blur="form.clearErrors('email')"
                    />
                </div>

                <div class="mt-4">
                    <v-text-field
                        id="password"
                        v-model="form.password"
                        :append-inner-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                        :error-messages="form.errors.password"
                        :rules="passwordRules"
                        :type="show ? 'text' : 'password'"
                        autocomplete="new-password"
                        class="mt-1 block w-full"
                        label="Contraseña"
                        required
                        type="password"
                        variant="outlined"
                        @click:append-inner="show = !show"
                    />
                </div>

                <div class="mt-4">
                    <v-text-field
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        :append-inner-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                        :error-messages="form.errors.password_confirmation"
                        :rules="confirmPasswordRules"
                        :type="show2 ? 'text' : 'password'"
                        autocomplete="new-password"
                        class="mt-1 block w-full"
                        label="Confirmar Contraseña"
                        required
                        type="password"
                        variant="outlined"
                        @click:append-inner="show2 = !show2"

                    />
                </div>

                <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                    <InputLabel for="terms">
                        <div class="flex items-center">
                            <v-checkbox
                                id="terms"
                                v-model="form.terms"
                                v-model:checked="form.terms"
                                :rules="[v => !!v || '¡Debes estar de acuerdo para continuar!']"
                                name="terms"
                                required
                            >
                                <template v-slot:label>
                                    <div class="ml-2 text-wrap">
                                        Estoy de acuerdo con los
                                        <a :href="route('terms.show')"
                                           class="underline text-sm  rounded-md focus:outline-none"
                                           target="_blank">
                                            Términos de servicio
                                        </a>
                                        y
                                        <a :href="route('policy.show')"
                                           class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                           target="_blank">
                                            política de privacidad
                                        </a>
                                    </div>
                                </template>

                            </v-checkbox>


                        </div>
                        <InputError :message="form.errors.terms" class="mt-2"/>
                    </InputLabel>
                </div>


                <v-btn :class="{ 'opacity-25': form.processing }" :disabled="form.processing" block color="primary"
                       variant="elevated">
                    Registrarse
                </v-btn>

                <v-btn block class="my-4 "
                       color="primary"
                       variant="outlined"
                       @click="reset"
                >
                    Reiniciar formulario
                </v-btn>
            </form>
        </AuthenticationCard>
    </auth-layout>
</template>
