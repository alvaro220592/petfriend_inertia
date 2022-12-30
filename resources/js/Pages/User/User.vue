<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Pagination from "@/Components/Pagination/Pagination.vue";
import { ref } from "vue";
import { watch } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    users: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
});
// pass filters in search
let search = ref(props.filters.search);
watch(search, (value) => {
    Inertia.get(
        "/users",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="row">
            <div class="col-md-3">
                <!-- <input
                    type="text"
                    v-model="search"
                    placeholder="Search..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5"
                /> -->
                <input
                    type="text"
                    v-model="search"
                    placeholder="Buscar..."
                    class="form-control"
                />
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                </tr>
            </tbody>
        </table>
        <Pagination :data="users.links" />
    </AuthenticatedLayout>
</template>

<style lang="scss" scoped>
@import "resources/sass/app.scss";
</style>
<script>
export default {
    // props: {
    //     users: {
    //         type: Object,
    //         default: () => ({}),
    //     },
    //     filters: {
    //         type: Object,
    //         default: () => ({}),
    //     },
    // },

    mounted() {
        // this.getUsers();
    },

    methods: {
        // getUsers: function () {
        //     axios.get("getUsers").then((res) => {
        //         this.users = res.data;
        //         console.log(this.users.links);
        //     });
        // },
    },
    components: {
        Pagination,
    },
};
</script>
