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
                                                    <label  class="form-check-label">Código</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="area_opt" type="checkbox" class="form-check-input">
                                                    <label  class="form-check-label">Nombre Área</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="area.codigo_area" class="form-control" id="codigo_area" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="area_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nombre Área</span>
                                                        </div>
                                                        <input v-model="area.nombre_area" class="form-control" id="nombre_area" placeholder="Nombre Área">
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
                                                    <th>Nombre del area</th>
                                                    <th colspan="2">

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in areas'>
                                                    <td width="10px">{{  data.codigo_area  }}</td>
                                                    <td width="10px">{{  data.nombre_area  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoArea', params:{ id:data.codigo_area }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarArea', params:{ id:data.codigo_area }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteArea(data.codigo_area)"><i class="fas fa-trash"></i></a>
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
                codigo_opt:null,
                area_opt:null,
                area:{
                },
                areas: [ ],
                last_page:1,
                currentPage:1,
                init_page:1
            }
        },
        methods:{
            deleteArea: function(id){
                axios.delete('/api/areas/'.concat(id))
                .then(function (response) {
                    console.log(response.data)
                    this.search()
                }.bind(this))
                .catch(err=>console.warn(err));
            },
            search:function(page){
                axios.post('/api/list/areas?page='.concat(page), this.area).then(
                    function(response) {
                        this.areas = response.data.data;
                        this.last_page = response.data.last_page;
                        this.currentPage = response.data.current_page;
                    }.bind(this)
                ).catch(err=>consol.warn(err))
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
