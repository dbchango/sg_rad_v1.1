<template>
    <div>
        <headerprof></headerprof> 
    <center>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 homeclass py-4">
                <img align="left" src="servicio-al-cliente.png" alt="ESPE" width="400">
            </div> 
            </div>
        </div>
    </center>
    </div>
</template>

<style>
    .homeclass{

        align-items: center;
    }
</style>

<script>
import headerprof from '../lib/headerprof';
    export default {
        data() {
            return {
                home: 'HOME'
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        components:{
            headerprof
        }
    };
</script>