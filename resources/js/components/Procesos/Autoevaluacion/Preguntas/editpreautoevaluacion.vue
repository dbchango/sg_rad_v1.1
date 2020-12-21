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
                                                <select required name="codigo_per" id="codigo_per" v-model="pregunta.codigo_per" class="form-control custom-select">
                                                    <option :value="null" selected></option>
                                                    <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Número</label>
                                            <div class="col-sm-8">
                                                <input required v-model="pregunta.pau_numero" class="form-control" id="pau_numero" type="number" min="1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nombre</label>
                                            <div class="col-sm-8">
                                                <input required  v-model="pregunta.pau_nombre" class="form-control" id="pau_nombre" type="text" placeholder="Nombre">
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoPregAutoevaluaciones'}" class="btn btn-link">Listar Preguntas Autoevaluación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioPregAutoevaluaciones'}" class="btn btn-link">Crear Preguntas Autoevaluación</router-link>
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
                periodos:[],
                pregunta:{}
            }
        },
        methods:{
            submit: function(){
                axios.put('/api/preguntasautoevaluaciones/'.concat(this.$el.id), this.pregunta)
                .then(function(response){
                    console.log(response.data)
                    window.location.href = "/listadopregautoevals";
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/preguntasautoevaluaciones/'.concat(this.$el.id), this.pregunta)
                .then(function(response){
                    this.pregunta = response.data
                }.bind(this)).catch(err=>console.warn(err))
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
