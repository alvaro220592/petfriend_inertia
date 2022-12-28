<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <AuthenticatedLayout>
        USUÁRIOS...    
    </AuthenticatedLayout>
</template>

<script>
    export default {
        mounted() {
            this.getUsers()
        },

        methods: {
            getUsers: function() {
                axios.get('getUsers')
                .then(res => {
                    console.log(res.data);
                })
            }
        }
    }
</script>

<style lang="scss" src="./style.scss"></style>