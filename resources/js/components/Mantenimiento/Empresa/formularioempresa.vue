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
                                            <label class="col-sm-4 col-form-label">Empresa</label>
                                            <div class="col-sm-8">
                                                <input required v-model="empresa.nombre_emp" class="form-control" id="nombre_emp" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Límite Acceso</label>
                                            <div class="col-sm-8">
                                                <input v-model="empresa.limite_acceso_emp" class="form-control" id="limite_acceso_emp" type="number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Empresa Firma Encargado</label>
                                            <div class="col-sm-8">
                                                <input v-model="empresa.emp_firma_encargado" class="form-control" id="emp_firma_encargado" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Empresa Pie Encargado</label>
                                            <div class="col-sm-8">
                                                <input v-model="empresa.emp_pie_encargado" class="form-control" id="emp_pie_encargado" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Empresa Firma Subdirector</label>
                                            <div class="col-sm-8">
                                                <input v-model="empresa.emp_firma_subdirector" class="form-control" id="emp_firma_subdirector" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Empresa Pie Subdirector</label>
                                            <div class="col-sm-8">
                                                <input v-model="empresa.emp_pie_subdirector" class="form-control" id="emp_pie_subdirector" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row mx-auto">
                                            <button type="submit" value="submit" class="btn btn-outline-dark mt-2">Guardar&nbsp;<i class="fas fa-search"></i></button>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoEmpresas'}" class="btn btn-link">Listar Empresa</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioEmpresas'}" class="btn btn-link">Crear Empresa</router-link>
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
                    empresa:{
                    nombre_emp:null,
                    limite_acceso_emp:null,
                    emp_firma_encargado:null,
                    emp_pie_encargadO:null,
                    emp_firma_subdirector:null,
                    emp_pie_subdirector:null
                }
            }
        },
        methods:{
            submit:function(){
                axios.post('/api/empresas', this.empresa)
                .then(function (response) {
                    console.log(response.data)
                    window.history.back();
                }.bind(this));
            }



        },
        mounted() {
            console.log('Component mounted.');
        },
        components:{

        },
        created: function(){

        },

        };
</script>
