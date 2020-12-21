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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ tarea.codigo_tar }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Actividad</h6>
                                                <p class="card-text text-secondary">{{ tarea.actividad.nombre_act }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Tarea</h6>
                                                <p class="card-text text-secondary">{{ tarea.nombre_tar }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoTareas'}" class="btn btn-link">Listar Tareas</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioTareas'}" class="btn btn-link">Crear Tareas</router-link>
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
                tarea:{
                    actividad:{}
                },
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/tareas/'.concat(this.$el.id), this.tarea)
                .then(function(response){
                    this.tarea = response.data
                }.bind(this)).catch(err=>console.warn(err))

        },
        components:{

        },
        created: function(){

        },

        };
</script>
