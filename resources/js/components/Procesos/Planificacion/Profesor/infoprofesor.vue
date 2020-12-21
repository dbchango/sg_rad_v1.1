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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ profesor.codigo_pro }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Cédula</h6>
                                                <p class="card-text text-secondary">{{ profesor.cedula_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Usuario</h6>
                                                <p class="card-text text-secondary">{{ profesor.miespe_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Nombres</h6>
                                                <p class="card-text text-secondary">{{ profesor.nombre_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Apellidos</h6>
                                                <p class="card-text text-secondary">{{ profesor.apellido_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">e-mail</h6>
                                                <p class="card-text text-secondary">{{ profesor.email_pro }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Departamento</h6>
                                                <p class="card-text text-secondary">{{ profesor.departamento.nombre_dep }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Área</h6>
                                                <p class="card-text text-secondary">{{ profesor.area.nombre_area }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Estado</h6>
                                                <p v-if="profesor.estado_pro" class="card-text text-secondary">Activo</p>
                                                <p v-else class="card-text text-secondary">Inactivo</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Director</h6>
                                                <p v-if="profesor.director_pro" class="card-text text-secondary">Si</p>
                                                <p v-else class="card-text text-secondary">No</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Jefe de area</h6>
                                                <p v-if="profesor.jarea_pro" class="card-text text-secondary">Si</p>
                                                <p v-else class="card-text text-secondary">No</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Dedicación</h6>
                                                <p class="card-text text-secondary">{{ profesor.dedicacion.ded_nombre }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoAreasConocimiento'}" class="btn btn-link">Listar Área</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioAreasConocimiento'}" class="btn btn-link">Crear Área</router-link>
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
                profesor:{
                    departamento:{},
                    area:{},
                    dedicacion:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/profesores/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.profesor=response.data
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
