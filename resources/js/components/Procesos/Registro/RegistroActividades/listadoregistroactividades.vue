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
                                                    <input v-model="profesor_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Profesor</label>
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
                                                    <input v-model="fecha_rac_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Fecha</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="tipo_actividad_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Tipo Actividad</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="registro.codigo_rac" class="form-control" id="codigo_rac" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="profesor_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Profesor</span>
                                                        </div>
                                                        <select name="codigo_pro" id="codigo_pro" v-model="registro.codigo_pro" class="form-control custom-select">
                                                            <option :value="null"></option>
                                                            <option v-for="data in profesores" :value="data.codigo_pro">{{ data.cedula_pro }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="departamento_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Departamento</span>
                                                        </div>
                                                        <select name="codigo_dep" id="codigo_dep" v-model="registro.codigo_dep" class="form-control custom-select">
                                                            <option :value="null"></option>
                                                            <option v-for="data in departamentos" :value="data.codigo_dep">{{ data.nombre_dep }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="area_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Área</span>
                                                        </div>
                                                        <select name="codigo_area" id="codigo_area" v-model="registro.codigo_area" class="form-control custom-select">
                                                            <option :value="null"></option>
                                                            <option v-for="data in areas" :value="data.codigo_area">{{ data.nombre_area }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="fecha_rac_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Fecha</span>
                                                        </div>
                                                        <input v-model="registro.fecha_rac" class="form-control" id="fecha_rac" placeholder="Area" type="date">
                                                    </div>
                                                </div>
                                                <div v-if="tipo_actividad_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Tipo Actividad</span>
                                                        </div>
                                                        <select name="codigo_tact" id="codigo_tact" v-model="registro.codigo_tact" class="form-control custom-select">
                                                            <option :value="null"></option>
                                                            <option v-for="data in tipos_actividades" :value="data.codigo_tact">{{ data.nombre_tact }}</option>
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
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Profesor</th>
                                                    <th>Departamento</th>
                                                    <th>Área</th>
                                                    <th>Fecha</th>
                                                    <th>Tipo Actividad</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in registros'>
                                                    <td width="10px">{{  data.codigo_rac  }}</td>
                                                    <td width="10px">{{  data.profesor.cedula_pro  }}</td>
                                                    <td width="10px">{{  data.departamento.nombre_dep  }}</td>
                                                    <td width="10px">{{  data.area.nombre_area  }}</td>
                                                    <td width="10px">{{  data.fecha_rac  }}</td>
                                                    <td width="10px">{{  data.tipo.nombre_tact  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoRegistroActividad', params:{ id:data.codigo_rac }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarRegistroActividad', params:{ id:data.codigo_rac }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteRegistro(data.codigo_rac)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoRegistroActividad'}" class="btn btn-link">Listar Profesor</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioRegistroActividad'}" class="btn btn-link">Crear registro de actividades</router-link>
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
                registro:{

                },
                areas: [],
                profesores:[],
                registros:[],
                departamentos:[],
                tipos_actividades:[],

                actividades:[],
                codigo_opt:null,
                profesor_opt:null,
                departamento_opt:null,
                area_opt:null,
                fecha_rac_opt:null,
                tipo_actividad_opt:null,
                last_page:1,
                init_page:1,
                currentPage: 1
            }
        },
        methods:{

            deleteRegistro:function(id){
                axios.delete('/api/registrosactividades/'.concat(id))
                .then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this))
                .catch(err=>console.warn(err))
            },
            search:function(page){

                axios.post('/api/list/registroactividades?page='.concat(page), this.registro)
                .then(function(response){
                    this.registros = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this))
                .catch(err=>console.log(err))
            }
        },
        mounted() {
            axios.get('/api/profesores')
                .then(function (response) {
                    this.profesores = response.data;
                }.bind(this));
            axios.get('/api/departamentos')
                .then(function (response) {
                    this.departamentos = response.data;
                }.bind(this));
            axios.get('/api/areas')
                .then(function (response) {
                    this.areas = response.data;
                }.bind(this));
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
