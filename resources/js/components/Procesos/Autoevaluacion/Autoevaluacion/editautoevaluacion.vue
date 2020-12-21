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
                                                <select required name="codigo_per" id="codigo_per" v-model="autoevaluacion.codigo_per" class="form-control custom-select">
                                                    <option :value="null" selected></option>
                                                    <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Profesor</label>
                                            <div class="col-sm-8">
                                                <select required name="codigo_per" id="codigo_per" v-model="autoevaluacion.codigo_pro" class="form-control custom-select">
                                                    <option :value="null" selected></option>
                                                    <option v-for="data in profesores" :value="data.codigo_pro">{{ data.nombre_pro }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 1</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta01" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 2</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta02" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 3</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta03" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 4</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta04" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 5</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta05" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 6</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta06" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 7</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta07" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 8</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta08" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 9</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta09" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 10</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta10" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 11</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta11" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 12</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta12" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 13</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta13" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 14</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta14" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 15</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta15" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 16</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta16" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 17</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta17" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 18</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta18" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 19</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta19" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Pregunta 20</label>
                                            <div class="col-sm-8">
                                                <select name="codigo_per" id="codigo_per" v-model="autoevaluacion.cau_pregunta20" class="form-control custom-select">
                                                    <option v-for="data in calificaciones" :value="data.cau_valor">{{ data.cau_nombre }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Observación</label>
                                            <div class="col-sm-8">
                                                <input  v-model="autoevaluacion.cau_observacion" class="form-control" id="cau_valor" type="text" >
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoAutoevaluaciones'}" class="btn btn-link">Listar Autoevaluación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioAutoevaluaciones'}" class="btn btn-link">Crear Autoevaluación</router-link>
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
                autoevaluacion: {},
                periodos: [],
                profesores:[],
                calificaciones:[]
            }
        },
        methods:{
            submit: function(){
                axios.put('/api/autoevaluaciones/'.concat(this.$el.id), this.autoevaluacion)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/autoevaluaciones/'.concat(this.$el.id))
                .then(function (response) {
                    this.autoevaluacion = response.data;
                }.bind(this));
            axios.get('/api/periodos')
                .then(function (response) {
                    this.periodos = response.data;
                }.bind(this));
            axios.get('/api/profesores')
                .then(function (response) {
                    this.profesores = response.data;
                }.bind(this));
            axios.get('/api/calificacionesautoevaluaciones')
                .then(function(response){
                    this.calificaciones = response.data
                }.bind(this))
                .catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){



        }

        };
</script>
