<script setup>
import {onMounted, ref, watch} from 'vue';

const fab = ref(false);
const menu = ref(false);
const message = ref(false);
const hints = ref(true);
const phone = '573004361660';
const text = ref('Hola, quiero mas información ');
const apilink = ref('');


const fav = ref(true)

const isMobile = () => {
    let check = false;
    (function (a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
};

watch(text, (val) => {
    apilink.value = 'https://';
    apilink.value += isMobile() ? 'api' : 'api';
    apilink.value += '.whatsapp.com/send?phone=' + phone + '&text=' + encodeURI(val);
});

onMounted(() => {
    apilink.value = 'http://';
    apilink.value += isMobile() ? 'api' : 'api';
    apilink.value += '.whatsapp.com/send?phone=' + phone + '&text=' + encodeURI("Hello!");
});

</script>


<template>

    <div class="text-center">
        <v-menu
            v-model="menu"
            :close-on-content-click="false"
            location="end"
        >
            <template v-slot:activator="{ props }">


                <v-fab-transition>
                    <v-btn
                        color='green darken-1'
                        dark
                        fab
                        rounded small v-bind="props"
                    >
                        <v-icon>mdi-whatsapp</v-icon>
                    </v-btn>
                </v-fab-transition>
            </template>

            <v-card min-width="300">
                <v-card>
                    <v-list class="chat-header bg-green">
                        <v-list-item
                            subtitle="A través de whatsapp"
                            title="Contactanos"
                        >
                            <template v-slot:append>
                                <v-btn
                                    icon="mdi-close-circle"
                                    variant="text"
                                    @click="menu = !menu"
                                ></v-btn>
                            </template>
                        </v-list-item>
                    </v-list>

                    <v-divider></v-divider>

                    <v-container class="chat-background">
                        <v-container>
                            <v-row wrap>
                                <v-col class="text-xs-right flex-row-reverse" cols="12" mb-4>
                                    <v-chip class="chip-chat ">
                                        Hola, ¿como podemos ayudarte?
                                        <v-icon right>mdi-check-all</v-icon>
                                    </v-chip>
                                </v-col>
                                <v-col cols="10">
                                    <v-text-field
                                        v-model="text"
                                        class="my-input"
                                        color="teal"
                                        single-line
                                        variant="outlined"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="2">
                                    <v-btn
                                        :href="apilink"
                                        class="teal--text"
                                        icon
                                        large
                                        target="_blank"
                                        @click="fab = !fab; menu = false"
                                    >
                                        <v-icon large>mdi-send</v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-container>
                </v-card>
            </v-card>
        </v-menu>
    </div>
</template>


<style>
.my-input.v-input .v-input__slot {
    border-radius: 100px;
}

.chat-background {
    background-color: #ECE5DD !important
}

.chat-header {
    background-color: #075E54 !important
}

.chip-chat {
    background-color: #DCF8C6 !important
}

</style>
