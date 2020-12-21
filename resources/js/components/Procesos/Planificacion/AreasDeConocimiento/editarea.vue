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
                                                <label class="col-sm-4 col-form-label">Area</label>
                                                <div class="col-sm-8">
                                                    <input required type="text" class="form-control" id="nombre_area" placeholder="Nombre" v-model="area.nombre_area">
                                                </div>
                                            </div>

                                            <div class="form-group row">
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoAreasConocimiento'}" class="btn btn-link">Listar Área</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioAreasConocimiento'}" class="btn btn-link">Crear Área</router-link>
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
                area:{},
            }
        },
        methods:{
            submit:function(){
                axios.put('/api/areas/'.concat(this.$el.id), this.area)
                .then(function(response){
                    this.area = {};
                    window.history.back();
                }.bind(this))
                .catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/areas/'.concat(this.$el.id))
              .then(function (response) {
                 this.area = response.data;
              }.bind(this))
              .catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
