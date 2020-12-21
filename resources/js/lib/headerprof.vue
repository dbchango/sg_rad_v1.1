<template>

    <div class="cont">
                <header class="blog-header py-3 bg-dark container-fluid">
                    <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <a href="/">
                            <img src="SG-RAD.png" alt="ESPE" width="150">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="blog-header-logo
                        " style="color: #CE5202">REGISTRO DE ACTIVIDADES DOCENTE</h3>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">

                    <img src="https://www.espe-innovativa.edu.ec/ambiente/wp-content/uploads/logo-espe-blanco.png" alt="ESPE" width="200">
                    </div>
                    </div>

                </header>

                <div class="app1">

                    <div class="blog-header bg-dark">
                        <div class="nav-scroller">
                            <nav class="nav d-flex justify-content-between">
                                <div class="col-1.5 d-flex justify-content-end align-items-left">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Procesos</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown01">

                                    <router-link class="dropdown-item" :to="{name:'aractividad'}" >Registro de actividades</router-link>

                                    </div>
                                </li>
                                    <a class="p-2 text-white" href="/help">Ayuda</a>
                                </div>
                                <div class="col-4 d-flex justify-content-end align-items-center">
                                    <a class="p-2 text-white" href="/">Inicio</a>
                                    <a class="p-2 text-white" href="#">Salir</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <main class="py-4">

                    </main>
                </div>




        <div class="row">
            <div class="col-md-12">
                <!--{{home}} component is working well-->
            </div>
        </div>
    </div>
</template>
        <style>
            .app1{
              width: 100%;
            }

            .cont{
                width: 100%;
            }
        </style>

<script>
import { user } from '../app';
    export default {
        data() {
            return {

                user_logged:user
            }
        },
        mounted() {
            console.log('Component mounted.');
            }
        };
</script>
