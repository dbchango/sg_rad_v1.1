<template>
    <div>

    <center>


    <div class="container py-4" >
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4 homeclass">
                <a class="nav-link" href="/login"><button type="button" class="btn btn-link" style="color: #CE5202;text-align: center">
                    <img align="center" src="propietario.png" alt="ESPE" width="400">
                </button></a>
                <a class="nav-link" href="/login">
                    <button type="button" class="btn btn-link" style="color: #CE5202;text-align: center">
                        Login
                    </button>
                </a>

            </div>
            <div class="col-2"></div>
            <div class="col-4">
                <a href="/password/reset">
                    <img src="login.png" alt="ESPE" width="400">
                </a>
                <a href="/password/reset">
                <button type="button" class="btn btn-link" align="center" style="color: #CE5202;text-align: center" >Cambiar contraseña</button>
                </a>
                </div>
            <div class="col-1"></div>
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

        },
        components:{
            headerprof
        }
    };
</script>
