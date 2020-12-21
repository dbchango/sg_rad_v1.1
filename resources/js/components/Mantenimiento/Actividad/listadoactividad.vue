<template>
    <div>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <!--Filtro de busqueda-->
                            <div class="row">
                                <div class="col-md mb-2 ">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                        <div class="col">
                                            <div class="mb-1">
                                                <h3 class="text-secondary">Filtrar:</h3>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="codigo_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Código</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="tipo_act_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Tipo Actividad</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="actividad_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Actividad</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search">

                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="actividad.codigo_act" class="form-control" id="codigo_act" type="text" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="tipo_act_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Tipo Actividad</span>
                                                        </div>
                                                        <select @click="getActividades()" name="codigo_per" id="codigo_per" v-model="actividad.codigo_tact" class="form-control custom-select">
                                                            <option :value="null" selected></option>
                                                            <option  v-for="data in tipos_actividades" :value="data.codigo_tact">{{ data.nombre_tact }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="actividad_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Actividad</span>
                                                        </div>
                                                        <select name="codigo_per" id="codigo_pro" v-model="actividad.nombre_act" class="form-control custom-select">
                                                            <option :value="null" selected></option>
                                                            <option v-for="data in actividades_list" :value="data.codigo_pro">{{ data.nombre_act }}</option>
                                                        </select>
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
                                    <li class="list-group-item justify-content-between lh-condensed bg-light">

                                        <table class="table table-hover table-sprite">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Tipo Actividad</th>
                                                    <th>Actividad</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr v-for='data in actividades'>
                                                    <td width="10px">{{  data.codigo_act  }}</td>
                                                    <td width="10px">{{  data.tipo.nombre_tact  }}</td>
                                                    <td width="10px">{{  data.nombre_act  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoActividad', params:{ id:data.codigo_act }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarActividad', params:{ id:data.codigo_act }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteActividad(data.codigo_act)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoActividades'}" class="btn btn-link">Listar Preguntas Actividades</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioActividades'}" class="btn btn-link">Crear Preguntas Actividades</router-link>
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
                tipos_actividades:[],
                actividades:[],
                codigo_opt:null,
                tipo_act_opt:null,
                actividad_opt:null,
                actividad:{},
                last_page:1,
                init_page:1,
                currentPage: 1,
                actividades_list:[]
            }
        },
        methods:{
            search: function(page){
                axios.post('/api/list/actividades?page='.concat(page), this.actividad)
                .then(function (response) {
                    this.actividades = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this));
            },
            getActividades:function(){
                axios.get('/api/actividadestact/'.concat(this.actividad.codigo_tact))
                .then(function(response){
                    this.actividades_list = response.data;
                }.bind(this))
                .catch(err=>console.warn(err))
            },
            deleteActividad:function(id){
                axios.delete('/api/actividades/'.concat(id))
                .then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this))
                .catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/tiposactividades')
                .then(function (response) {
                    this.tipos_actividades = response.data;
                }.bind(this));
        },
        components:{

        },
        created: function(){
            this.search()
        },

        };
</script>
