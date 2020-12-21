<template>
    <div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h5 class="my-0">Docente: </h5>
                            <div >
                                <p>Nombres y apellidos: {{ profesor.apellido_pro }} {{ profesor.nombre_pro }} </p>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="col-md-6 mb-2">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <label class="my-0" for="actividades">Filtrar actividades por fecha:</label>
                                    </div>
                                    <div class="col-sm">
                                        <input v-model="fecha_rac_filtro" type="date" id="actividades" name="actividades" class="form-control cal">
                                    </div>
                                    <div class="col-sm">
                                        <input @click.prevent="search" type="submit" value="Actualizar" class="btn btn-light sub">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
            <div class="row">
                <!--Formulario para crear registro de actividad-->
                    <div class="col mb-3">
                        <li class="list-group-item justify-content-between lh-condensed">
                            <form @submit.prevent="submit">

                            <div class="form-group row">
                                <label for="Tipoactividad" class="col-sm-2 col-form-label">Tipo de Actividad</label>
                                <div class="col-sm-10">
                                    <select class='form-control' v-model='actividad.codigo_tact' @click='getActividades()'>

                                        <option v-for="data in tipos_actividades" :value="data.codigo_tact">{{ data.nombre_tact }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Actividad" class="col-sm-2 col-form-label">Actividad</label>
                                <div class="col-sm-10">
                                    <select class='form-control' v-model='actividad.codigo_act' @click='getTareas()'>

                                        <option v-for='data in actividads' :value='data.codigo_act'>{{ data.nombre_act }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Tarea" class="col-sm-2 col-form-label">Tarea</label>
                                <div class="col-sm-10">
                                    <select class='form-control' v-model='actividad.codigo_tar'>

                                        <option v-for='data in tareas' :value='data.codigo_tar'>{{ data.nombre_tar }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Comentario" class="col-sm-2 col-form-label">Comentario</label>
                                <div class="col-sm-10">
                                    <input v-model="actividad.comentario_rac" class="form-control" id="Comentario" placeholder="Comentario">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label type="number" for="Horas" class="col-sm-2 col-form-label">Horas</label>
                                <div class="col-sm-10">
                                    <input v-model="actividad.horas_rac" class="form-control" id="Horas" placeholder="Horas"  type="number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Grabar actividad</button>
                                </div>
                             </div>
                        </form>
                        </li>

                    </div>

            </div>
        </div>
        <div class="col-3">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed bg-dark">
                    <div>
                        <h6 style="color: #FFF" class="my-0">Operaciones</h6>
                    </div>
                </li>

            </ul>
        </div>
    <div class="col-md-9 order-md-1">
        <!-- Tabla de registros del usuario(profesor) -->

        <div class="mb-3">
          <div class="row">

            <div class="col-sm">
                <li class="list-group-item justify-content-between lh-condensed">
                    <br><h3 class="page-header text-center">Registro de actividades</h3><br>
                    <table class="table table-hover table-sprite">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo Actividad</th>
                            <th>Actividad</th>
                            <th>Tarea</th>
                            <th>Comentario</th>
                            <th>Horas</th>
                            <th colspan="2">
                            &nbsp;
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for='data in registros'>
                            <td width="10px">{{  data.codigo_rac  }}</td>
                            <td width="10px">{{  data.tipo.nombre_tact  }}</td>
                            <td width="10px">{{  data.actividad.nombre_act  }}</td>
                            <td width="10px">{{  data.tarea.nombre_tar }}</td>
                            <td width="10px">{{  data.comentario_rac  }}</td>
                            <td width="10px">{{  data.horas_rac  }}</td>
                            <td width="10px">
                                <router-link class="btn btn-outline-info btn-sm" :to="{name:'InfoRegistroActividad', params:{ id:data.codigo_rac }}"><i class="fas fa-eye"></i></router-link>
                                <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarRegistroActividad', params:{ id:data.codigo_rac }}"><i class="fas fa-edit"></i></router-link>
                                <a href="#" class="btn btn-outline-danger btn-sm" @click="deleteRegistro(data.codigo_rac)"><i class="fas fa-trash"></i></a>
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
        <div class="col-sm-5">
          <pre>

          </pre>
        </div>



        <hr class="mb-4">        <!--LINEA-->

    </div>
  </div>
        </div>

    </div>


</template>


<style>
.fecha{
    margin-left: 13rem;
}
.cal{
    margin-left: 1rem;
}
.sub{

    margin-left: 1rem;
}

.form-group {
    width: auto;
}

</style>

<script>
import {system_date } from '../app';
    export default {
        data() {
            return {
                home: 'HOME',

                tipos_actividades: [],
                profesor:{
                    departamento:{},
                    area:{},
                    dedicacion:{}
                },
                actividads: [],
                actividad:{
                },
                tareas: [],
                registros: [],
                last_page:1,
                init_page:1,
                currentPage: 1,
                fecha_rac_filtro:null
            }
        },
        methods:{
            getProfesorInfo: function(){
                axios.get('/api/users/searchprofesor/'.concat(Laravel.user.id))
                .then(function(response){
                    console.warn(response.data)
                    this.profesor = response.data
                    this.actividad.codigo_pro = this.profesor.codigo_pro
                    this.actividad.codigo_dep = this.profesor.departamento.codigo_dep
                    this.actividad.codigo_area = this.profesor.area.codigo_area
                    this.actividad.fecha_rac = system_date
                    this.search()
                }.bind(this)).catch(err=>console.log(err));
            },
            getActividades: function() {
                axios.get('/api/actividadestact/'.concat(this.actividad.codigo_tact))
                .then(function(response){
                    this.actividads = response.data;
                }.bind(this)).catch(err=>console.log(err));
            },
            getTareas: function(){
                axios.get('/api/tareastact/'.concat(this.actividad.codigo_act),{
                }).then(function(response){
                    this.tareas = response.data;
                }.bind(this)).catch(err=>console.log(err));
            },
            search: function(page){
                axios.post('/api/list/registroactividades?page='.concat(page), {"codigo_pro":this.profesor.codigo_pro, "fecha_rac":this.fecha_rac_filtro})
                    .then(function (response){
                        console.log(response.data)
                    this.registros = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this)).catch(err=>console.log(err));
            },
            deleteRegistro:function(id){
                axios.delete('/api/registrosactividades/'.concat(id))
                .then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this)).catch(err=>console.log(err))
                .catch(err=>console.warn(err))
            },
            submit:function(){
                axios.post('/api/registrosactividades', this.actividad)
                .then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this))
                .catch(err=>console.warn(err))
            }
        },
        mounted() {
            console.warn(Laravel.user.id)
            axios.get('/api/tiposactividades')
              .then(function (response) {
                 this.tipos_actividades = response.data;
              }.bind(this));
        },
        components:{

        },
        created: function(){

            this.getProfesorInfo()

        },

        };
</script>
