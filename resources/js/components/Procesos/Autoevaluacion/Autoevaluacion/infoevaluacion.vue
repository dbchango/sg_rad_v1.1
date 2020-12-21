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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ autoevaluacion.cau_codigo }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Fecha</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_fecha }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Profesor</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.profesor.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Promedio</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_promedio }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 1</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta01 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 2</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta02 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 3</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta03 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 4</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta04 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 5</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta05 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 6</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta06 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 7</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta07 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 8</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta08 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 9</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta09 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 10</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta10 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 11</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta11 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 12</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta12 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 13</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta13 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 14</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta14 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 15</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta15 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 16</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta16 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 17</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta17 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 18</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta18 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 19</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta19 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Pregunta 20</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_pregunta20 }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Observación</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_observacion }}</p>
                                            </div>

                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Promedio</h6>
                                                <p class="card-text text-secondary">{{ autoevaluacion.cau_promedio }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoAutoevaluaciones'}" class="btn btn-link">Listar Autoevaluación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioAutoevaluaciones'}" class="btn btn-link">Crear Autoevaluación</router-link>
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

                autoevaluacion:{
                        periodo:{},
                        profesor:{}
                    }
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/autoevaluaciones/'.concat(this.$el.id))
                .then(function (response) {
                    this.autoevaluacion = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
