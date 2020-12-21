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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ area.codigo_area }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Area</h6>
                                                <p class="card-text text-secondary">{{ area.nombre_area }}</p>
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
                area:{

                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/areas/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.area=response.data
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
