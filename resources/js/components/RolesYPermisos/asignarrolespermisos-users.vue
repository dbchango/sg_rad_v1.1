<template>
    <div>
        <div class="container-fluid">
            <div class="row">

                <div class="col">
                    <div class="row">
                        <div class="col">
                             <!--Card-->
                            <div class="row">
                                <div class="col-md mb-2">
                                    <div class="card text-black   mb-3" style="max-width: auto;">
                                        <div class="card-header bg-dark text-white"><h4>{{user.name}}</h4></div>
                                        <div class="card-body">
                                            <h6>Roles asignados:</h6>
                                            <span v-for="item in user.roles" class="btn btn-outline-success mb-1">{{item.name}}&nbsp;&nbsp;<a @click="removeRoles(item.id)"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                                        </div>
                                        <div class="card-body">
                                            <h6>Permisos asignados:</h6>
                                            <span v-for="item in user.all_permissions" class="btn btn-outline-success mb-1">{{item.name}}&nbsp;&nbsp;<a @click="revokePermission(item.id)"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-2">
                                    <div class="card text-black   mb-3" style="max-width: auto;">
                                        <div class="card-header bg-dark text-white"><h4>Roles</h4></div>
                                        <div class="card-body">
                                            <span v-for="role in roles" class="btn btn-outline-primary mb-1">{{role.name}}&nbsp;&nbsp;<a @click="giveRole(role.id)"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-2">
                                    <div class="card text-black   mb-3" style="max-width: auto;">
                                        <div class="card-header bg-dark text-white"><h4>Permisos</h4></div>
                                        <div class="card-body">
                                            <span v-for="permission in permissions" class="btn btn-outline-primary mb-1">{{permission.name}}&nbsp;&nbsp;<a @click="givePermission(permission.id)"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
                                        </div>
                                        <div v-if="last_page!=1" class="overflow-auto">
                                            <b-pagination-nav
                                                align="center"
                                                v-model="currentPage"
                                                :number-of-pages="last_page"
                                                base-url="#"
                                                @input="getPermissions(currentPage)"
                                            ></b-pagination-nav>
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

    export default {
        data() {
            return {
                home: 'HOME',

                user:{
                    all_permissions:[],
                    roles:[]
                },
                permissions:[],
                roles:[],
                last_page:1,
                init_page:1,
                currentPage: 1,
                id_user : null
            }
        },
        methods:{
            getUsers:function(){
                axios.get('/api/users/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.user=response.data;
                }.bind(this)).catch(err=>console.log(err));
            },
            getRoles:function(){
                axios.get('/api/roles')
                .then(function (response) {
                    console.warn(response.data)
                    this.roles=response.data;
                }.bind(this)).catch(err=>console.log(err));
            },
            getPermissions:function(page){
                axios.post('/api/list/permissions?page='.concat(page)).then(
                    function(response){
                        this.permissions = response.data.data;
                        this.last_page = response.data.last_page;
                        this.currentPage = response.data.current_page;
                    }.bind(this)
                ).catch(err=>console.log(err))
            },
            givePermission:function(permission_id){
                axios.post('/api/users/givepermission/'.concat(this.$el.id).concat('/').concat(permission_id))
                .then(function(response){
                    console.warn(response.data)
                    this.getUsers()
                }.bind(this)).catch(err=>console.warn(err))
            },
            giveRole:function(role_id){
                axios.post('/api/users/giverole/'.concat(this.$el.id).concat('/').concat(role_id))
                .then(function(response){
                    console.warn(response.data)
                    this.getUsers()
                }.bind(this)).catch(err=>console.warn(err))
            },
            removeRoles: function(role_id){
                axios.delete('/api/users/removerole/'.concat(this.$el.id).concat('/').concat(role_id)).then(function(response){
                    console.log(response.data)
                    this.getUsers()
                }.bind(this)).catch(err=>console.warn(err))
            },
            revokePermission: function(permission_id){
                axios.delete('/api/users/revokepermission/'.concat(this.$el.id).concat('/').concat(permission_id)).then(function(response){
                    console.log(response.data)
                    this.getUsers()
                }.bind(this)).catch(err=>console.warn(err))
            }

        },
        mounted() {
            this.id_user = window.Laravel.user.id
            axios.get('/api/users/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.user=response.data;

                }.bind(this));
        },
        components:{

        },
        created: function(){
            this.getPermissions(),
            this.getRoles()
        },

        };
</script>
