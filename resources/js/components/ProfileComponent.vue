<template>
    <div class="card">

             <router-link class="dropdown-item" :to="{name:'MainUsuariosAdmin'}" >Administrar Usuarios</router-link>

            <div id="app">
                <router-view />
            </div>
        </div>
</template>

<script>
    export default {

        data() {
            return {
                name: ''
            }
        },

        mounted() {
            this.name = 'Behrang No';
        }

    }
</script>
