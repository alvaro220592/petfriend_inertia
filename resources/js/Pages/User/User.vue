<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12" v-if="can('Testar')">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-blue-300 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        tabela aqui...
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    mounted() {
        this.getUsers();
    },

    methods: {
        getUsers: function () {
            axios.get("getUsers").then((res) => {});
        },
    },
};
</script>

<style lang="scss" src="./style.scss"></style>
