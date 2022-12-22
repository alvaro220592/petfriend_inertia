<template>
    <nav>
        <span @click="toggleSidebar">Click</span>
    </nav>
</template>

<style lang="scss" src="./style.scss">

</style>

<script>
    export default {        
        mounted() {
            
        },
        methods: {
            toggleSidebar: function() {
                let aside = document.querySelector('aside')
                if(!aside.classList.contains('expanded')) {
                    aside.classList.add('expanded')
                    aside.classList.remove('collapsed')
                }else if(!aside.classList.contains('collapsed')) {
                    aside.classList.add('collapsed')
                    aside.classList.remove('expanded')
                }
            }
        }
    }
</script>