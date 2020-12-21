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
                                                    <input v-model="actividad_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Actividad</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="tarea_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Tarea</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="tarea.codigo_tar" class="form-control" id="codigo_tar" type="text" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="actividad_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Actividad</span>
                                                        </div>
                                                        <select name="codigo_act" id="codigo_act" v-model="tarea.codigo_act" class="form-control custom-select">
                                                            <option :value="null" selected></option>
                                                            <option v-for="data in actividades" :value="data.codigo_act">{{ data.nombre_act }}</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div v-if="tarea_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nombre Tarea</span>
                                                        </div>
                                                        <input v-model="tarea.nombre_tar" class="form-control" id="nombre_tar" type="text" placeholder="Tarea">
                                                    </div>
                                                </div>
                                                <div class="form-group row mx-auto">
                                                    <button type="submit"  class="btn btn-outline-dark mt-2">Buscar&nbsp;<i class="fas fa-search"></i></button>
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
                                        <br><h3 class="page-header text-center">Tareas</h3><br>
                                        <table class="table table-hover table-sprite">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Actividad</th>
                                                    <th>Nombre</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in tareas'>
                                                    <td width="10px">{{  data.codigo_tar  }}</td>
                                                    <td width="10px">{{  data.actividad.nombre_act  }}</td>
                                                    <td width="10px">{{  data.nombre_tar  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoTareas', params:{ id:data.codigo_tar }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarTareas', params:{ id:data.codigo_tar }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteTarea(data.codigo_tar)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoTareas'}" class="btn btn-link">Listar Tareas</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioTareas'}" class="btn btn-link">Crear Tareas</router-link>
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
                tareas:[],
                tarea_opt:null,
                actividad_opt:null,
                codigo_opt:null,
                tarea:{},
                actividades:[],
                last_page:1,
                init_page:1,
                currentPage: 1,
            }
        },
        methods:{
            search:function(page){
                axios.post('/api/list/tareas?page='.concat(page), this.tarea)
                .then(function (response) {
                    this.tareas = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this));
            },
            deleteTarea:function(id){
                axios.delete('/api/tareas/'.concat(id))
                .then(function (response) {
                    console.log(response.data)
                    this.search()
                }.bind(this)).catch(err=>console.log(err))
            }

        },
        mounted() {
            axios.get('/api/actividades')
                .then(function (response) {
                    this.actividades = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){
            this.search()
        },

        };
</script>
