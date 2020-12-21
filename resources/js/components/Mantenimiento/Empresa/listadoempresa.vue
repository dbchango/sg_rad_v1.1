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
                                                    <input v-model="empresa_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Empresa</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="empresa.codigo_emp" class="form-control" id="codigo_emp" type="text" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="empresa_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Empresa</span>
                                                        </div>
                                                        <input v-model="empresa.nombre_emp" class="form-control" id="nombre_emp" type="text" placeholder="Código">
                                                    </div>
                                                </div>

                                                <div class="form-group row mx-auto">
                                                    <button type="submit" value="submit" class="btn btn-outline-dark mt-2">Buscar&nbsp;<i class="fas fa-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <!--Table-->
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item justify-content-between lh-condensed">
                                        <br><h3 class="page-header text-center">Empresas</h3><br>
                                        <table class="table table-hover table-sprite">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Empresa</th>
                                                    <th>Límite Acceso</th>
                                                    <th>Emp Firma Encargado</th>
                                                    <th>Emp Pie Encargado</th>
                                                    <th>Emp Firma Subdirector</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in empresas'>
                                                    <td width="10px">{{  data.codigo_emp  }}</td>
                                                    <td width="10px">{{  data.nombre_emp  }}</td>
                                                    <td width="10px">{{  data.limite_acceso_emp  }}</td>
                                                    <td width="10px">{{  data.emp_firma_encargado  }}</td>
                                                    <td width="10px">{{  data.emp_pie_encargado  }}</td>
                                                    <td width="10px">{{  data.emp_firma_subdirector  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoEmpresa', params:{ id:data.codigo_emp }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarEmpresa', params:{ id:data.codigo_emp }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteEmpresa(data.codigo_emp)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoEmpresas'}" class="btn btn-link">Listar Empresa</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioEmpresas'}" class="btn btn-link">Crear Empresa</router-link>
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
                empresas:[],
                codigo_opt:null,
                empresa_opt:null,
                limite_access_opt:null,
                empresa_firma_enc_opt:null,
                empresa_pie_opt:null,
                empresa_firma_sub_opt:null,
                last_page:1,
                init_page:1,
                currentPage: 1,
                empresa:{}
            }
        },
        methods:{
            search:function(page){
                axios.post('/api/list/empresas?page='.concat(page), this.empresa)
                .then(function (response) {
                    this.empresas = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this));
            },
            deleteEmpresa:function(id){
                axios.delete('/api/empresas/'.concat(id))
                .then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this))
                .catch(err=>console.warn(err))
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        components:{

        },
        created: function(){
            this.search()
        },

        };
</script>
