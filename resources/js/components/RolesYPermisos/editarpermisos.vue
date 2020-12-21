<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!--Formulario-->
                    <div class="row">
                            <div class="col-md mb-2">
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div class="col">
                                        <h3 class="text-secondary">Editar registro N°: &nbsp;<a>{{ $route.params.id }}</a></h3>
                                        <form @submit.prevent="submit">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nombre</label>
                                            <div class="col-sm-8">
                                                <input required type="text" v-model="permission.name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Guard name</label>
                                            <div class="col-sm-8">
                                                <p>{{ permission.guard_name }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha de creación</label>
                                            <div class="col-sm-8">
                                                <p>{{ permission.created_at }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Ultima actualización</label>
                                            <div class="col-sm-8">
                                                <p>{{ permission.updated_at }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row mx-auto">
                                            <button type="submit" value="submit" class="btn btn-outline-dark mt-2">Guardar&nbsp;<i class="fas fa-save"></i></button>
                                        </div>
                                    </form>
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

    export default {
        data() {
            return {
                permission: {},

                id_user:null

            }
        },
        methods:{
            submit: function(){
                axios.put('/api/permissions/'.concat(this.$el.id), this.permission)
                .then(function(response){
                    console.log(response.data)
                    window.history.back();
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            this.id_user = window.Laravel.user.id
            axios.get('/api/permissions/'.concat(this.$el.id)).then(
                function(response){
                    this.permission = response.data
                }.bind(this)).catch(err=>console.log(err))




        },
        components:{

        },
        created: function(){



        }

        };
</script>
