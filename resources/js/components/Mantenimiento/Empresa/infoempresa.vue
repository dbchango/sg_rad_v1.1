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
                                            <div class="card-header bg-dark text-white"><h4>Registro N°: {{ empresa.codigo_emp }}</h4></div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Nombre Empresa</h6>
                                                <p class="card-text text-secondary">{{ empresa.nombre_emp }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Limite Acceso</h6>
                                                <p class="card-text text-secondary">{{ empresa.limite_acceso_emp }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Empresa Firma Encargado</h6>
                                                <p class="card-text text-secondary">{{ empresa.emp_firma_encargado }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Emp Pie Encargado</h6>
                                                <p class="card-text text-secondary">{{ empresa.emp_pie_encargado }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Empresa Firma Subdirector</h6>
                                                <p class="card-text text-secondary">{{ empresa.emp_firma_subdirector }}</p>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6 class="card-title text-dark">Emp Pie Subdirector</h6>
                                                <p class="card-text text-secondary">{{ empresa.emp_pie_subdirector }}</p>
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
                                        <router-link style="color: #CE5202" :to="{name:'ListadoEmpresas'}" class="btn btn-link">Listar Empresa</router-link>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div>
                                        <router-link style="color: #CE5202" :to="{name:'FormularioEmpresas'}" class="btn btn-link">Crear Empresa</router-link>
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
                empresa:{},
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/empresas/'.concat(this.$el.id), this.empresa)
                .then(function(response){
                    this.empresa = response.data
                }.bind(this)).catch(err=>console.warn(err))

        },
        components:{

        },
        created: function(){

        },

        };
</script>
