<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    <div class="row">
                            <div class="col-md mb-2">

                                      <li class="list-group-item justify-content-between lh-condensed bg-light">
                                        <table class="table table-hover table-sprite">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>e-mail</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in users'>
                                                    <td width="10px">{{  data.id  }}</td>
                                                    <td width="10px">{{  data.name  }}</td>
                                                    <td width="10px">{{  data.email  }}</td>
                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-info btn-sm" :to="{name:'EditarUsuario', params:{ id:data.id }}"><i class="fa fa-edit" aria-hidden="true"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deleteUser(data.id)"><i class="fas fa-trash"></i></a>
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
                                                @input="getUsers(currentPage)"
                                            ></b-pagination-nav>
                                        </div>

                                    </li>

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
                                        <ul >
                                        <li><a style="color: #798C8B">Administrar Usuarios</a></li>
                                        <li class="Altura"><router-link class="btn btn-link" style="color: #CE5202" :to="{name:'EditarUsuario', params:{ id:id_user }}" >Editar tu Perfil</router-link></li>
                                        <li class="Altura"><router-link class="btn btn-link" style="color: #CE5202" :to="{name:'FormularioUsuario'}" >Crear Usuario</router-link></li>
                                        <li class="Altura"><router-link class="btn btn-link" style="color: #CE5202" :to="{name:'MainUsuariosAdmin'}" >Administrar Usuarios</router-link></li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <ul >
                                        <li><a style="color: #798C8B">Roles y Asignación</a></li>
                                        <li class="Altura"><router-link class="btn btn-link" style="color: #CE5202" :to="{name:'ListaRoles'}" >Roles</router-link></li>
                                        <li class="Altura"><router-link class="btn btn-link" style="color: #CE5202" :to="{name:'ListaPermisos'}" >Permisos</router-link></li>
                                        <li class="Altura"><router-link class="btn btn-link" style="color: #CE5202" :to="{name:'ListaUsers'}" >Asignar Roles a Usuarios</router-link></li>
                                        </ul>
                                    </div>
                                </li>
                               <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link class="btn btn-link" style="color: #CE5202" :to="{name:'ListadoHorario'}" >Listar Horario</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link class="btn btn-link" style="color: #CE5202" :to="{name:'FormularioHorario'}" >Crear Horario</router-link>
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
import axios from 'axios';
    export default {
        data() {
            return {
                nombre_opt:null,
                codigo_opt:null,
                user:{},
                users: {},
                last_page:1,
                init_page:1,
                currentPage: 1,
                id_user:null
            }
        },
        methods:{
            deleteUser:function(id){
                axios.delete('/api/users/'.concat(id)).then(
                    function(response){
                        console.log(response.data)
                        this.getUsers()
                    }.bind(this)
                ).catch(err=>console.log(err))
            },
            getRoles: function(){
                axios.get('/api/roles')
                .then(function(response){
                    console.log(JSON.stringify(response.data))
                    this.collection = response.data

                }.bind(this)).catch(err=>console.warn(err))
            },

            getUsers: function(page){
                axios.post('/api/list/users?page='.concat(page)).then(function(response){
                    console.log(response.data)
                    this.users = response.data.data
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {

            this.id_user = window.Laravel.user.id

        },
        components:{

        },
        created: function(){
            this.getUsers()


        }

        };
</script>
