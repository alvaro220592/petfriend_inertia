<script setup>
    import Sidebar from '@/Components/Sidebar/Sidebar.vue'
    import Navbar from '@/Components/Navbar/Navbar.vue'
    import Main from '@/Components/Main/Main.vue'
</script>

<template>
    <div class="all">

        <Sidebar />
        
        <section>        
            <Navbar />
        
            <!-- <Main /> -->
            <slot />
        </section>
    </div>
</template>

<style lang="scss">

    @import 'resources/sass/app.scss';

    .all {
        display: flex;
        background-color: $second;

        section {
            min-height: 100vh;
            width: 100%;
        }
    }
</style>