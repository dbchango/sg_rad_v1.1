<template>
    <div>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!--Formulario-->
                    <div class="row">
                            <div class="col-md mb-2">
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div class="col">
                                        <h3 class="text-secondary">Editar registro N°: &nbsp;<a>{{ $route.params.id }}</a></h3>
                                        <form @submit.prevent="submit">
                                         <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Actividad</label>
                                                    <div class="col-sm-8">
                                                        <select v-model="tarea.codigo_act" name="codigo_act" id="codigo_act" class="form-control custom-select">
                                                            <option v-for="data in actividades" :value="data.codigo_act">{{ data.nombre_act }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nombre Tarea</label>
                                                    <div class="col-sm-8">
                                                        <input v-model="tarea.nombre_tar" class="form-control" id="nombre_tar" type="text">
                                                    </div>
                                                </div>
                                        <div class="form-group row mx-auto">
                                            <button type="submit" value="submit" class="btn btn-outline-dark mt-2">Guardar&nbsp;<i class="fas fa-save"></i></button>
                                        </div>
                                    </form>
                                    </div>
                                </li>
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
                actividades:[],
                tarea:{}
            }
        },
        methods:{
            submit: function(){
                axios.put('/api/tareas/'.concat(this.$el.id), this.tarea)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/tareas/'.concat(this.$el.id), this.pregunta_ea)
                .then(function(response){
                    this.tarea = response.data
                }.bind(this)).catch(err=>console.warn(err))
            axios.get('/api/actividades')
                .then(function (response) {
                    this.actividades = response.data;
                }.bind(this)).catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){



        }

        };
</script>
