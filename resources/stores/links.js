import {defineStore} from "pinia";

export const useLinksStore = defineStore("links", {
    state: () => ({
        links: [
            {
                route: "home",
                icon: "mdi-home-outline",
                title: "Inicio",
                submenu: false
            },
            {
                route: "about-us",
                icon: "mdi-account-question-outline",
                title: "Nosotros",
                submenu: false
            },
            {
                route: "our-services",
                icon: "mdi-face-agent",
                title: "Servicios",
                submenu: false
            },
            {
                route: "our-gallery",
                icon: "mdi-movie-play-outline",
                title: "Galería",
                submenu: false
            },
            {
                route: "contact-us",
                icon: "mdi-card-account-phone-outline",
                title: "Contacto",
                submenu: false
            },
        ],
    }),
})

