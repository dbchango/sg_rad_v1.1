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
                                            <h3 class="text-secondary">Filtrar:</h3>
                                            <div class="form-check form-check-inline">
                                                <input v-model="codigo_opt" type="checkbox" class="form-check-input">
                                                <label for="" class="form-check-label">Código</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input v-model="dedicacion_opt" type="checkbox" class="form-check-input">
                                                <label for="" class="form-check-label">Dedicación</label>
                                            </div>
                                            <form @submit.prevent="search">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input name="ded_codigo" v-model="dedicacion.ded_codigo" class="form-control" id="ded_codigo" type="text" placeholder="Código">
                                                    </div>

                                                </div>
                                                <div v-if="dedicacion_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Dedicación</span>
                                                        </div>
                                                        <input name="ded_nombre" id="ded_nombre" v-model="dedicacion.ded_nombre" class="form-control" type="text" placeholder="Dedicación">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
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
                                                    <th>Nombre</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in dedicaciones'>
                                                    <td width="10px">{{  data.ded_codigo  }}</td>
                                                    <td width="10px">{{  data.ded_nombre  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoDedicaciones', params:{ id:data.ded_codigo }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarDedicaciones', params:{ id:data.ded_codigo }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deletePregunta(data.ded_codigo)"><i class="fas fa-trash"></i></a>
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
                dedicaciones:[],
                codigo_opt:null,
                dedicacion_opt:null,
                dedicacion:{},
                last_page:1,
                init_page:1,
                currentPage: 1,
            }
        },
        methods:{
            search:function(page){
                axios.post('/api/list/dedicaciones?page='.concat(page), this.dedicacion)
                .then(function (response) {
                    this.dedicaciones = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this));
            },
            deletePregunta:function(id){
                axios.delete('/api/dedicaciones/'.concat(id))
                .then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this))
                .catch(err=>console.warn(err))
            }
        },
        mounted() {

        },
        components:{

        },
        created: function(){
            this.search()
        },

        };
</script>
