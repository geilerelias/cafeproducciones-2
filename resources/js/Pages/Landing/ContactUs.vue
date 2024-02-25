<script setup>

import PageLayout from "@/Layouts/PageLayout.vue";
</script>

<template>
    <page-layout>
        <v-sheet class="rounded-0" light style="padding: 56px 0px;">
            <v-container class="container">
                <v-row class="justify-space-between">
                    <v-col class="col-md-5 col-12">
                        <div>
                            <v-container class="container pa-0" pace="6">
                                <v-row class="no-gutters justify-start">
                                    <v-col class="col-12">
                                        <h3
                                            class="text-uppercase text-h6 font-weight-bold mb-1 text-left">
                                            MANTENTE EN CONTACTO CON NOSOTROS
                                        </h3>
                                        <v-responsive class=" base-divider bg-primary mr-auto mb-6"
                                                      style="max-width: 28px;">
                                            <v-divider aria-orientation="horizontal" class="theme--light"
                                                       role="separator"/>
                                        </v-responsive>
                                        <p class="base-body text-body-1 text-justify grey--text text--darken-1 text-left mb-6">
                                            <div class="font-weight-bold">
                                                CAFÉ Producciones: Tu Socio en Logística y Eventos
                                            </div>
                                            ¡Bienvenido a CAFÉ Producciones, tu aliado en logística y desarrollo de
                                            eventos! Nos encontramos ubicados en Riohacha, La Guajira, y estamos aquí
                                            para ofrecerte servicios personalizados que se adapten a tus necesidades.

                                            Si estás buscando información detallada sobre nuestros servicios, ¡no dudes
                                            en contactarnos! Estamos aquí para atenderte con gusto y proporcionarte la
                                            información que necesitas para hacer de tu evento un éxito.
                                        </p>
                                    </v-col>
                                </v-row>
                            </v-container>
                            <div>
                                <div class="pt-2 mb-0 d-flex">
                                    <div class="d-inline-flex mb-3 align-self-start">
                                        <v-avatar class="transparent"
                                                  size="72"
                                        >
                                            <v-icon size="36">
                                                mdi-map-marker-outline
                                            </v-icon>
                                        </v-avatar>
                                    </div>
                                    <div class="d-flex justify-center align-center">
                                        <p class="base-body text-body-1 mx-auto grey--text text--darken-1 text-left mb-0"
                                           style="max-width: 700px;">
                                            Carrera 10 # 41 A - 17 Los Almendros, Riohacha, Colombia
                                        </p>
                                    </div>
                                </div>
                                <v-divider class="my-2"></v-divider>
                                <div class="pt-2 mb-0 d-flex">
                                    <div class="base-avatar d-inline-flex mb-3 align-self-start"><!---->
                                        <v-avatar class="transparent" size="72">
                                            <v-icon size="36">
                                                mdi-cellphone
                                            </v-icon>
                                        </v-avatar>
                                    </div>

                                    <div class="d-flex flex-column justify-center align-center">
                                        <a
                                            class="base-body text-body-1 mx-auto grey--text text--darken-1 text-left mb-0"
                                            href="tel:3004361660">
                                            +57 300 436 1660
                                        </a>
                                        <a
                                            class="base-body text-body-1 mx-auto grey--text text--darken-1 text-left mb-0"
                                            href="tel:3003285091"
                                        >
                                            +57 300 328 5091
                                        </a>
                                    </div>
                                </div>
                                <hr aria-orientation="horizontal" class="my-2 v-divider theme--light" role="separator">
                                <div class="pt-2 mb-0 d-flex align-center">
                                    <div class="base-avatar d-inline-flex mb-3 align-self-start">
                                        <v-avatar class="transparent" size="72">
                                            <v-icon size="36">
                                                mdi-email
                                            </v-icon>
                                        </v-avatar>
                                    </div>
                                    <div class="d-flex flex-column justify-center  align-center">
                                        <a
                                            class="text-body-1 grey--text text--darken-1 mb-0"
                                            href="mailto:contacto@cafeproducciones.com">
                                            contacto@cafeproducciones.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </v-col>

                    <v-col class="col-md-6 col-12">
                        <div>
                            <v-container class="container pa-0" space="4">
                                <v-row class="row no-gutters justify-start">
                                    <v-col class="col col-12">
                                        <h3
                                            class="text-uppercase text-h6 font-weight-bold mb-1 text-left">
                                            ENVÍENOS SU MENSAJE
                                        </h3>
                                        <div class="v-responsive base-divider primary mr-auto mb-6"
                                             style="max-width: 28px;">
                                            <div class="v-responsive__content">
                                                <hr aria-orientation="horizontal" class="v-divider theme--light"
                                                    role="separator">
                                            </div>
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-container>

                            <v-text-field
                                dense
                                label="Nombre"
                                outlined
                                variant="outlined"
                            ></v-text-field>

                            <v-text-field
                                dense
                                label="Email"
                                outlined
                                variant="outlined"
                            ></v-text-field>

                            <v-text-field
                                dense
                                label="Tema"
                                outlined
                                variant="outlined"
                            ></v-text-field>

                            <v-textarea
                                dense
                                label="Descripción del mensaje"
                                outlined
                                variant="outlined"
                            ></v-textarea>

                            <v-btn class="font-weight-bold accent--text bg-primary">
                                Enviar mensaje
                            </v-btn>

                        </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-sheet>
        <v-container>
            <v-card class="rounded-md" rounded style="padding: 0px;width: 100%">
                <iframe frameborder="0" height="600" marginheight="0" marginwidth="0" scrolling="no"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=11.52277934403712,%20-72.90622382964963+(CAFE%20Producciones)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        width="100%"></iframe>
            </v-card>
        </v-container>


        <div class="bg-white py-md-15 py-sm-8 py-8">
            <div class="py-md-9 py-2">
                <v-container>
                    <v-row class="justify-space-between">
                        <v-col class="v-col-md-3 v-col-12 pb-sm-4 pb-1">
                            <div class="pt-2 mb-0 d-flex align-center">
                                <div class="d-inline-flex mb-3 align-self-start">
                                    <v-avatar class="bg-secondary lighten-2" color="secondary" size="72">
                                        <v-icon color="white " size="36">mdi-map-marker</v-icon>
                                    </v-avatar>
                                </div>
                                <div class="d-flex justify-center align-center">
                                    <div class="d-inline ml-3">
                                        <h4 class="text-left text-h6  mb-1 text-secondary">Visítanos</h4>
                                        <h5 class="font-weight-medium text-body-1  ml-2">
                                            Carrera 10 # 41 A - 17 Los Almendros, Riohacha, Colombia
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                        <v-col class="v-col-md-3 v-col-12 pb-sm-4 pb-1">
                            <div class="pt-2 mb-0 d-flex align-center">
                                <div class="base-avatar d-inline-flex mb-3 align-self-start">
                                    <v-avatar class="grey lighten-2" color="secondary" size="72">
                                        <v-icon color="white " size="36">mdi-phone</v-icon>
                                    </v-avatar>
                                </div>

                                <div class="d-flex flex-column justify-center align-center">
                                    <div class="d-inline ml-3">
                                        <h4 class="text-left text-h6  mb-1 text-secondary">Llámanos</h4>
                                        <a href="tel:+573004361660">
                                            <h5 class="font-weight-medium text-body-1 ">
                                                +57 300 436 1660</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                        <v-col class="v-col-md-4 v-col-12">
                            <div class="pt-2 mb-0 d-flex align-center">
                                <div class="base-avatar d-inline-flex mb-3 align-self-start">
                                    <v-avatar class="grey lighten-2" color="secondary" size="72">
                                        <v-icon color="white " size="36">mdi-email</v-icon>
                                    </v-avatar>
                                </div>
                                <div class="d-flex flex-column justify-center  align-center">
                                    <div class="d-inline ml-3">
                                        <h4 class="text-left text-h6  mb-1 text-secondary">Escríbenos</h4>
                                        <div class="d-flex">
                                            <a class="text-decoration-none font-weight-medium text-body-1"
                                               href="mailto:contacto@cafeproducciones.com">
                                                contacto@cafeproducciones.com
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
        </div>
    </page-layout>
</template>

<style scoped>

</style>
