<script setup>
import {ref} from "vue";
import {Link, useForm} from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import AuthLayout from "@/Layouts/AuthLayout.vue";
import SpinnerComponent from "../../Components/App/SpinnerComponent.vue";

const show = ref(null)

defineProps({
    canResetPassword: Boolean,
    status: String,
});

let form = useForm({
    email: '',
    password: '',
    remember: false,
});


const emailRules = {
    required: v => !!v || 'E-mail is required',
    valid: v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
};

const passwordRules = {
    required: v => !!v || 'Password is required.',
    min: v => v.length >= 8 || 'Min 8 characters',
};

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const reset = () => {
    form.clearErrors();
    form.defaults({
        email: '',
        password: '',
        remember: false
    })
    form.reset()
}
</script>

<template>
    <auth-layout title="Ingresar">

        <AuthenticationCard class="pa-2 pa-sm-8">
            <template #logo>
                <AuthenticationCardLogo/>
                <h2 class="font-weight-bold mt-4 text-blue-grey-darken-2">Ingresar</h2>
                <h6
                    class="text-subtitle-1 mb-2"> ¿No tienes cuenta?
                    <Link href="/register">
                        registrarse
                    </Link>
                </h6>
            </template>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div class="mt-4">

                    <v-text-field
                        v-model="form.email"
                        :error-messages="form.errors.email?form.errors.email:''"
                        :rules="[emailRules.required,emailRules.valid]"
                        density="comfortable"
                        label="E-mail"
                        name="email"
                        required
                        variant="outlined"
                    >
                    </v-text-field>

                    <!--<InputLabel for="email" value="Email"/>-->

                    <!--<InputError :message="form.errors.email" class="mt-2"/>-->
                </div>

                <div class="mt-4">
                    <!--
                                        <InputLabel for="password" value="Password"/>
                    -->
                    <v-text-field
                        v-model="form.password"
                        :append-inner-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                        :error-messages="form.errors.password?form.errors.password:''"
                        :rules="[passwordRules.required,passwordRules.min]"
                        :type="show ? 'text' : 'password'"
                        autocomplete="new-password"
                        dense
                        density="comfortable"
                        hint="At least 8 characters"
                        label="password"
                        name="password"
                        required
                        variant="outlined"
                        @click:append-inner="show = !show"
                        @keyup.enter="submit"
                    ></v-text-field>

                    <!--                    <InputError :message="form.errors.password" class="mt-2"/>-->
                </div>

                <div class="d-flex flex-column-reverse flex-sm-row align-center justify-space-between  mb-sm-0">
                    <v-checkbox
                        v-model="form.remember"
                        label="Recuérdame"
                    ></v-checkbox>
                    <div v-if="canResetPassword" class="ml-sm-auto mt-1 mt-sm-n6">
                        <Link :href="route('password.request')">Olvidé mi contraseña
                        </Link>
                    </div>

                </div>


                <v-btn :disabled="form.processing" block class="mr-4 mb-4 " color="primary" contained
                       type="submit"
                >
                    Ingresar
                </v-btn>
                <v-btn block class="mr-4 mb-4" color="primary" variant="outlined"
                       @click="reset"
                >
                    Reiniciar formulario
                </v-btn>

                <spinner-component :opacity="0.9" :value="form.processing"></spinner-component>

            </form>
        </AuthenticationCard>


    </auth-layout>
</template>
