<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <h1 style="font-size: 50px">TEM PERMISSÃO</h1>
    </AuthenticatedLayout>
</template>

<style lang="scss" scoped>
    @import 'resources/sass/app.scss';
</style>