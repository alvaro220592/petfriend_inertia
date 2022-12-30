<template>
    <div class="row">
        <div class="col-md mb-4">
            <span class="breadcrumbs">{{ endereco }}</span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            rota: String
        }
    },
    mounted() {
        this.getRoute()
    },
    methods: {
        getRoute: function() {
        }
    },
    props: {
        endereco: String
    }
}
</script>

<style lang="scss">
    @import 'resources/sass/app.scss';
    .breadcrumbs {
        background-color: $second;
        padding: 5px;
    }
</style>