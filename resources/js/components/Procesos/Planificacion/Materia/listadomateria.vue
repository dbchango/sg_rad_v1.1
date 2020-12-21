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
                                                    <input v-model="nrc_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">NRC</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="nombre_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Nombre</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search()">
                                                <div v-if="codigo_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="materia.codigo_mat" name="codigo_mat" class="form-control" id="codigo_mat" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="periodo_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Periodo</span>
                                                        </div>
                                                        <select class='form-control custom-select' v-model='materia.codigo_per' name="codigo_per" id="codigo_per">
                                                            <option :value='null' selected></option>
                                                           <option v-for="data in periodos" :value='data.codigo_per' >{{ data.nombre_per }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="nrc_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">NRC</span>
                                                        </div>
                                                        <input v-model="materia.ncr_mat" name="ncr_mat" class="form-control" id="ncr_mat" placeholder="NRC">
                                                    </div>
                                                </div>
                                                <div v-if="nombre_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nombre</span>
                                                        </div>
                                                        <input v-model="materia.nombre_mat" name="nombre_mat" class="form-control" id="nombre_mat" placeholder="Nombre">
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
                                                    <th>NRC</th>
                                                    <th>Nombre</th>
                                                    <th colspan="2">

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in materias'>
                                                    <td width="10px">{{  data.codigo_mat  }}</td>
                                                    <td width="10px">{{  data.periodo.nombre_per  }}</td>
                                                    <td width="10px">{{  data.ncr_mat  }}</td>
                                                    <td width="10px">{{  data.nombre_mat  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoMateria', params:{ id:data.codigo_mat }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarMateria', params:{ id:data.codigo_mat }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteMaterias(data.codigo_mat)"><i class="fas fa-trash"></i></a>
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
                collection_size:1,
                codigo_opt:null,
                periodo_opt:null,
                nrc_opt:null,
                nombre_opt:null,
                materia:{
                    codigo_mat: null,
                    codigo_per: null,
                    ncr_mat: null,
                    nombre_mat: null

                },
                materias:{},
                periodos:[],
                currentPage:1,
                init_page:1,
                last_page:1
            }
        },
        methods:{
            search:function(page){
                axios.post('/api/list/materias?page='.concat(page),this.materia)
                .then(function(response){
                    this.materias = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;

                }.bind(this))
                .catch(err=>console.warn(err))
            },
            deleteMaterias:function(id){
                axios.delete('/api/materias/'.concat(id))
                .then(function(response){
                    console.log(response)
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

        },
        components:{

        },
        created: function(){
            this.search()
        },

        };
</script>
