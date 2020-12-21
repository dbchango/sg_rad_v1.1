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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ horario.codigo_hor }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ horario.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Profesor</h6>
                                                <p class="card-text text-secondary">{{ horario.profesor.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Materia</h6>
                                                <p class="card-text text-secondary">{{ horario.materia.nombre_mat }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Fecha Recuperación</h6>
                                                <p class="card-text text-secondary">{{ horario.recuperacion.fecha_rec }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Día</h6>
                                                <p class="card-text text-secondary">{{ horario.dia.nombre_dia }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora Entrada</h6>
                                                <p class="card-text text-secondary">{{ horario.ncr_mat }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora Salida</h6>
                                                <p class="card-text text-secondary">{{ horario.hora_entrada_hor }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Número de horas</h6>
                                                <p class="card-text text-secondary">{{ horario.hora_salida_hor }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoHorario'}" class="btn btn-link">Listar Horario</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioHorario'}" class="btn btn-link">Crear Horario</router-link>
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
                horario:{
                    periodo:{},
                    profesor:{},
                    materia:{},

                    recuperacion:{},


                    dia:{}

                },
            }
        },
        methods:{

        },
        mounted() {
            console.warn(this.$el.id)
            axios.get('/api/horarios/'.concat(this.$el.id))
                .then(function (response) {
                    this.horario = response.data;
                    console.warn(response.data)
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
