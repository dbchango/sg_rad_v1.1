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
                                                <select required name="codigo_per" id="codigo_per" v-model="coevaluacion.codigo_per" class="form-control custom-select">
                                                    <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Evaluador</label>
                                            <div class="col-sm-8">
                                                <select required class="form-control custom-select" v-model="coevaluacion.codigo_pro_evaluador" name="codigo_pro_evaluador" id="codigo_pro_evaluador">
                                                    <option  v-for="data in profesores" :value="data.codigo_pro" >{{ data.apellido_pro }} {{ data.nombre_pro }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Evaluado</label>
                                            <div class="col-sm-8">
                                                <select required class="form-control custom-select" v-model="coevaluacion.codigo_pro_evaluado" name="codigo_pro_evaluado" id="codigo_pro_evaluado">
                                                    <option  v-for="data in profesores" :value="data.codigo_pro" >{{ data.apellido_pro }} {{ data.nombre_pro }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 1</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta01" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 2</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta02" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 3</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta03" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 4</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta04" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 5</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta05" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 6</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta06" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 7</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta07" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 8</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta08" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 9</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta09" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 10</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta10" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 11</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta11" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 12</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta12" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 13</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta13" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 14</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta14" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 15</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta15" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 16</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta16" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 17</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta17" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 18</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta18" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 19</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta19" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 20</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="coevaluacion.coe_pregunta20" class="form-control">
                                                    <option v-for="data in calificaciones" :value="data.cco_valor">{{ data.cco_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Observación</label>
                                            <div class="col-sm-8">
                                                <textarea v-model="coevaluacion.cea_observacion" class="form-control" name="" id="" cols="30" rows="10"></textarea>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoCoevaluaciones'}" class="btn btn-link">Listar Coevaluaciones</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioCoevaluaciones'}" class="btn btn-link">Crear Coevaluaciones</router-link>
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
                coevaluacion: {},
                periodos: [],
                profesores:[],
                calificaciones:[]
            }
        },
        methods:{
            submit: function(){
                axios.put('/api/coevaluaciones/'.concat(this.$el.id), this.coevaluacion)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/coevaluaciones/'.concat(this.$el.id))
                .then(function (response) {
                    this.coevaluacion = response.data;
                }.bind(this));
            axios.get('/api/periodos')
                .then(function (response) {
                    this.periodos = response.data;
                }.bind(this));
            axios.get('/api/profesores')
                .then(function (response) {
                    this.profesores = response.data;
                }.bind(this));
            axios.get('/api/calificacionescoevaluaciones')
                .then(function (response) {
                    this.calificaciones = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){



        }

        };
</script>
