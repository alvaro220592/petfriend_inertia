<template>
    <div>
        <AuthenticatedLayout>
            <Form />
        </AuthenticatedLayout>

    </div>
</template>

<script setup>
    
    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import Form from '@/Pages/Admin/Client/Form/Form.vue'

    const props = defineProps({
        clients: Object
    })

</script>

<script>
    export default {
        // data() {
        //     return {
        //         props: {
        //             clients: Object
        //         }
        //     }
        // }
    }
</script>

<style lang="scss" scoped>

</style>