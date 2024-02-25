<script setup>
import gifCafe from '@/../videos/vid-cafe.gif';
import bg18 from '@/../images/bg/bg-contact-2.jpg'
import bg25 from '@/../images/bg/2.jpg'
import bg8 from '@/../images/bg/00.jpg'
import PageLayout from "@/Layouts/PageLayout.vue";
import TeamComponent from "@/Components/App/TeamComponent.vue";
import {Link} from "@inertiajs/vue3";
import {useDisplay} from "vuetify";

const {xsOnly, xs, md, mobile, mdAndDown, mdAndUp, lgAndUp, smAndUp, smAndDown} = useDisplay()
const features = [
    {
        color: 'indigo',
        name: 'Dedicados',
        icon: 'mdi-puzzle-heart-outline',
        description:
            'La pasión por lo que hacemos es lo que nos mantiene motivado ' +
            'para realizar con dedicación nuestro trabajo'
    }, {
        color: 'teal',
        name: 'Precavidos',
        icon: 'mdi-sign-caution',
        description:
            'Como empresa siempre tenemos un plan A, B, C… ' +
            'La improvisación no suele dar buenos resultados.'
    }, {
        color: 'cyan',
        name: 'Detallistas',
        icon: 'mdi-code-tags-check',
        description:
            'Cuidamos los detalles. Supervisamos las necesidades que ' +
            'puedan tener los asistentes antes y durante la celebración del evento.'
    }, {
        color: 'green',
        name: 'Innovador',
        icon: 'mdi-responsive',
        description: 'la tecnología hace parte de nuestro éxito. ' +
            'Es imprescindible y un elemento diferenciador que dejará ' +
            'un recuerdo satisfactorio del evento.'
    }, {
        color: 'orange',
        name: 'Organizados',
        icon: 'mdi-order-bool-ascending-variant',
        description:
            'La anticipación y correcta gestión del tiempo es nuestra prioridad.'
    }, {
        color: 'pink',
        name: 'Personalizable',
        icon: 'mdi-cogs',
        description:
            'La colaboración con el cliente sobre negociación contractual.'
    },
];

</script>

<template>
    <page-layout title="Nosotros">
        <div class="pb-md-15 pb-0 mt-95 d-none d-md-flex">
            <v-container class="pt-1">
                <v-card
                    class="elevation-0 px-md-15 px-sm-8 px-4 py-md-15 py-8 rounded-md">
                    <v-img :src="bg8" class="rounded-md" gradient="to top, rgb(13 3 29 / 64%), rgb(25 25 38 / 65%)">
                        <v-row class="fill-height align-end justify-space-between px-md-7 px-0 py-md-10 py-0">
                            <v-col class="v-col-md-7 v-col-12 text-md-left text-center fill-height">
                                <h1
                                    class="text-h6 mb-7 text-white lh-60 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="200" data-aos-duration="1000">
                                    Somos el resultado de un equipo excepcional donde la dedicación y el talento se
                                    unen.
                                </h1>
                                <Link :href="route('contact-us')">
                                    <v-btn class="bg-primary rounded-md px-6"
                                           rounded
                                           size="x-large"
                                           style="text-transform: capitalize; letter-spacing: 0px;"
                                           type="button">
                                        Contáctenos
                                    </v-btn>
                                </Link>
                            </v-col>
                        </v-row>
                    </v-img>
                </v-card>
            </v-container>
        </div>

        <section>
            <v-sheet class="transparent pb-6" light>
                <div class="py-2">
                    <div class="text-center my-2">
                        <div class="d-inline-flex mb-4">
                            <v-avatar class="primary"
                                      size="56">
                                <v-icon dark
                                        size="28">
                                    mdi-account-question-outline
                                </v-icon>
                            </v-avatar>
                        </div>
                        <h1 class="text-uppercase text-h5 font-weight-bold mb-2 text-center">
                            ¿Quienes somos?
                        </h1>
                        <v-responsive class="bg-primary mx-auto mb-2" style="max-width: 28px;">
                            <v-divider aria-orientation="horizontal" class=" theme--light" role="separator"/>
                        </v-responsive>
                    </div>
                    <v-container>
                        <v-sheet class="theme--light">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="w-full w-md-half d-flex align-center">
                                    <div class="pr-6 pr-md-12">
                                        <h1 class="text-h6 text-lg-h5 font-weight-bold mt-xl-4">
                                            Una mejor
                                            forma para construir su próximo
                                            <span class="primary--text">evento</span>
                                        </h1>
                                        <div class=" text-lg-h6 mt-5 text-justify">
                                            Somos tu empresa de acompañamiento en la logística de sus eventos, CaFe
                                            producciones
                                            Ofrece
                                            nuestro portafolio de servicios para cubrir sus necesidades a nivel Local,
                                            Regional y Nacional.
                                        </div>
                                        <div class="my-4">
                                            <Link class="text-decoration-none font-weight-bold text-h6 mt-3"
                                                  href="/contact-us">
                                                Contactanos
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full w-md-half">
                                    <v-img :src="gifCafe" class="rounded-lg" cover
                                           style="max-height: 60vh;">
                                    </v-img>
                                </div>
                            </div>
                        </v-sheet>
                    </v-container>
                </div>
            </v-sheet>
        </section>

        <section class="history bg-secondary bg-dark py-md-12 py-5">
            <div class="py-md-10 py-sm-5">
                <v-container class="">
                    <v-row class=" justify-space-between">
                        <div class="v-col-md-4 v-col-12">
                            <h2 class="text-h4 text-dark font-weight-bold pr-sm-10">
                                Misión y visión empresarial
                            </h2>
                            <p class="text-body-1 text-muted my-4">
                                En nuestra empresa, nos comprometemos a brindar experiencias únicas e innovadoras en
                                cada evento. Buscamos la excelencia y la calidad en todos nuestros servicios para
                                garantizar la plena satisfacción de nuestros clientes.
                            </p>
                        </div>
                        <v-col class="v-col-md-7 v-col-12">
                            <v-row class="d-flex flex-column flex-sm-row justify-content-around justify-center">
                                <v-col class="col-12 col-sm-12 col-md-6 col-lg-5 ">
                                    <v-card
                                        :data-aos="mobile?'fade-up':'fade-right'"
                                        class="mr-1 fill-height  rounded-lg"
                                        data-aos-delay="400"
                                        data-aos-duration="1000">
                                        <v-card-title>
                                            <h4
                                                class="d-flex justify-start text-h4 font-weight-black  text-primary pt-2  fill-width"
                                                style="width: 100%;"> Misión
                                            </h4>
                                        </v-card-title>
                                        <v-card-text>
                                            <p class="mx-2 my-3 text-subtitle-1 text-justify">
                                                Brindar a todos nuestros clientes una experiencia única e innovadora en
                                                cada uno
                                                de
                                                sus
                                                eventos, ofreciendo el más alto nivel de excelencia y calidad en
                                                nuestros
                                                servicios.
                                            </p>
                                        </v-card-text>
                                    </v-card>
                                </v-col>

                                <v-col class="col-12 col-sm-12 col-md-6 col-lg-5 mt-4 mt-sm-0">
                                    <v-card
                                        :data-aos="mobile?'fade-up':'fade-left'"
                                        class="mr-1 fill-height rounded-lg"
                                        data-aos-delay="400"
                                        data-aos-duration="1000">
                                        <v-card-title>
                                            <h4
                                                class="text-primary d-flex justify-start rounded-lg text-h4 font-weight-bold font-weight-black pt-2  white--text fill-width"
                                                style="width: 100%;">
                                                Visión
                                            </h4>
                                        </v-card-title>
                                        <v-card-text>
                                            <p
                                                class="mx-2 my-3 text-subtitle-1 text-justify">
                                                Ser la empresa líder en el mercado de producción y logística para todo
                                                tipo
                                                eventos.
                                            </p>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-container>
            </div>
        </section>

        <team-component></team-component>
        <v-container>
            <div
                class="bg-secondary py-sm-15 py-7 px-lg-16 px-4 mt-12 rounded-md">
                <div class="px-sm-6 px-3">
                    <v-row>
                        <v-col class="v-col-md-6 v-col-12"><h2
                            class="text-h4 mb-6 text-sm-start text-center text-white">¿Tengo una pregunta?</h2>
                            <p class="text-h6 font-weight-regular text-sm-start text-center text-white">
                                Café Producciones es el resultado de un equipo excepcional donde la dedicación y
                                el talento se unen. Con un liderazgo visionario y la pasión de cada miembro, nos
                                dedicamos a ofrecer soluciones innovadoras y servicios de calidad en la
                                producción de eventos.
                            </p>
                        </v-col>
                        <v-col class="v-col-md-6 v-col-12">
                            <div
                                class="d-sm-flex d-flex flex-column flex-sm-row  text-center justify-md-end justify-center">
                                <v-img
                                    :src="bg18"
                                    alt="contact"
                                    class="rounded-xl mr-2 mb-sm-0 mb-2"
                                    cover="" height="300"/>
                                <v-img
                                    :src="bg25"
                                    alt="professional"
                                    class="rounded-xl"
                                    cover="" height="300"/>
                            </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col class="v-col-12">
                            <div
                                class="d-sm-flex justify-md-end justify-sm-start justify-center position-relative">
                                <div class="mr-sm-13">
                                    <div class="text-uppercase text-body-1">Phone</div>
                                    <div class="d-flex align-center">
                                        <a class="text-decoration-none" href="tel:+573004361660"
                                           target="_blank">
                                            <v-icon color="white">mdi-phone</v-icon>
                                        </a> &nbsp;
                                        <a href='https://wa.me/573004361660' target="_blank">
                                            <v-icon color="white">mdi-whatsapp</v-icon>
                                        </a> &nbsp;
                                        <a href="tel:+573004361660">
                                            <h5 class="font-weight-medium text-h5 text-white">
                                                +57 300 436 1660</h5>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <div class="text-uppercase text-sm-14 text-body-1 mt-sm-0 mt-4">EMAIL</div>
                                    <div class="d-flex align-center">
                                        <a class="text-decoration-none"
                                           href="mailto:contacto@cafeproducciones.com"
                                           target="_blank">
                                            <v-icon color="white">mdi-email</v-icon>
                                        </a>

                                        <a class="font-weight-medium text-md-h5 text-white ml-2 text-truncate"
                                           href="mailto:contacto@cafeproducciones.com">
                                            contacto@cafeproducciones.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </div>
            </div>
        </v-container>

    </page-layout>
</template>

<style scoped>

</style>
