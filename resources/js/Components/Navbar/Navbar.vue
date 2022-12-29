<template>
    <nav>
        <!-- <font-awesome-icon @click="toggleSidebar" icon="fa-solid fa-bars" class="toggle_sidebar_icon" /> -->
        <i class="bi bi-list toggle_sidebar_icon" @click="toggleSidebar"></i>
    </nav>
</template>

<script>
    export default {        
        mounted() {
            
        },
        methods: {
            toggleSidebar: function() {

                let aside = document.querySelector('aside')

                // Expandindo a sidebar
                if(!aside.classList.contains('expanded')) {
                    aside.classList.add('expanded')
                    aside.classList.remove('collapsed')
                
                    localStorage.setItem('sidebar_expanded', true);

                // Colapsando a sidebar
                }else if(!aside.classList.contains('collapsed')) {
                    aside.classList.add('collapsed')
                    aside.classList.remove('expanded')

                    localStorage.removeItem('sidebar_expanded');
                }
            }
        }
    }
</script>

<style lang="scss" src="./style.scss" scoped></style>