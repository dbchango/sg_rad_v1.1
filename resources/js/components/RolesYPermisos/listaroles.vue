<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!--Formulario-->
                    <div class="row">
                            <div class="col-md mb-2">
                                    <div class="row" >

                                        <div class="col mb-2"><h4>Roles</h4><router-link class="btn btn-secondary" :to="{name:'CrearRoles'}" >Crear Roles</router-link></div>
                                    </div>
                                    <div v-for="item in collection">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card mb-3">
                                                    <div class="card-header"><h5>Rol: {{ item.name }}</h5></div>
                                                    <div class="card-body">
                                                            <span v-for="sub_item in item.permissions" class="btn btn-outline-success mb-1">{{sub_item.name}}&nbsp;&nbsp;<a @click="deleteItem(item.id, sub_item.id)"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                                                    </div>
                                                    <div class="card-body">
                                                        <router-link class="btn btn-outline-dark" :to="{name:'EditarRoles', params:{id:item.id}}" >Editar&nbsp;&nbsp;<i class="fa fa-edit" aria-hidden="true"></i></router-link>
                                                        <router-link class="btn btn-outline-dark" :to="{name:'AsignarPermisosARoles', params:{id:item.id}}" >Agregar permisos&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></router-link>
                                                        <button class="btn btn-outline-danger" @click.prevent="deleteRole(item.id)">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
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
                collection: {},
                id_user:null
            }
        },
        methods:{
            getRoles: function(){
                axios.get('/api/roles')
                .then(function(response){
                    console.log(JSON.stringify(response.data))
                    this.collection = response.data
                }.bind(this)).catch(err=>console.warn(err))
            },
            deleteItem: function(role_id, permission_id){

                axios.delete('/api/roles/'.concat(role_id).concat('/').concat(permission_id)).then(function(response){
                    console.log(response.data)
                    this.getRoles()
                }.bind(this)).catch(err=>console.warn(err))
            },
            deleteRole: function(id){
                axios.delete('/api/roles/delete/'.concat(id)).then(function(response){
                    console.log(response.data)
                    this.getRoles()
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            this.id_user = window.Laravel.user.id

        },
        components:{

        },
        created: function(){
            this.getRoles()


        }

        };
</script>
