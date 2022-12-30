<script setup>
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import Navbar from "@/Components/Navbar/Navbar.vue";
import Main from "@/Components/Main/Main.vue";
</script>

<template>
    <div class="all">
        <Sidebar />

        <section>
            <Navbar />

            <!-- <div class="py-12" v-if="can('Testar')">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-red-400">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg painel bg-blue-700">
                        <div class="p-6 text-gray-300">
                            <slot />
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="card_container">
                <slot />
            </div>
        </section>
    </div>
</template>

<style lang="scss">
@import "resources/sass/app.scss";

.all {
    display: flex;
    background-color: $second;

    section {
        min-height: 100vh;
        width: 100%;
    }
}

.painel {
    background-color: $fifth;
    box-shadow: 1px 1px 2px grey;
}

.card_container {
    background-color: white;
    margin: 15px;
    padding: 15px;
    border-radius: 4px;
    box-shadow: 1px 1px 2px grey;
}
</style>
