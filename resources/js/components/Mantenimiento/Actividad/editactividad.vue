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
                                            <label class="col-sm-4 col-form-label">Periodo</label>
                                            <div class="col-sm-8">
                                                <select required name="codigo_per" id="codigo_per" v-model="actividad.codigo_tact" class="form-control custom-select">
                                                    <option :value="null" selected></option>
                                                    <option v-for="data in tiposactividades" :value="data.codigo_tact">{{ data.nombre_tact }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Actividad</label>
                                            <div class="col-sm-8">
                                                <input required v-model="actividad.nombre_act" class="form-control" id="nombre_act" type="text" min="1">
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
                tiposactividades:[],
                actividad:{}
            }
        },
        methods:{
            submit: function(){
                axios.put('/api/actividades/'.concat(this.$el.id), this.actividad)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/actividades/'.concat(this.$el.id), this.actividad)
                .then(function(response){
                    this.actividad = response.data
                }.bind(this)).catch(err=>console.warn(err))
            axios.get('/api/tiposactividades')
                .then(function (response) {
                    this.tiposactividades = response.data;
                }.bind(this)).catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){



        }

        };
</script>
