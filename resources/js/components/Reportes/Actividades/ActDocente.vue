<template>
  <div>

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col">
              <!--Filtro de busqueda-->
              <div class="row">
                <div class="col-md mb-2">
                  <li
                    class="list-group-item d-flex justify-content-between lh-condensed bg-light"
                  >
                    <div class="col">
                      <div class="mb-1">
                        <h3 class="text-secondary">
                          Reporte de Actividad por Docente
                        </h3>
                      </div>

                      <form @submit.prevent="search()">
                        <div class="form-group row mt-2">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Docente</span>
                            </div>
                            <select
                              class="form-control custom-select"
                              v-model="registro.codigo_pro"
                              name="codigo_act"
                              id="codigo_act"
                            >
                              <option :value="null"></option>
                              <option v-for="data in profesores":value="data.codigo_pro">
                                {{ data.apellido_pro }} {{ data.nombre_pro }}
                              </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row mt-2">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Fecha Inicio</span>
                            </div>
                            <input
                              v-model="registro.fecha_inicio"
                              name="fecha_inicio"
                              class="form-control"
                              id="fecha_inicio"
                              placeholder="Código"
                              type="date"
                            />
                          </div>
                        </div>
                        <div class="form-group row mt-2">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Fecha Fin</span>
                            </div>
                            <input
                              v-model="registro.fecha_fin"
                              name="fecha_fin"
                              class="form-control"
                              id="fecha_fin"
                              placeholder="Nombre"
                              type="date"
                            />
                          </div>
                        </div>

                        <div class="form-group row mx-auto">
                          <button
                            type="submit"
                            class="btn btn-outline-dark mt-2"
                          >
                            Actualizar Consulta &nbsp;<i
                              class="fas fa-search"
                            ></i>
                          </button>
                        </div>
                      </form>
                    </div>
                  </li>
                </div>
              </div>
{{registro}}
              <!--Table-->
              <div class="row">
                <div class="col">
                  <li

                    class="list-group-item justify-content-between lh-condensed bg-light"
                  >
                    <table class="table table-hover table-sprite">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Nombre</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="data in registros">
                          <td width="10px">{{ data.codigo_rac }}</td>
                          <td width="10px">
                            {{ data.profesor.apellido_pro }}
                            {{ data.profesor.nombre_pro }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div v-if="last_page != 1" class="overflow-auto">
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
                <li
                  class="list-group-item d-flex justify-content-between lh-condensed bg-dark"
                >
                  <div>
                    <h6 style="color: #fff" class="my-0">Operaciones</h6>
                  </div>
                </li>
                <li
                  class="list-group-item d-flex justify-content-between lh-condensed bg-light"
                >
                  <div>
                    <router-link
                      style="color: #ce5202"
                      :to="{ name: '' }"
                      class="btn btn-link"
                      >Imprimir</router-link
                    >
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
      registros: [],
      registro: {},
      profesores: [],
      last_page: 1,
      currentPage: 1,
      init_page: 1,
      flag_collection: null,
    };
  },
  methods: {
    search: function (page) {
      axios
        .post("/api/registroporrangoprof?page=".concat(page), this.registro)
        .then(

          function (response) {
            this.registros = response.data.data;
            this.last_page = response.data.last_page;
            this.currentPage = response.data.current_page;
            this.changeFlag;
            console.log("hola");
          }.bind(this)
        )
        .catch((error) => {
          console.warn(error);
        });
    },
    changeFlag: function () {
      if (this.profesor.length > 0) {
        this.flag_collection = true;
      } else {
        this.flag_collection = false;
      }
    },
  },
  mounted() {
    axios
      .get("/api/profesores")
      .then(
        function (response) {
          this.profesores = response.data;
          console.log(response.data);
        }.bind(this)
      )
      .catch((error) => {
        console.warn(error);
      });
    this.changeFlag;
  },
  components: {

  },
  created: function () {},
};
</script>
