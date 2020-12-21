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
                                                    <input v-model="materia_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Materia</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="dia_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Dia</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="fecha_rec_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Fecha Recuperación</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="recuperacion.codigo_rec" class="form-control" id="codigo_rec" type="text" placeholder="Código">
                                                    </div>

                                                </div>
                                                <div v-if="periodo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Periodo</span>
                                                        </div>

                                                        <select class="form-control" v-model="recuperacion.codigo_per" name="codigo_per" id="codigo_per" >
                                                            <option :value="null"></option>
                                                            <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="materia_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Materia</span>
                                                        </div>
                                                        <select class="form-control" v-model="recuperacion.codigo_mat" name="codigo_mat" id="codigo_mat" >
                                                            <option :value="null"></option>
                                                            <option v-for="data in materias" :value="data.codigo_mat">{{ data.nombre_mat }}</option>
                                                        </select>

                                                    </div>

                                                </div>
                                                <div v-if="dia_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Dia</span>
                                                        </div>

                                                        <select class="form-control" v-model="recuperacion.codigo_dia" name="codigo_dia" id="codigo_dia" >
                                                            <option :value="null" selected></option>
                                                            <option v-for="data in dias" :value="data.codigo_dia">{{ data.nombre_dia }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="fecha_rec_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Fecha Recuperación</span>
                                                        </div>
                                                        <input v-model="recuperacion.fecha_rec" class="form-control" id="fecha_rec" type="date" placeholder="Fecha Recuperación">
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
                                                    <th>Profesor</th>
                                                    <th>Día</th>
                                                    <th>Fecha Recuperación</th>
                                                    <th colspan="2">

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in recuperaciones'>
                                                    <td width="10px">{{  data.codigo_rec  }}</td>
                                                    <td width="10px">{{  data.periodo.nombre_per  }}</td>
                                                    <td width="10px">{{  data.profesor.nombre_pro  }}</td>
                                                    <td width="10px">{{  data.dia.nombre_dia  }}</td>
                                                    <td width="10px">{{  data.fecha_rec  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoRecuperacion', params:{ id:data.codigo_rec }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarRecuperacion', params:{ id:data.codigo_rec }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteRecuperacion(data.codigo_rec)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoRecuperacion'}" class="btn btn-link">Listar Recuperación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioRecuperacion'}" class="btn btn-link">Crear Recuperación</router-link>
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
                codigo_opt:null,
                periodo_opt:null,
                materia_opt:null,
                dia_opt:null,
                fecha_rec_opt:null,
                recuperacion:{

                },
                recuperaciones: [],
                last_page:1,
                init_page:1,
                currentPage: 1,
                periodos:[],
                materias:[],
                dias:[]
            }
        },
        methods:{
            search:function(page){

                axios.post('/api/list/registroactividades?page='.concat(page), this.registro)
                .then(function(response){
                    this.registros = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this))
                .catch(err=>console.log(err))
            },

            search: function(page){
              axios.post('/api/list/recuperaciones?page='.concat(page), this.recuperacion)
              .then(function (response) {
                this.recuperaciones = response.data.data;
                this.last_page = response.data.last_page;
                this.currentPage = response.data.current_page;

              }.bind(this));

            },
            deleteRecuperacion: function(id){
                axios.delete('/api/areas/'.concat(id))
                    .then(function (response) {
                        console.log(response.data)
                        this.search()
                    }.bind(this))
                    .catch(err=>console.warn(err));
            }
        },
        mounted() {
            axios.get('/api/periodos')
            .then(function(response){
                this.periodos = response.data
            }.bind(this))
            .catch();
            axios.get('/api/materias')
            .then(function(response){
                this.materias = response.data
            }.bind(this))
            .catch();
            axios.get('/api/dias')
            .then(function(response){
                this.dias = response.data
            }.bind(this))
            .catch();
        },
        components:{

        },
        created: function(){
            this.search()

        },

        };
</script>
