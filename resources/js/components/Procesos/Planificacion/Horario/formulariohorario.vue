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
                                        <h3 class="text-secondary">Formulario:</h3>
                                        <form @submit.prevent="submit">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Código</label>
                                                <div class="col-sm-8">
                                                    <input required maxlength="11" min="1" v-model="horario.codigo_hor" name="codigo_hor" class="form-control" id="codigo_hor" placeholder="Código">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Periodo</label>
                                                <div class="col-sm-8">
                                                    <select required class="form-control custom-select" name="" id="" v-model="horario.codigo_per">
                                                        <option v-for="data in periodos" :value="data.codigo_per">{{ data.nombre_per }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Profesor</label>
                                                <div class="col-sm-8">
                                                    <select required class='form-control custom-select' v-model="horario.codigo_pro" name="codigo_pro" id="codigo_pro">
                                                        <option v-for="data in profesores" :value="data.codigo_pro">{{ data.cedula_pro }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Materia</label>
                                                    <div class="col-sm-8">
                                                        <select required class='form-control custom-select' v-model="horario.codigo_mat" name="codigo_mat" id="codigo_mat">
                                                            <option v-for="data in materias" :value="data.codigo_mat">{{ data.nombre_mat }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Recuperación</label>
                                                    <div class="col-sm-8">
                                                        <select required class='form-control custom-select' v-model="horario.codigo_rec" name="codigo_rec" id="codigo_rec">
                                                            <option v-for="data in recuperaciones" :value="data.codigo_rec">{{ data.codigo_rec }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Día de recuperación</label>
                                                    <div class="col-sm-8">
                                                        <select required class="form-control custom-select" v-model="horario.codigo_dia" name="codigo_dia" id="codigo_dia">
                                                            <option v-for="data in dias" :value="data.codigo_dia">{{ data.nombre_dia }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Hora de entrada:</label>
                                                    <div class="col-sm-8">
                                                        <input required type="time" v-model="horario.hora_entrada_hor" name="hora_entrada_hor" class="form-control" id="hora_entrada_hor" placeholder="HoraEntrada">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Hora de salida:</label>
                                                    <div class="col-sm-8">
                                                        <input required type="time" v-model="horario.hora_salida_hor" name="hora_entrada_hor" class="form-control" id="hora_entrada_hor" placeholder="HoraEntrada">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Numero de horas:</label>
                                                    <div class="col-sm-8">
                                                        <input v-model="horario.numero_horas_hor" type="number" class="form-control" min="1" name="numero_horas_hor" id="numero_horas_hor">
                                                    </div>
                                                </div>
                                            <div class="form-group row mx-auto">
                                                <button type="submit" class="btn btn-outline-dark mt-2">Guardar&nbsp;<i class="fas fa-save"></i></button>
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
                horario:{},
                departamentos: [],
                periodos:[],
                materias:[],
                dias:[],
                recuperaciones:[],
                profesores:[]
            }
        },
        methods:{
            submit: function(){
                this.horario;
                axios.post('/api/horarios', this.horario)
                    .then(function (response) {
                        console.warn(response)
                        this.horario = {};
                        window.history.back();
                    }.bind(this)).catch(err=>console.warn(err));
            }
        },
        mounted() {
            axios.get('/api/periodos')
                .then(function (response) {
                    this.periodos = response.data;
                }.bind(this)).catch(err=>console.warn(err));
            axios.get('/api/profesores')
                .then(function(response){
                    this.profesores = response.data;
                }.bind(this)).catch(err=>console.warn(err));
            axios.get('/api/materias')
                .then(function (response) {
                    this.materias = response.data;
                }.bind(this)).catch(err=>console.warn(err));
            axios.get('/api/dias')
                .then(function (response) {
                    this.dias = response.data;
                }.bind(this)).catch(err=>console.warn(err));
            axios.get('/api/recuperaciones')
                .then(function (response) {
                    this.recuperaciones = response.data;
                }.bind(this)).catch(err=>console.warn(err));
        },
        components:{

        },
        created: function(){

        },

        };
</script>
