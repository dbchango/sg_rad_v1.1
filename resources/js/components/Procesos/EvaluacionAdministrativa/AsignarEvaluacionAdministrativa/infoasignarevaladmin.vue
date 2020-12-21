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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ evaluacion_adm.cea_codigo }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ evaluacion_adm.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Evaluador</h6>
                                                <p class="card-text text-secondary">{{ evaluacion_adm.evaluador.apellido_pro }} {{ evaluacion_adm.evaluador.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Evaluado</h6>
                                                <p class="card-text text-secondary">{{ evaluacion_adm.evaluado.apellido_pro }} {{ evaluacion_adm.evaluado.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Observación</h6>
                                                <p class="card-text text-secondary">{{ evaluacion_adm.cea_observacion }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoAsignarEvalAdm'}" class="btn btn-link">Listar Evaluaciones Administrativas</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioAsignarEvalAdm'}" class="btn btn-link">Crear Evaluación Administrativa</router-link>
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
                evaluacion_adm:{
                    periodo:{},
                    evaluador:{},
                    evaluado:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/eadministrativas/'.concat(this.$el.id))
                .then(function (response) {
                    this.evaluacion_adm = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
