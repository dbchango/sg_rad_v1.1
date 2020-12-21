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
                                                    <input v-model="nombre_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Nombre</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input v-model="valor_opt" type="checkbox" class="form-check-input">
                                                    <label for="" class="form-check-label">Valor</label>
                                                </div>
                                            </div>
                                            <form @submit.prevent="search()">
                                                <div v-if="codigo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="calificacion.cau_codigo" class="form-control" id="cau_codigo" type="text" placeholder="Código">
                                                    </div>

                                                </div>
                                                <div v-if="periodo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Periodo</span>
                                                        </div>
                                                        <select name="codigo_per" id="codigo_per" v-model="calificacion.codigo_per" class="form-control custom-select">
                                                            <option :value="null" salected></option>
                                                            <option v-for="data in periodos"  :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="nombre_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Nombre</span>
                                                        </div>
                                                        <input v-model="calificacion.cau_nombre" class="form-control" id="cau_nombre" type="text" placeholder="Nombre">
                                                    </div>
                                                </div>
                                                <div v-if="valor_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Valor</span>
                                                        </div>
                                                        <input v-model="calificacion.cau_valor" class="form-control" id="cau_valor" type="number">
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
                                        <table class="table table-hover table-sprite">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Periodo</th>
                                                    <th>Nombre</th>
                                                    <th>Valor</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in calificaciones'>
                                                    <td width="10px">{{  data.cau_codigo  }}</td>
                                                    <td width="10px">{{  data.periodo.nombre_per  }}</td>
                                                    <td width="10px">{{  data.cau_nombre  }}</td>
                                                    <td width="10px">{{  data.cau_valor  }}</td>

                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoCalAutoevaluaciones', params:{ id:data.cau_codigo }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditCalAutoevaluaciones', params:{ id:data.cau_codigo }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteCal(data.cau_codigo)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoCalAutoevaluaciones'}" class="btn btn-link">Listar Calificación Autoevaluación</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioCalAutoevaluaciones'}" class="btn btn-link">Crear Calificación Autoevaluación</router-link>
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
                periodos:[],
                codigo_opt:null,
                periodo_opt:null,
                valor_opt:null,
                nombre_opt:null,
                calificaciones:[],
                last_page:1,
                init_page:1,
                currentPage: 1,
                calificacion:{}
            }
        },
        methods:{

            search:function(page){
                axios.post('/api/list/calificacionesautoevaluaciones?page='.concat(page), this.calificacion)
                .then(function (response) {
                    this.calificaciones = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this));
            },
            deleteCal:function(id){
                axios.delete('/api/calificacionesautoevaluaciones/'.concat(id))
                    .then(function(response){
                        console.log(response.data)
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
