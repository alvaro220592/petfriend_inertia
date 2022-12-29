<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <div class="py-12" v-if="can('Testar')">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <div class="bg-blue-300 overflow-hidden shadow-sm sm:rounded-lg"> -->
                <div class="overflow-hidden shadow-sm sm:rounded-lg painel">
                    <div class="p-6 text-gray-900">
                        <h1 style="font-size: 50px">TEM PERMISSÃO</h1>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style lang="scss" scoped>
    @import 'resources/sass/app.scss';
    
    .painel {
        background-color: $fifth;
        box-shadow: 1px 1px 2px grey;
    }
</style>