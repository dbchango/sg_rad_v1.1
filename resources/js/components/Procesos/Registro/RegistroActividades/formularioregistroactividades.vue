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
                                    <h3 class="text-secondary">Formulario:</h3>
                                   <form @submit.prevent="submit">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Profesor</label>
                                            <div class="col-sm-8">
                                                <select required name="codigo_pro" id="codigo_pro" v-model="registro.codigo_pro" class="form-control custom-select">
                                                    <option v-for="data in profesores" :value="data.codigo_pro">{{ data.cedula_pro }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Departamento</label>
                                            <div class="col-sm-8">
                                                <select required name="codigo_dep" id="codigo_dep" v-model="registro.codigo_dep" class="form-control custom-select">
                                                    <option v-for="data in departamentos" :value="data.codigo_dep">{{ data.nombre_dep }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Área</label>
                                            <div class="col-sm-8">
                                                <select required name="codigo_area" id="codigo_area" v-model="registro.codigo_area" class="form-control custom-select">
                                                    <option v-for="data in areas" :value="data.codigo_area">{{ data.nombre_area }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha</label>
                                            <div class="col-sm-8">
                                                <input required v-model="registro.fecha_rac" class="form-control" id="fecha_rac" type="date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tipo Actividad</label>
                                            <div class="col-sm-8">
                                                <select required @click="getActividades()" name="codigo_tact" id="codigo_tact" v-model="registro.codigo_tact" class="form-control custom-select">
                                                    <option v-for="data in tipos_actividades" :value="data.codigo_tact">{{ data.nombre_tact }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Actividad</label>
                                            <div class="col-sm-8">
                                                <select required @click="getTareas()" name="codigo_act" id="codigo_act" v-model="registro.codigo_act" class="form-control custom-select">
                                                    <option v-for="data in actividades" :value="data.codigo_act">{{ data.nombre_act }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Tarea</label>
                                            <div class="col-sm-8">
                                                <select required name="codigo_tar" id="codigo_tar" v-model="registro.codigo_tar" class="form-control custom-select">
                                                    <option v-for="data in tareas" :value="data.codigo_tar">{{ data.nombre_tar }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Comentario</label>
                                            <div class="col-sm-8">
                                                <textarea  v-model="registro.comentario_rac" class="form-control" id="comentario_rac" type="date" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Hora inicio</label>
                                            <div class="col-sm-8">
                                                <input  v-model="registro.hinicio_rac" class="form-control" id="hinicio_rac" type="time" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Hora Fin</label>
                                            <div class="col-sm-8">
                                                <input  v-model="registro.hfin_rac" class="form-control" id="hinicio_rac" type="time" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Hora Registro Actividad</label>
                                            <div class="col-sm-8">
                                                <input  v-model="registro.horas_rac" class="form-control" id="horas_rac" type="decimal" min="1">
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoRegistroActividad'}" class="btn btn-link">Listar Profesor</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioRegistroActividad'}" class="btn btn-link">Crear registro de actividades</router-link>
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
                tareas:[],
                actividades:[],
                profesores:[],
                departamentos:[],
                areas:[],
                tipos_actividades:[],
                registro:{}
            }
        },
        methods:{
            submit:function(){
                axios.post('/api/registrosactividades', this.registro)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }).catch(err=>console.warn(err))
            },
            getActividades:function(){
                axios.get('/api/actividadestact/'.concat(this.registro.codigo_tact))
                .then(function(response){
                    this.actividades = response.data;
                }.bind(this))
                .catch(err=>console.warn(err))
            },
            getTareas:function(){
                axios.get('/api/tareastact/'.concat(this.registro.codigo_act))
                .then(function(response){
                    this.tareas = response.data;
                }.bind(this))
                .catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/departamentos')
                .then(function (response) {
                this.departamentos = response.data;
                }.bind(this));
            axios.get('/api/areas')
                .then(function (response) {
                this.areas = response.data;
                }.bind(this));
            axios.get('/api/tiposactividades')
                .then(function (response) {
                this.tipos_actividades = response.data;
                }.bind(this));

            axios.get('/api/profesores')
                .then(function (response) {
                    this.profesores = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
