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
                                                    <input v-model="cedula_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Cédula</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="nombre_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Nombres</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="apellidos_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Apellidos</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="usuario_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Nombre de usuario:</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="departamento_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Departamento</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="area_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Área</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="estado_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Estado</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="dedicacion_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Dedicación</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search">

                                                <div v-if="codigo_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="profesor.codigo_pro" class="form-control" id="codigo_pro" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="cedula_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Cédula</span>
                                                        </div>
                                                        <input v-model="profesor.cedula_pro" class="form-control" id="cedula_pro" placeholder="Cedula">
                                                    </div>
                                                </div>
                                                <div v-if="nombre_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nombres</span>
                                                        </div>
                                                        <input v-model="profesor.nombre_pro" class="form-control" id="nombre_pro" placeholder="Nombres">
                                                    </div>
                                                </div>
                                                <div v-if="apellidos_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Apellidos</span>
                                                        </div>
                                                        <input v-model="profesor.apellido_pro" class="form-control" id="nombre_pro" placeholder="Apellidos">
                                                    </div>
                                                </div>
                                                <div v-if="usuario_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nombre de usuario</span>
                                                        </div>
                                                        <input v-model="profesor.miespe_pro" class="form-control" id="miespe_pro" placeholder="Usuario MiEspe">
                                                    </div>
                                                </div>
                                                <div v-if="departamento_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Departamento</span>
                                                        </div>
                                                        <select v-model="profesor.codigo_dep" class='form-control custom-select' name="" id="codigo_dep">
                                                            <option :value="null"></option>
                                                            <option v-for="data in departamentos" :value="data.codigo_dep">{{ data.nombre_dep }}</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div v-if="area_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Área de conocimientos</span>
                                                        </div>
                                                        <select v-model="profesor.cod_area" class='form-control custom-select' name="" id="codigo_area">
                                                            <option :value="null"></option>
                                                            <option v-for="data in areas" class='form-control' :value="data.codigo_area">{{ data.nombre_area }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="estado_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Estado</span>
                                                        </div>
                                                        <input type="checkbox" class='form-control' v-model="profesor.estado_pro">
                                                    </div>
                                                </div>

                                                <div v-if="dedicacion_opt" class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Dedicación</span>
                                                        </div>

                                                        <select class='form-control' name="ded_codigo" id="ded_codigo" v-model="profesor.ded_codigo">
                                                            <option :value="null"></option>
                                                            <option v-for="data in dedicaciones" :value="data.ded_codigo">{{ data.ded_nombre }}</option>
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
                                                    <th>Apellidos</th>
                                                    <th >Nombre</th>
                                                    <th >Cédula</th>
                                                    <th >Cta MiESPE</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in profesores'>
                                                    <td width="10px">{{  data.codigo_pro  }}</td>
                                                    <td width="10px">{{  data.apellido_pro  }}</td>
                                                    <td width="10px">{{  data.nombre_pro  }}</td>
                                                    <td width="10px">{{  data.cedula_pro  }}</td>
                                                    <td width="10px">{{  data.miespe_pro  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoProfesor', params:{ id:data.codigo_pro }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarProfesor', params:{ id:data.codigo_pro }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteProfesor(data.codigo_pro)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoProfesor'}" class="btn btn-link">Listar Profesor</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioProfesor'}" class="btn btn-link">Crear Profesor</router-link>
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
                cedula_opt:null,
                nombre_opt:null,
                apellidos_opt:null,
                usuario_opt:null,
                departamento_opt:null,
                area_opt:null,
                estado_opt:null,
                profesores: [],
                dedicaciones:[],
                profesor:{},
                departamentos:[],
                last_page:1,
                init_page:1,
                currentPage: 1,
                areas:[],
                dedicacion_opt:null
            }
        },
        methods:{

            search: function(page){
              axios.post('/api/list/profesores?page='.concat(page), this.profesor)
              .then(function (response) {
                this.profesores = response.data.data;
                this.last_page = response.data.last_page;
                this.currentPage = response.data.current_page;
              }.bind(this));

            },
            deleteProfesor: function(id){
                axios.delete('/api/profesores/'.concat(id))
                .then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this))
                .catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/dedicaciones')
                .then(function (response) {
                    this.dedicaciones = response.data;
                }.bind(this));
            axios.get('/api/departamentos')
                .then(function (response) {
                    this.departamentos = response.data;
                }.bind(this));
            axios.get('/api/areas')
                .then(function (response) {
                    this.areas = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){
            this.search()



        },

        };
</script>
