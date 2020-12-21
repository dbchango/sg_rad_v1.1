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
                                                        <input v-model="profesor_opt" type="checkbox" class="form-check-input">
                                                        <label for="" class="form-check-label">Profesor</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input v-model="materia_opt" type="checkbox" class="form-check-input">
                                                        <label for="" class="form-check-label">Materia</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input v-model="dia_opt" type="checkbox" class="form-check-input">
                                                        <label for="" class="form-check-label">Día</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input v-model="hora_entrada_opt" type="checkbox" class="form-check-input">
                                                        <label for="" class="form-check-label">Hora entrada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input v-model="hora_salida_opt" type="checkbox" class="form-check-input">
                                                        <label for="" class="form-check-label">Hora salida</label>
                                                    </div>
                                                </div>
                                            <form @submit.prevent="search">

                                                <div v-if="codigo_opt" class="form-group row mt-2">

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Código</span>
                                                        </div>
                                                        <input v-model="horario.codigo_hor" name="codigo_hor" class="form-control" id="codigo_hor" placeholder="Código">
                                                    </div>
                                                </div>
                                                <div v-if="periodo_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Periodo</span>
                                                        </div>
                                                        <select class='form-control custom-select' v-model="horario.codigo_per" name="codigo_per" id="codigo_per">
                                                            <option :value='null' selected></option>
                                                            <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="profesor_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Profesor</span>
                                                        </div>
                                                        <select class='form-control custom-select' v-model="horario.codigo_pro" name="codigo_pro" id="codigo_pro">
                                                            <option :value='null' selected></option>
                                                            <option v-for="data in profesores" :value="data.codigo_pro">{{ data.nombre_pro }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="materia_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Materia</span>
                                                        </div>
                                                        <select class='form-control custom-select' v-model="horario.codigo_mat" name="codigo_mat" id="codigo_mat">
                                                            <option :value='null' selected></option>
                                                            <option v-for="data in materias" :value="data.codigo_mat">{{ data.nombre_mat }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="dia_opt" class="form-group row mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Día</span>
                                                        </div>
                                                        <select class='form-control custom-select' v-model="horario.codigo_dia" name="codigo_dia" id="codigo_dia">
                                                            <option :value='null' selected></option>
                                                            <option v-for="data in dias" :value="data.codigo_dia">{{ data.nombre_dia }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div v-if="hora_entrada_opt" class="form-group row mt-2">

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Hora entrada</span>
                                                        </div>
                                                        <input v-model="horario.hora_entrada_hor" name="hora_entrada_hor" class="form-control" id="hora_entrada_hor" type="time">
                                                    </div>
                                                </div>
                                                <div v-if="hora_salida_opt" class="form-group row mt-2">

                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Hora salida</span>
                                                        </div>
                                                        <input v-model="horario.hora_salida_hor" name="hora_salida_hor" class="form-control" id="hora_salida_hor" type="time">
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
                                                    <th>Materia</th>
                                                    <th>Día</th>
                                                    <th>Hora entrada</th>
                                                    <th>Hora salida</th>
                                                    <th colspan="2">

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in horarios'>
                                                    <td width="10px">{{  data.codigo_hor  }}</td>
                                                    <td width="10px">{{  data.periodo.nombre_per  }}</td>
                                                    <td width="10px">{{  data.profesor.cedula_pro  }}</td>
                                                    <td width="10px">{{  data.materia.nombre_mat  }}</td>
                                                    <td width="10px">{{  data.dia.nombre_dia  }}</td>
                                                    <td width="10px">{{  data.hora_entrada_hor  }}</td>
                                                    <td width="10px">{{  data.hora_salida_hor  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoHorario', params:{ id:data.codigo_hor }}"><i class="fas fa-eye"></i></router-link>
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarHorario', params:{ id:data.codigo_hor }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteHorario(data.codigo_hor)"><i class="fas fa-trash"></i></a>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoHorario'}" class="btn btn-link">Listar Horario</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioHorario'}" class="btn btn-link">Crear Horario</router-link>
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
                profesor_opt:null,
                materia_opt:null,
                hora_salida_opt:null,
                hora_entrada_opt:null,
                dia_opt:null,
                horario:{

                },
                departamentos: [],
                periodos:[],
                horarios:[],
                dias:[],
                last_page:1,
                currentPage:1,
                init_page:1,
                profesores:[]
            }
        },
        methods:{
            search:function(page){
                axios.post('/api/list/horarios?page='.concat(page),this.horario)
                .then(function(response){
                    this.horarios = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;

                }.bind(this))
                .catch(err=>console.warn(err));
            },
            deleteHorario:function(id){
                axios.delete('/api/horarios/'.concat(id)).then(function(response){
                    console.log(response.data);
                    this.search()

                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            axios.get('/api/periodos')
                .then(function (response) {
                    this.periodos = response.data;
                }.bind(this))
                .catch(err=>console.warn(err));
            axios.get('/api/materias')
                .then(function (response) {
                    this.materias = response.data;
                }.bind(this))
                .catch(err=>console.warn(err));
            axios.get('/api/dias')
                .then(function (response) {
                    this.dias = response.data;
                }.bind(this))
                .catch(err=>console.warn(err));
            axios.get('/api/profesores')
                .then(function (response) {
                    this.profesores = response.data;
                }.bind(this))
                .catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){
            this.search(1)


        },

        };
</script>
