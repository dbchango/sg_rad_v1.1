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
                                            <label class="col-sm-4 col-form-label">Pregunta 1</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta01" name="cea_pregunta01" id="cea_pregunta01">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 2</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta02" name="cea_pregunta02" id="cea_pregunta02">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 3</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta03" name="cea_pregunta03" id="cea_pregunta03">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 4</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta04" name="cea_pregunta04" id="cea_pregunta04">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 5</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta05" name="cea_pregunta05" id="cea_pregunta05">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 6</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta06" name="cea_pregunta06" id="cea_pregunta06">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 7</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta07" name="cea_pregunta07" id="cea_pregunta07">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 8</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta08" name="cea_pregunta08" id="cea_pregunta08">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 9</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta09" name="cea_pregunta09" id="cea_pregunta09">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 10</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta10" name="cea_pregunta10" id="cea_pregunta10">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 11</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta10" name="cea_pregunta11" id="cea_pregunta11">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 13</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta13" name="cea_pregunta13" id="cea_pregunta13">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 14</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta14" name="cea_pregunta14" id="cea_pregunta14">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 15</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta10" name="cea_pregunta15" id="cea_pregunta15">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 16</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta16" name="cea_pregunta16" id="cea_pregunta16">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 17</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta17" name="cea_pregunta17" id="cea_pregunta17">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 18</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta18" name="cea_pregunta18" id="cea_pregunta18">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 19</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta19" name="cea_pregunta19" id="cea_pregunta19">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 20</label>
                                            <div class="col-sm-8">
                                                <select class="form-control custom-select" v-model="evaluacion_adm.cea_pregunta20" name="cea_pregunta20" id="cea_pregunta20">
                                                    <option  v-for="data in calificaciones" :value="data.cea_valor" > {{ data.cea_nombre }} </option>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoEvalAdministrativa'}" class="btn btn-link">Listar Evaluaciones Administrativas</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioEvalAdministrativa'}" class="btn btn-link">Crear Evaluación Administrativa</router-link>
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
                calificaciones:[]
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
            axios.get('/api/calificacioneseadministrativas/'.concat(this.$el.id))
                .then(function (response) {
                    this.calificaciones = response.data;
                }.bind(this));
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
