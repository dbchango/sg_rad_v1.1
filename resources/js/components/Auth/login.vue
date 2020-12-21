<template>
<div class="container">
    <div class="row justify-content-center">
    <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div id="app">
                 <b-form @submit.prevent="login" @reset="onReset" class="mt-3 " >
      <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                            <div class="col-md-6">
                                <input v-model="form.email" id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input v-model="form.password" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">


                            </div>
                        </div>

<div class="form-group row mb-3">
                            <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button></div></div>
    </b-form>

            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {

        data() {
            return {
                name: '',
                form:{}
            }
        },
        methods:{
            login: function(){
                axios.post('/api/login', this.form).then(function(result) {
                    console.log(result)
                    window.location.href = "/";
                    window.Laravel.Laravel.apiToken = result.token
                }.bind(this)).catch((err) => {
                    console.log(err)
                });
            },
            onReset: function(){
                this.form.email= null
                this.form.password= null
            }
        },
        mounted() {
            this.name = 'Behrang No';
        }

    }
</script>
