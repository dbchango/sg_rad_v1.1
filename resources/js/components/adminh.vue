
<template>
    <div>

        <center>
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-4 homeclass">
                    <img align="center" src="propietario.png" alt="ESPE" width="400">
                    <p style="color: #CE5202;text-align: center">&nbsp;Registrar Actividades</p>
                </div>
                <div class="col-2"></div>
                <div class="col-4">
                    <img src="login.png" alt="ESPE" width="400">
                    <p align="center" style="color: #CE5202;text-align: center">Cambiar Contraseña</p>
                </div>
                <div class="col-1"></div>
                </div>
        </div>
        </center>
    </div>
</template>

<script>
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

        }
        };
</script>
