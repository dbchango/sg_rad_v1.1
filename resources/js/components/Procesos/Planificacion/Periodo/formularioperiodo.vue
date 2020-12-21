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

                                        <form @submit.prevent="submit">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Periodo</label>
                                                <div class="col-sm-8">
                                                    <input required v-model="periodo.nombre_per" name="nombre_per" class="form-control" id="nombre_per" placeholder="Nombre del periodo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Activo</label>
                                                <div class="col-sm-8">
                                                    <select required class='form-control custom-select' v-model='periodo.activo_per' name="nombre_per" id="nombre_per">
                                                        <option :value='false' >Inactivo</option>
                                                        <option :value='true' >Activo</option>
                                                    </select>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoPeriodo'}" class="btn btn-link">Listar Periodo</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'Formularioeriodo'}" class="btn btn-link">Crear Periodo</router-link>
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
                periodo: {
                    nombre_per:null,
                    activo_per:null
                },
                periodos: []
            }
        },
        methods:{
            getPeriodos: function(){
              axios.get('/api/periodos')
              .then(function (response) {
                 this.periodos = response.data;
              }.bind(this));
            },
            submit: function(){
                axios.post('/api/periodos', this.periodo)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this))
                .catch((error) => {
                    console.warn(error);
                });
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        components:{

        },
        created: function(){
            this.getPeriodos()

        }

        };
</script>
