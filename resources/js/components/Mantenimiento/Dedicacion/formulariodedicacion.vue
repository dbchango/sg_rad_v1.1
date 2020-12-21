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
                                            <label class="col-sm-4 col-form-label">Dedicación</label>
                                            <div class="col-sm-8">
                                                <input required v-model="dedicacion.ded_nombre" class="form-control" id="ded_nombre" type="text">
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoDedicaciones'}" class="btn btn-link">Listar Dedicación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioDedicaciones'}" class="btn btn-link">Crear Dedicación</router-link>
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

                dedicacion:{
                }
            }
        },
        methods:{
            submit:function(){
                axios.post('/api/dedicaciones', this.dedicacion)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this))
                .catch(err=>console.log(err))
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
