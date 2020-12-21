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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ coevaluacion.coe_codigo }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ coevaluacion.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Evaluador</h6>
                                                <p class="card-text text-secondary">{{ coevaluacion.evaluador.apellido_pro }} {{ coevaluacion.evaluador.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Evaluado</h6>
                                                <p class="card-text text-secondary">{{ coevaluacion.evaluado.apellido_pro }} {{ coevaluacion.evaluado.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Observación</h6>
                                                <p class="card-text text-secondary">{{ coevaluacion.coe_observacion }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoAsignarCoevaluador'}" class="btn btn-link">Listar Coevaluaciones</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioAsignarCoevaluador'}" class="btn btn-link">Crear Coevaluaciones</router-link>
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
                coevaluacion:{
                    periodo:{},
                    evaluador:{},
                    evaluado:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/coevaluaciones/'.concat(this.$el.id))
                .then(function (response) {
                    this.coevaluacion = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
