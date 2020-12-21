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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ registro.codigo_pro }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Profesor</h6>
                                                <p class="card-text text-secondary">{{ registro.profesor.apellido_pro }} {{ registro.profesor.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Departamento</h6>
                                                <p class="card-text text-secondary">{{ registro.departamento.nombre_dep }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Area</h6>
                                                <p class="card-text text-secondary">{{ registro.area.nombre_area }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Fecha de registro</h6>
                                                <p class="card-text text-secondary">{{ registro.fecha_rac }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Tipo de actividad</h6>
                                                <p class="card-text text-secondary">{{ registro.tipo.nombre_tact }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Actividad</h6>
                                                <p class="card-text text-secondary">{{ registro.actividad.nombre_act }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Tarea</h6>
                                                <p class="card-text text-secondary">{{ registro.tarea.nombre_tar }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Comentario</h6>
                                                <p class="card-text text-secondary">{{ registro.comentario_rac }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora inicio</h6>
                                                <p class="card-text text-secondary">{{ registro.hinicio_rac }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Hora fin</h6>
                                                <p class="card-text text-secondary">{{ registro.hfin_rac }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Horas</h6>
                                                <p class="card-text text-secondary">{{ registro.horas_rac }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoRegistroActividad'}" class="btn btn-link">Listar Profesor</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioRegistroActividad'}" class="btn btn-link">Crear registro de actividades</router-link>
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
                registro:{
                    departamento:{},
                    area:{},
                    tipo:{},
                    actividad:{},
                    tarea:{},
                    profesor:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/registrosactividades/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.registro=response.data
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
