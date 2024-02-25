// Vuetify
import 'vuetify/styles'
import {createVuetify} from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
//icons
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader


const vuetify = createVuetify({

    components,
    directives,
    icons: {
        defaultSet: 'mdi', // This is already the default value - only for display purposes
    },
    theme: {
        defaultTheme: 'light',
        themes: {
            light: {
                fontFamily: 'Montserrat, sans-serif',
                colors: {
                    primary: '#b7131c',
                    secondary: '#700809',
                    accent: '#a54b54',
                    error: '#f44336',
                    warning: '#ff9800',
                    info: '#00bcd4',
                    success: '#4caf50',
                }
            },
            dark: {
                fontFamily: 'Montserrat, sans-serif',
                colors: {
                    primary: '#b7131c',
                    secondary: '#700809',
                    accent: '#a54b54',
                    error: '#f44336',
                    warning: '#ff9800',
                    info: '#00bcd4',
                    success: '#4caf50',
                }
            },

        },
    },
});

export default vuetify;







