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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ pregunta_ea.pea_codigo }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ pregunta_ea.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Número</h6>
                                                <p class="card-text text-secondary">{{ pregunta_ea.pea_numero }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Nombre</h6>
                                                <p class="card-text text-secondary">{{ pregunta_ea.pea_nombre }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoPreguntasEvaluacionAdministrativa'}" class="btn btn-link">Listar Preguntas Evaluación Administrativa</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioPreguntasEvaluacionAdministrativa'}" class="btn btn-link">Crear Preguntas Evaluación Administrativa</router-link>
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
                pregunta_ea:{
                    periodo:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/preguntaseadministrativas/'.concat(this.$el.id), this.pregunta_ea)
                .then(function(response){
                    this.pregunta_ea = response.data
                }.bind(this)).catch(err=>console.warn(err))

        },
        components:{

        },
        created: function(){

        },

        };
</script>
