import { defineStore } from 'pinia';

export const useAdminDrawerStore = defineStore('adminDrawerStore', {
    state: () => ({
        adminDrawer: null,
        rail: null,
    }),
    actions: {
        toggleDrawer() {
            this.adminDrawer = !this.adminDrawer;
        },
        changeDrawerRail() {
            this.rail = !this.rail;
        },
    },
});
