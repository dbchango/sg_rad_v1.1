<template>
    <div>


            <div class="container-fluid">
            <div class="row">

                <div class="col">
                    <div class="row">
                        <div class="col">

                            <div class="row">
                                <div class="col-md mb-2">
                                    <div class="card text-black   mb-3" style="max-width: auto;">
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ actividad.codigo_act }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Tipo actividad</h6>
                                                <p class="card-text text-secondary">{{ actividad.tipo.nombre_tact }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Actividad</h6>
                                                <p class="card-text text-secondary">{{ actividad.nombre_act }}</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
                                    <div>
                                        <h6 style="color: #FFF" class="my-0">Operaciones</h6>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'ListadoActividades'}" class="btn btn-link">Listar Preguntas Actividades</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioActividades'}" class="btn btn-link">Crear Preguntas Actividades</router-link>
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
                actividad:{
                    tipo:{}
                }
            }
        },
        methods:{

        },
        mounted() {

            axios.get('/api/actividades/'.concat(this.$el.id), this.actividad)
                .then(function(response){
                    console.warn(response)
                    this.actividad = response.data
                }.bind(this)).catch(err=>console.warn(err))

        },
        components:{

        },
        created: function(){

        },

        };
</script>
