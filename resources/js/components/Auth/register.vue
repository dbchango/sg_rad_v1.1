<template>
    <div class="card">

        <router-link class="dropdown-item" :to="{name:'MainUsuariosAdmin'}" >Administrar Usuarios</router-link>
        <p>Register</p>

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
