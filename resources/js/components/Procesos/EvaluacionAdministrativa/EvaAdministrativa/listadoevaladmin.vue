<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <!--Filtro de busqueda-->
                            <div class="row">
                                <div class="col-md mb-2">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                        <div class="col">
                                            <div class="mb-1">
                                                <h3 class="text-secondary">Filtrar:</h3>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="codigo_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Código</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="periodo_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Periodo</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="evaluador_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Evaluador</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="evaluado_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Evaluado</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search()">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <label class="col-sm-4 col-form-label">Código</label>
                                                    <div class="col-sm-8">
                                                        <input v-model="evaluacion.cea_codigo" class="form-control" id="pco_codigo" type="number">
                                                    </div>
                                                </div>
                                                <div v-if="periodo_opt" class="form-group row mt-2">
                                                    <label class="col-sm-4 col-form-label">Periodo</label>
                                                    <div class="col-sm-8">
                                                        <select name="codigo_per" id="codigo_per" v-model="evaluacion.codigo_per" class="form-control custom-select">
                                                            <option :value="null"></option>
                                                            <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="evaluador_opt" class="form-group row mt-2">
                                                    <label class="col-sm-4 col-form-label">Evaluador</label>
                                                    <div class="col-sm-8">
                                                        <select v-model="evaluacion.codigo_pro_evaluador" name="codigo_pro_evaluador" id="codigo_pro_evaluador" class="form-control custom-select">
                                                            <option :value="null"></option>
                                                            <option  v-for="data in profesores" :value="data.codigo_pro" >{{ data.apellido_pro }} {{ data.nombre_pro }} </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="evaluado_opt" class="form-group row mt-2">
                                                    <label class="col-sm-4 col-form-label">Evaluado</label>
                                                    <div class="col-sm-8">

                                                        <select v-model="evaluacion.codigo_pro_evaluado" name="codigo_pro_evaluado" id="codigo_pro_evaluado" class="form-control custom-select">
                                                            <option :value="null"></option>
                                                            <option  v-for="data in profesores" :value="data.codigo_pro" >{{ data.apellido_pro }} {{ data.nombre_pro }} </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mx-auto">
                                                    <button type="submit" class="btn btn-outline-dark mt-2">Buscar&nbsp;<i class="fas fa-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <!--Table-->
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item justify-content-between lh-condensed bg-light">
                                        <table class="table table-hover table-sprite">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Periodo</th>
                                                    <th>Evaluador</th>
                                                    <th>Evaluado</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in evaluaciones'>
                                                    <td width="10px">{{  data.cea_codigo  }}</td>
                                                    <td width="10px">{{  data.periodo.nombre_per  }}</td>
                                                    <td width="10px">{{  data.evaluador.apellido_pro  }} {{  data.evaluador.nombre_pro  }}</td>
                                                    <td width="10px">{{  data.evaluado.apellido_pro  }} {{  data.evaluado.nombre_pro  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoEvalAdministrativa', params:{ id:data.cea_codigo }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarEvalAdministrativa', params:{ id:data.cea_codigo }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteEval(data.cea_codigo)"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="last_page!=1" class="overflow-auto">
                                            <b-pagination-nav
                                                align="center"
                                                v-model="currentPage"
                                                :number-of-pages="last_page"
                                                base-url="#"
                                                @input="search(currentPage)"
                                            ></b-pagination-nav>
                                        </div>
                                    </li>
                                </div>
                            </div>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoEvalAdministrativa'}" class="btn btn-link">Listar Evaluaciones Administrativas</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioEvalAdministrativa'}" class="btn btn-link">Crear Evaluación Administrativa</router-link>
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
                periodos:[],
                codigo_opt:null,
                periodo_opt:null,
                evaluador_opt:null,
                evaluado_opt:null,
                evaluaciones:[],
                profesores:[],
                evaluacion:{

                },
                last_page:1,
                init_page:1,
                currentPage: 1

            }
        },
        methods:{
            search:function(page){
                axios.post('/api/list/eadministrativas?page='.concat(page), this.evaluacion)
                .then(function(response){
                    this.evaluaciones = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this))
                .catch(err=>console.log(err))
            },
            deleteEval:function(id){
                axios.delete('/api/eadministrativas/'.concat(id))
                    .then(function(response){
                        console.log(response.data)
                        this.search()
                    }.bind(this))
                    .catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/periodos')
                .then(function (response) {
                    this.periodos = response.data;
                }.bind(this));
            axios.get('/api/profesores')
                .then(function (response) {
                    this.profesores = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){
            this.search()
        },

        };
</script>
