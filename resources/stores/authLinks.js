import {defineStore} from "pinia";

export const useAuthLinksStore = defineStore("authLinks", {
    state: () => ({
        authLinks: [
            {
                route: "dashboard", icon: 'mdi-view-dashboard', title: "Dashboard"
            }, {
                title: 'Role',
                route: 'role.index',
                icon: 'mdi-shield-account-outline',
                options: [{title: 'Lista de roles', route: '/roles/list'}, {title: 'Nuevo rol', route: '/roles/new'},],
            }, {
                title: "Permisos", icon: 'mdi-badge-account-outline', route: "permission.index"
            }, {
                title: "User", icon: 'mdi-account-group-outline', route: "user.index"
            }, {
                title: "Reportes", icon: 'mdi-chart-bar', route: "reports"
            }
        ],
    })
});
