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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ recuperacion.codigo_pro }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Profesor</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.profesor.cedula_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Materia</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.materia.nombre_mat }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Día</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.dia.nombre_dia }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Fecha recuperación</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.fecha_rec }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora entrada recuperación</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.hora_entrada_rec }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora salida recuperación</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.hora_salida_rec }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Fecha clase recuperación</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.fecha_clase_rec }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora inicio clase de recuperación</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.hora_inicio_clase_rec }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora fin clase de recuperación</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.hora_fin_clase_rec }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Observaciones</h6>
                                                <p class="card-text text-secondary">{{ recuperacion.observaciones_rec }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoRecuperacion'}" class="btn btn-link">Listar Recuperación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioRecuperacion'}" class="btn btn-link">Crear Recuperación</router-link>
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
                recuperacion:{
                    periodo:{},
                    profesor:{},
                    materia:{},
                    dia:[]
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/recuperaciones/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.recuperacion=response.data
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
