<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Pagination from "@/Components/Pagination/Pagination.vue";
import { ref } from "vue";
import { watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Breadcrumb from "@/Components/Breadcrumb/Breadcrumb.vue";

const props = defineProps({
    users: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
    perpage: {
        type: Number,
        default: function() {
            let urlParam = new URLSearchParams(window.location.search);
            return urlParam.get('perpage') ? parseInt(urlParam.get('perpage')) : 5
        }
    }
});

// pass filters in search
let search = ref(props.filters.search);

let perpage = ref(parseInt(props.perpage));

watch(search, (search_value) => {
    let id_perpage = document.getElementById('perpage').value
    
    Inertia.get(
        "/users",
        { search: search_value, perpage: id_perpage },
        {
            preserveState: true,
            replace: true,
        }
    );
});

watch(perpage, (perpage_value) => {
    let id_search = document.getElementById('search').value
    
    Inertia.get(
        "/users",
        { perpage: perpage_value, search: id_search },
        {
            preserveState: true,
            replace: true,
        }
    );
});

</script>

<template>
    <AuthenticatedLayout>
        <Breadcrumb endereco="Cadastros / Usuários" />
        
        <div class="row mb-3">
            <div class="col-md-4">
                <input
                    type="text"
                    v-model="search"
                    id="search"
                    placeholder="Buscar..."
                    class="form-control input"
                />
            </div>
        </div>

        <table class="table table-striped">
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

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <select id="perpage" v-model="perpage">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
                Resultados por página
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style lang="scss" scoped>
@import "resources/sass/app.scss";

.input:focus {
    border: 1px solid $first;
    box-shadow: none;
}
</style>
<script>
export default {
    components: {
        Pagination,
    },
};
</script>
