<template>
    <div>
        <div class="container-fluid">
            <div class="row">

                <div class="col">
                    <div class="row">
                        <div class="col">
                             <!--Card-->
                            <div class="row">
                                <div class="col-md mb-2">
                                    <div class="card text-black   mb-3" style="max-width: auto;">
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ calificacion.cco_codigo }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ calificacion.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Nombre</h6>
                                                <p class="card-text text-secondary">{{ calificacion.cco_nombre }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Valor</h6>
                                                <p class="card-text text-secondary">{{ calificacion.cco_valor }}</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!--Opciones-->
                        <div class="col-3">
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
                                    <div>
                                        <h6 style="color: #FFF" class="my-0">Operaciones</h6>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'ListadoCalificacionesCoevaluacion'}" class="btn btn-link">Listar Calificación Coevaluación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioCalificacionesCoevaluacion'}" class="btn btn-link">Crear Calificación Coevaluación</router-link>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                home: 'HOME',
                calificacion:{
                    periodo:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/calificacionescoevaluaciones/'.concat(this.$el.id)).then(function(response){
                this.calificacion = response.data;
            }.bind(this)).catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
