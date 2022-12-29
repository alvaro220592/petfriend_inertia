<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <aside class="collapsed">
        <ul>
            <div class="logo">
                <div class="logo__imagem">
                    Imagem
                </div>
            </div>

            <!-- <hr class="logo-line"> -->

            <Link :href="route('dashboard')">
                <li class="menu">
                    <div class="menu-title">
                        <!-- <font-awesome-icon icon="fa-solid fa-chart-line" class="menu-icon" /> -->
                        <i class="bi bi-bar-chart menu-icon"></i>
                        <span>Dashboard</span>
                    </div>
                </li>
            </Link>

            <li class="menu">
                <div class="menu-title" @click="toggleSubmenu">
                    <!-- <font-awesome-icon icon="fa-solid fa-circle-plus" class="menu-icon" /> -->
                    <i class="bi bi-plus-circle menu-icon"></i>
                    <span>Cadastros</span>
                </div>

                <ul class="submenu display-none">
                    <li>
                        <Link :href="route('users')">
                            <font-awesome-icon :icon="['fas', 'fa-chevron-right']" /> Usuários
                        </Link>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <div class="menu-title" @click="toggleSubmenu">
                    <!-- <font-awesome-icon icon="fa-solid fa-gear" class="menu-icon" /> -->
                    <i class="bi bi-gear menu-icon"></i>
                    <span>Configurações</span>
                </div>

                <ul class="submenu display-none">
                    <li><font-awesome-icon :icon="['fas', 'fa-chevron-right']" /> a</li>
                    <li><font-awesome-icon :icon="['fas', 'fa-chevron-right']" /> b</li>
                    <li><font-awesome-icon :icon="['fas', 'fa-chevron-right']" /> c</li>
                </ul>
            </li>
        </ul>
    </aside>
</template>

<script>
export default {
    mounted() {

        let aside = document.querySelector("aside");
        if (localStorage.getItem('sidebar_expanded')) {
            aside.classList.remove("collapsed");
            aside.classList.add("expanded");
        }
    },

    methods: {
        toggleSubmenu: function (event) {
            let submenu = event.currentTarget.nextSibling;

            submenu.classList.toggle("display-none");
            
            this.expandSidebar()
        },

        expandSidebar: function () {
            let aside = document.querySelector("aside");
            if (!aside.classList.contains("expanded")) {
                aside.classList.add("expanded");
                aside.classList.remove("collapsed");

                localStorage.setItem('sidebar_expanded', true);
            }
        },
    },
};
</script>

<style lang="scss" src="./style.scss"></style>
