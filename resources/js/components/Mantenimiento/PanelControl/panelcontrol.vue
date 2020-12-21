<template>
    <div>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!--Formulario-->
                    <div class="row">
                        <div class="col-md mb-2">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">
                                        <h3>Importar</h3>
                                    </div>
                                    <p class="card-text">
                                        Importar datos de áreas de conocimiento (Usar solo si existe la tabla)
                                    </p>
                                    <b-button variant="outline-secondary">Ejecutar&nbsp;<i class="fas fa-check"></i></b-button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md mb-2">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">
                                        <h3>Autoevaluación</h3>
                                    </div>
                                    <p class="card-text">
                                        Generar Auto Evaluación
                                    </p>
                                    <b-dropdown text="Periodo">
                                        <b-dropdown-item v-for="data in periodos">{{ data.nombre_per }}</b-dropdown-item>
                                    </b-dropdown>&nbsp;
                                    <b-button variant="outline-secondary">Ejecutar&nbsp;<i class="fas fa-check"></i></b-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md mb-2">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">
                                        <h3>Evaluación Administrativa</h3>
                                    </div>
                                    <p class="card-text">
                                        Generar Evaluación Administrativa
                                    </p>
                                    <b-dropdown text="Periodo">
                                        <b-dropdown-item v-for="data in periodos">{{ data.nombre_per }}</b-dropdown-item>
                                    </b-dropdown>&nbsp;
                                    <b-button variant="outline-secondary">Subir&nbsp;<i class="fas fa-cloud-upload-alt"></i></b-button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md mb-2">
                            <div class="card">

                                <div class="card-body">
                                    <div class="card-title">
                                        <h3>Co Evaluación</h3>
                                    </div>
                                    <p class="card-text">
                                        Generar Co evaluacion (Revisar los parámetros en Controller)
                                        </p>
                                    <b-dropdown text="Periodo">
                                        <b-dropdown-item v-for="data in periodos">{{ data.nombre_per }}</b-dropdown-item>
                                    </b-dropdown>&nbsp;
                                    <b-button variant="outline-secondary">Ejecutar&nbsp;<i class="fas fa-check"></i></b-button>
                                </div>
                            </div>
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
                periodos: []
            }
        },
        methods:{

        },
        mounted() {
            axios.get('/api/periodos')
            .then(function(response){
                this.periodos = response.data;
            }.bind(this)).catch(err=>console.warn(err))
        },
        components:{

        },
        created: function(){

        }

        };
</script>
