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
                                                    <select required class='form-control custom-select' v-model='materia.codigo_per' name="codigo_per" id="codigo_per">
                                                        <option v-for="data in periodos" :value='data.codigo_per' >{{ data.nombre_per }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">NRC</label>
                                                <div class="col-sm-8">
                                                    <input required type="text" v-model="materia.ncr_mat" name="nrc_mat" class="form-control" id="nrc_mat" placeholder="NRC">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Materia</label>
                                                <div class="col-sm-8">
                                                    <input required type="text" v-model="materia.nombre_mat" name="nombre_mat" class="form-control" id="nombre_mat" placeholder="Materia">
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
                                        <router-link style="color: #CE5202" :to="{name:'ListaMateria'}" class="btn btn-link">Listar Materia</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioMateria'}" class="btn btn-link">Crear Materia</router-link>
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
                materia:{},
                periodos:[],
                materias: []
            }
        },
        methods:{
            submit: function(){
              axios.put('/api/materias/'.concat(this.$el.id), this.materia)
              .then(function (response) {
                    console.log(response)
                    this.materia = {};
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err));
            }
        },
        mounted() {
            axios.get('/api/materias/'.concat(this.$el.id)).then(function(response){
                this.materia = response.data;
            }.bind(this)).catch(err=>console.warn(err));
            axios.get('/api/periodos')
              .then(function (response) {
                 this.periodos = response.data;
              }.bind(this)).catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){


        },

        };
</script>
