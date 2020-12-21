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
                                                    <label class="col-sm-4 col-form-label">Cédula:</label>
                                                    <div class="col-sm-8">
                                                        <input required maxlength="10" v-model="profesor.cedula_pro" class="form-control" id="cedula_pro" placeholder="Cedula">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nombres:</label>
                                                    <div class="col-sm-8">
                                                        <input required v-model="profesor.nombre_pro" class="form-control" id="nombre_pro" placeholder="Nombres">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Apellidos:</label>
                                                    <div class="col-sm-8">
                                                        <input required v-model="profesor.apellido_pro" class="form-control" id="nombre_pro" placeholder="Apellidos">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Nombre de usuario:</label>
                                                    <div class="col-sm-8">
                                                        <input required v-model="profesor.miespe_pro" class="form-control" id="miespe_pro" placeholder="Usuario MiEspe">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Email:</label>
                                                    <div class="col-sm-8">
                                                        <input required v-model="profesor.email_pro" class="form-control" id="email_pro" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Departamento:</label>
                                                    <div class="col-sm-8">
                                                        <select required v-model="profesor.codigo_dep" class='form-control' name="" id="codigo_dep">
                                                            <option v-for="data in departamentos" :value="data.codigo_dep">{{ data.nombre_dep }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-4 col-form-label">Área de conocimientos:</label>
                                                    <div class="col-sm-8">
                                                        <select required v-model="profesor.cod_area" class='form-control' name="" id="codigo_area">
                                                            <option v-for="data in areas" class='form-control' :value="data.codigo_area">{{ data.nombre_area }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Dedicación:</label>
                                                    <div class="col-sm-8">
                                                        <select required v-model="profesor.ded_codigo" class='form-control' name="ded_codigo" id="ded_codigo">
                                                            <option v-for="data in dedicaciones" :value="data.ded_codigo">{{ data.ded_nombre}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Director:</label>
                                                    <div class="col-sm-8">
                                                        <input required type="checkbox" class='form-control' v-model="profesor.director_pro">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Jefe de área:</label>
                                                    <div class="col-sm-8">
                                                        <input required type="checkbox" class='form-control' v-model="profesor.jarea_pro">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Estado:</label>
                                                    <div class="col-sm-8">
                                                        <input required type="checkbox" class='form-control' v-model="profesor.estado_pro">

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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoProfesor'}" class="btn btn-link">Listar Profesor</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioProfesor'}" class="btn btn-link">Crear Profesor</router-link>
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
                dedicaciones:[],
                profesor:{

                },
                departamentos:[],
                areas:[]
            }
        },
        methods:{
            submit: function(page){
                axios.post('/api/profesores', this.profesor).then(function(response){
                    console.log(response.data)
                    window.history.back();
                }).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/dedicaciones')
                .then(function (response) {
                    this.dedicaciones = response.data;
                }.bind(this));
            axios.get('/api/departamentos')
                .then(function (response) {
                    this.departamentos = response.data;
                }.bind(this));
            axios.get('/api/areas')
                .then(function (response) {
                    this.areas = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){

        }
    };
</script>
