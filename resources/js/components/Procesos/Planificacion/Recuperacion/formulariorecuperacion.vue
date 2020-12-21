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
                                        <h3>Formulario:</h3>
                                        <form @submit.prevent="submit" id="form">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Código</label>
                                                <div class="col-sm-8">
                                                    <input required maxlength="10" class="form-control" type="number" v-model='recuperacion.codigo_rec' id="codigo_rec" name="codigo_rec">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Periodo</label>
                                                <div class="col-sm-8">
                                                    <select required class="form-control custom-select" v-model="recuperacion.codigo_per" name="codigo_per" id="codigo_per">
                                                        <option value="" v-for="data in periodos" value="data.codigo_per">{{ data.nombre_per }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Profesor</label>
                                                <div class="col-sm-8">
                                                    <select required class='form-control custom-select' v-model='recuperacion.codigo_pro' name="codigo_pro" id="codigo_pro">
                                                        <option v-for="data in profesores" value='data.codigo_pro' >{{ data.apellido_pro }} {{ data.nombre_pro }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Materia</label>
                                                <div class="col-sm-8">
                                                    <select required class='form-control custom-select' v-model='recuperacion.codigo_mat' name="codigo_mat" id="codigo_mat">
                                                        <option v-for="data in materias" value='data.codigo_mat' >{{ data.nombre_mat }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Día</label>
                                                <div class="col-sm-8">
                                                    <select required class='form-control custom-select' v-model='recuperacion.codigo_dia' name="codigo_dia" id="codigo_dia">
                                                        <option v-for="data in dias" value='data.codigo_dia' >{{ data.nombre_dia }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Fecha Recuperación</label>
                                                <div class="col-sm-8">
                                                    <input required class="form-control" type="date" v-model='recuperacion.fecha_rec' id="fecha_rec" name="fecha_rec">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Hora Entrada Recuperación</label>
                                                <div class="col-sm-8">
                                                    <input required class="form-control" type="time" v-model='recuperacion.hora_entrada_rec' id="hora_entrada_rec" name="hora_entrada_rec">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Hora Salida Recuperación</label>
                                                <div class="col-sm-8">
                                                    <input required class="form-control" type="time" v-model='recuperacion.hora_salida_rec' id="hora_salida_rec" name="hora_salida_rec">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Fecha Clase Recuperación</label>
                                                <div class="col-sm-8">
                                                    <input required class="form-control" type="date" v-model='recuperacion.fecha_clase_rec' id="fecha_clase_rec" name="fecha_clase_rec">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Hora Inicio Clase Recuperación</label>
                                                <div class="col-sm-8">
                                                    <input  class="form-control" type="time" v-model='recuperacion.hora_inicio_clase_rec' id="hora_inicio_clase_rec" name="hora_inicio_clase_rec">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Hora Fin Clase Recuperación</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="time" v-model='recuperacion.hora_fin_clase_rec' id="hora_fin_clase_rec" name="hora_fin_clase_rec">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Observaciones Recuperación</label>
                                                <div class="col-sm-8">

                                                    <input class="form-control" type="text" v-model='recuperacion.observaciones_rec' id="observaciones_rec" name="observaciones_rec">
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoRecuperacion'}" class="btn btn-link">Listar Recuperación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioRecuperacion'}" class="btn btn-link">Crear Recuperación</router-link>
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
                recuperacion: {
                    codigo_rec:null,
                    codigo_per:null,
                    codigo_pro:null,
                    codigo_mat:null,
                    codigo_dia:null,
                    fecha_rec:null,
                    hora_entrada_rec:null,
                    hora_salida_rec:null,
                    fecha_clase_rec:null,
                    hora_inicio_clase_rec:null,
                    hora_fin_clase_rec:null,
                    observaciones_rec:null
                },
                periodos: [],
                profesores:[],
                dias:[],
                materias:[]
            }
        },
        methods:{
            submit:function(){
                axios.post('/api/recuperaciones', this.recuperacion)
              .then(function (response) {
                 console.log(response.data)
                 window.history.back();
              }.bind(this));
            },
            getPeriodos: function(){
              axios.get('/api/periodos')
              .then(function (response) {
                 this.periodos = response.data;
              }.bind(this));
            },
            getProfesores:function(){
                axios.get('/api/profesores')
              .then(function (response) {
                 this.profesores = response.data;
              }.bind(this));
            },
            getMaterias:function(){
                axios.get('/api/materias')
              .then(function (response) {
                 this.materias = response.data;
              }.bind(this));
            },
            getDias:function(){
                axios.get('/api/dias')
              .then(function (response) {
                 this.dias = response.data;
              }.bind(this));
            }
        },
        mounted() {
        },
        components:{

        },
        created: function(){
            this.getPeriodos(),
            this.getMaterias(),
            this.getProfesores(),
            this.getDias()


        }

        };
</script>
