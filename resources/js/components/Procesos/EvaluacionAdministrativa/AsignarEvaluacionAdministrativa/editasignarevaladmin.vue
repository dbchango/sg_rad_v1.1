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
                                                <select required name="codigo_per" id="codigo_per" v-model="evaluacion_adm.codigo_per" class="form-control custom-select">
                                                    <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Evaluador</label>
                                            <div class="col-sm-8">
                                                <select required class="form-control custom-select" v-model="evaluacion_adm.codigo_pro_evaluador" name="codigo_pro_evaluador" id="codigo_pro_evaluador">
                                                    <option  v-for="data in profesores" :value="data.codigo_pro" >{{ data.apellido_pro }} {{ data.nombre_pro }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Evaluado</label>
                                            <div class="col-sm-8">
                                                <select required class="form-control custom-select" v-model="evaluacion_adm.codigo_pro_evaluado" name="codigo_pro_evaluado" id="codigo_pro_evaluado">
                                                    <option  v-for="data in profesores" :value="data.codigo_pro" >{{ data.apellido_pro }} {{ data.nombre_pro }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Observación</label>
                                            <div class="col-sm-8">
                                                <textarea v-model="evaluacion_adm.cea_observacion" class="form-control" name="" id="" cols="30" rows="10"></textarea>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoAsignarEvalAdm'}" class="btn btn-link">Listar Evaluaciones Administrativas</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioAsignarEvalAdm'}" class="btn btn-link">Crear Evaluación Administrativa</router-link>
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
                evaluacion_adm: {},
                periodos: [],
                profesores:[],
            }
        },
        methods:{
            submit: function(){
                axios.put('/api/eadministrativas/'.concat(this.$el.id), this.evaluacion_adm)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/eadministrativas/'.concat(this.$el.id))
                .then(function (response) {
                    this.evaluacion_adm = response.data;
                }.bind(this));
            axios.get('/api/periodos')
                .then(function (response) {
                    this.periodos = response.data;
                }.bind(this));
            axios.get('/api/profesores')
                .then(function (response) {
                    this.profesores = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){



        }

        };
</script>
