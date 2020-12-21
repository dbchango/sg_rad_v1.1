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
                                            <label class="col-sm-4 col-form-label">Tipo Actividad</label>
                                            <div class="col-sm-8">
                                                <select required name="codigo_tact" id="codigo_tact" v-model="actividad.codigo_tact" class="form-control custom-select">
                                                    <option v-for="data in tipos_actividades" :value="data.codigo_tact">{{ data.nombre_tact }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Actividad</label>
                                            <div class="col-sm-8">
                                                <input  required v-model="actividad.nombre_act" class="form-control" id="nombre_act" type="text" >
                                            </div>
                                        </div>
                                        <div class="form-group row mx-auto">
                                            <button type="submit"  class="btn btn-outline-dark mt-2">Guardar&nbsp;<i class="fas fa-save"></i></button>
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
                home: 'HOME',
                tipos_actividades:[],
                actividad:{}
            }
        },
        methods:{
            submit:function(){
                axios.post('/api/actividades', this.actividad)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/tiposactividades')
                .then(function (response) {
                    this.tipos_actividades = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
