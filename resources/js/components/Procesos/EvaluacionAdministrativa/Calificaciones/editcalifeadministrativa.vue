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
                                                <select required name="codigo_per" id="codigo_per" v-model="calificacion.codigo_per" class="form-control custom-select">
                                                    <option :value="null"></option>
                                                    <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nombre</label>
                                            <div class="col-sm-8">
                                                <input required v-model="calificacion.cea_nombre" class="form-control" id="cea_nombre" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Valor</label>
                                            <div class="col-sm-8">
                                                <input required  v-model="calificacion.cea_valor" class="form-control" id="cea_valor" type="decimal" >
                                            </div>
                                        </div>
                                        <div class="form-group row mx-auto">
                                            <button type="submit" class="btn btn-outline-dark mt-2">Guardar&nbsp;<i class="fas fa-save"></i></button>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoCalificacionesEvaluacionAdministrativa'}" class="btn btn-link">Listar Calificaciones Evaluación Administrativa</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioCalificacionesEvaluacionAdministrativa'}" class="btn btn-link">Crear Calificaciones Evaluación Administrativa</router-link>
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
                calificacion: {},
                periodos: []

            }
        },
        methods:{
            submit: function(){
                axios.put('/api/calificacioneseadministrativas/'.concat(this.$el.id), this.calificacion)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/calificacioneseadministrativas/'.concat(this.$el.id)).then(function(response){
                this.calificacion = response.data;
            }.bind(this)).catch(err=>console.warn(err));
            axios.get('/api/periodos')
                .then(function (response) {
                    this.periodos = response.data;
                }.bind(this)).catch(err=>console.warn(err));

        },
        components:{

        },
        created: function(){



        }

        };
</script>
