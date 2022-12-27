<template>
    <aside class="collapsed">
        <ul>
            <li class="menu">
                <div class="menu-title" @click="toggleSubmenu">
                    <font-awesome-icon icon="fa-solid fa-circle-plus" />
                    <span>Cadastros</span>
                </div>

                <ul class="submenu display-none">
                    <li><font-awesome-icon :icon="['fas', 'fa-chevron-right']" /> a</li>
                    <li><font-awesome-icon :icon="['fas', 'fa-chevron-right']" /> b</li>
                    <li><font-awesome-icon :icon="['fas', 'fa-chevron-right']" /> c</li>
                </ul>
            </li>

            <li class="menu">
                <div class="menu-title" @click="toggleSubmenu">
                    <font-awesome-icon icon="fa-solid fa-gear" />
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
    mounted() {},

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
            }
        },
    },
};
</script>

<style lang="scss" src="./style.scss"></style>
