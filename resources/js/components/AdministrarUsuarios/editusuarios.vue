<template>
    <div>
        <div class="container-fluid">

            <div class="row">


                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="row">

                                    <div class="col">
                                        <h3 class="text-secondary">Editar registro N°: &nbsp;<a>{{ $route.params.id }}</a></h3>
                                        <form @submit.prevent="submit">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-8">
                                                <input required v-model="usuario.name" class="form-control" id="name" type="text" min="1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Correo</label>
                                            <div class="col-sm-8">
                                                <input required v-model="usuario.email" class="form-control" id="email" type="email" min="1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input required v-model="usuario.password" class="form-control" id="email" type="password" min="1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Último acceso</label>
                                            <div class="col-sm-8">
                                                <p>{{ usuario.updated_at }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row mx-auto">
                                            <button type="submit" value="submit" class="btn btn-outline-dark mt-2">Guardar Cambios&nbsp;<i class="fas fa-save"></i></button>
                                        </div>
                                    </form>
                                    </div>

            </div>
                             <!--Card-->



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
                usuario:{},
                user:{
                    all_permissions:[],
                    roles:[]
                },
                permissions:[],
                roles:[],
                last_page:1,
                init_page:1,
                currentPage: 1,
                id_user:null
            }
        },
        methods:{

            submit: function(){
                axios.put('/api/users/'.concat(this.$el.id), this.usuario).then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }

        },
        mounted() {
            this.id_user = window.Laravel.user.id
            axios.get('/api/users/'.concat(this.$el.id))
                .then(function (response) {
                    console.warn(response.data)
                    this.usuario=response.data;

                }.bind(this));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
