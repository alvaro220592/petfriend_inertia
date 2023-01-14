<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import Breadcrumb from "@/Components/Breadcrumb/Breadcrumb.vue";
    import axios from 'axios';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <Breadcrumb endereco="Dashboard" />

        <select @change="stateCities($event)">
            <option value="">Estado</option>
            <option v-for="state in states" :key="state.id" :value="state.id">{{ state.uf }}</option>
        </select>

        <select>
            <option v-if="cities.length == 0" value="">Cidade</option>
            <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.nome }}</option>
        </select>

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam soluta ipsa enim nihil rerum facere molestias tempore expedita voluptatibus vel. Maxime atque distinctio vero blanditiis sapiente pariatur, animi aperiam necessitatibus?
        Autem id facere tenetur illo ullam aliquam. Recusandae doloribus iure accusamus ut beatae magnam ipsa explicabo debitis cupiditate nemo, sunt eius nisi. Suscipit tempore quisquam, excepturi esse velit quae ducimus.
        Excepturi ad possimus fugiat fugit, labore nulla. Laudantium provident iusto fuga animi, modi nesciunt quis tempore molestias quisquam earum beatae magnam, accusantium quos officia, et possimus placeat alias tenetur fugiat.
        Sapiente, dolore accusamus? Qui, ab iusto architecto quasi modi vel consequuntur inventore illum magnam maxime commodi quibusdam pariatur, doloribus ex nihil saepe! Voluptates nobis ratione obcaecati aliquam nesciunt illum voluptate.
        Nobis blanditiis ratione numquam suscipit aliquam vitae quas, consequuntur deserunt quo doloribus sequi et corrupti velit mollitia illo recusandae temporibus iusto excepturi laudantium rerum ex ipsam placeat perspiciatis illum. Aliquam?
       
    </AuthenticatedLayout>
</template>

<script>
export default {
    data(){
        return {
            states: '',
            cities: ''
        }
    },
    mounted() {
        this.stateCity()
    },
    methods: {
        stateCity: function() {
            axios.get(route('state.index'))
            .then(res => {
                this.states = res.data
            })
        },
        stateCities: function(event) {
            axios.get(route('stateCities', event.currentTarget.value))
            .then(res => {
                this.cities = res.data
            })
        }
    }
}
</script>

<style lang="scss" scoped>
    @import 'resources/sass/app.scss';
</style>