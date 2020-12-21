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
                                                    <input v-model="nombre_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Nombre</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="activo_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Activo</label>
                                                </div>
                                            </div>
                                            <form @submit="search()">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Actividad</span>
                                                        </div>
                                                        <input v-model="periodo.codigo_per" name="codigo_per" class="form-control" id="codigo_per" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="nombre_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nombre</span>
                                                        </div>
                                                        <input v-model="periodo.nombre_per" name="nombre_per" class="form-control" id="nombre_per" placeholder="Nombre">
                                                    </div>
                                                </div>
                                                <div v-if="activo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Activo</span>
                                                        </div>
                                                        <select class='form-control custom-select' v-model='periodo.activo_per' name="codigo_act" id="codigo_act">
                                                            <option :value='false' >Inactivo</option>
                                                            <option :value='true' >Activo</option>
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
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>Activo</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in periodos'>
                                                    <td width="10px">{{  data.codigo_per  }}</td>
                                                    <td width="10px">{{  data.nombre_per  }}</td>
                                                    <td width="10px"> <p v-if="data.activo_per">Activo</p> <p v-else>Inactivo</p></td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoPeriodo', params:{ id:data.codigo_per }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarPeriodo', params:{ id:data.codigo_per }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deletePeriodo(data.codigo_per)"><i class="fas fa-trash"></i></a>
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
                codigo_opt:null,
                nombre_opt:null,
                activo_opt:null,
                periodo: {},
                periodos: [],
                last_page:1,
                currentPage:1,
                init_page:1
            }
        },
        methods:{

            search: function(page){
                axios.post('/api/list/periodos?page='.concat(page), this.periodo)
                .then(function(response){
                    this.periodos = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;

                }.bind(this))
                .catch((error) => {
                    console.warn(error);
                });
            },
            deletePeriodo: function(id){
                axios.delete('/api/periodos/'.concat(id)).then(
                    function(response){
                        console.log(response.data)
                       this.search()
                    }.bind(this)
                ).catch(err=>console.log(err))
            }
        },
        mounted() {
        },
        components:{

        },
        created: function(){
            this.search()

        }

        };
</script>
