<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <!-- <div v-if="data.length > 3" class="flex justify-center mt-4 space-x-4">
        <Link
            v-for="(link, k) in data"
            :key="k"
            class="px-4 py-3 text-sm leading-4 bg-white rounded hover:bg-white focus:text-indigo-500 hover:shadow"
            :class="{'bg-indigo-400 text-white': link.active}"
            :href="link.url"
            v-html="link.label"
        />
    </div> -->

    <div v-if="data.length > 3" class="flex justify-center mt-4 space-x-4">
        <Link
            v-for="(link, k) in data"
            :key="k"
            class="pagination_link"
            :class="{ pagination_link_active: link.active }"
            :href="link.url"
            v-html="link.label"
        />
    </div>
</template>

<style lang="scss" scoped>
@import "resources/sass/app.scss";

.pagination_link {
    padding: 5px 10px;
}

.pagination_link_active {
    padding: 5px 10px;
    background-color: $second;
    border: solid 1px $first;
}
</style>
