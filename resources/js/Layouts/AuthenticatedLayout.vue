<template>
    <div class="geral">
        <aside>
            sidebar
        </aside>
        <section>
            <nav>
                navbar
            </nav>
            <main>
                conteúdo
            </main>
        </section>
    </div>
</template>

<style lang="scss">

    @import 'resources/sass/app.scss';

    .geral {
        display: flex;

        aside {
            background-color: lightcoral;
            min-height: 100vh;
        }
        
        section {
            min-height: 100vh;
            width: 100%;
            
            nav {
                background-color: lightcyan;
                height: 10vh;
                width: 100%;
            }

            main {
                background-color: lightpink;
                min-height: 90vh;
                width: 100%;
            }
        }
    }
</style>