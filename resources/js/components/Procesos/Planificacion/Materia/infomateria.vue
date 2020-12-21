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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ materia.codigo_mat }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Materia</h6>
                                                <p class="card-text text-secondary">{{ materia.nombre_mat }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Periodo</h6>
                                                <p class="card-text text-secondary">{{ materia.periodo.nombre_per }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">NRC</h6>
                                                <p class="card-text text-secondary">{{ materia.ncr_mat }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListaMateria'}" class="btn btn-link">Listar Materia</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioMateria'}" class="btn btn-link">Crear Materia</router-link>
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
                materia:{
                    codigo_mat:null,
                    codigo_per:null,
                    ncr_mat:null,
                    nombre_mat:null,
                    periodo:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/materias/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.materia=response.data
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
