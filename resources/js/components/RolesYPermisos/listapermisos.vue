<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="row" >

                                        <div class="col mb-2"><h4>Permisos</h4><router-link class="btn btn-secondary" :to="{name:'CrearPermisos'}" >Crear Permisos</router-link></div>
                                    </div>
                            <!--Table-->
                            <div class="row">
                                <div class="col">
                                    <li class="list-group-item justify-content-between lh-condensed bg-light">
                                        <table class="table table-hover table-sprite">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>Fecha creacion</th>
                                                    <th>Valor</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for='data in permisos'>
                                                    <td width="10px">{{  data.id  }}</td>
                                                    <td width="10px">{{  data.name  }}</td>
                                                    <td width="10px">{{  data.created_at  }}</td>
                                                    <td width="10px">{{  data.updated_at  }}</td>

                                                    <td width="40px">
                                                        <router-link class="btn btn-outline-success btn-sm" :to="{name:'EditarPermisos', params:{ id:data.id }}"><i class="fas fa-edit"></i></router-link>
                                                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="deletePermiso(data.id)"><i class="fas fa-trash"></i></a>
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
                codigo_opt:null,
                periodo_opt:null,
                nombre_opt:null,
                valor_opt:null,
                permisos:[],
                calificacion:{},
                last_page:1,
                init_page:1,
                currentPage: 1,
                id_user:null
            }
        },
        methods:{
            search:function(page){
                axios.post('/api/list/permissions?page='.concat(page))
                .then(function (response) {
                    this.permisos = response.data.data;
                    this.last_page = response.data.last_page;
                    this.currentPage = response.data.current_page;
                }.bind(this));
            },
            deletePermiso:function(id){
                axios.delete('/api/permissions/'.concat(id)).then(function(response){
                    console.log(response.data)
                    this.search()
                }.bind(this)).catch(err=>console.warn(err))
            }
        },
        mounted() {
            this.id_user = window.Laravel.user.id
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
