<template>
  <div>
    <section class="section db p120">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="tagline-message page-title text-center">
              <h3>Table of Specifications (TOS) Generation</h3>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end section -->

    <section class="section gb nopadtop">
      <div class="container">
        <div class="boxed">
          <div class="row">
            <div class="col-md-12">
              <!-- <p class="lead">Get Started.</p> -->
              <p>Fill in the necessary data.</p>
              <button
                type="button"
                class="btn btn-info"
                @click="addNewRow"
                style="float:right; margin:10px;"
              >
                <i class="fa fa-plus-circle"></i>
                Add
              </button>
              <div class="base-demo" style="width: 100%">
                <table style=" table-layout: fixed; width:100%" id="table-header">
                  <tr>
                    <th style="width:20%">Topics</th>
                    <th style="width:8%">No. of Hours</th>
                    <th style="width:8%">Percent (%)</th>
                    <th style="width:63%">
                      Cognitive Skills Tested
                      <table style="width:100%" class="table-sub1">
                        <tr>
                          <th>Remember</th>
                          <th>Understand</th>
                          <th>Apply</th>
                          <th>Analyze</th>
                          <th>Evaluate</th>
                          <th>Create</th>
                        </tr>
                      </table>

                      <table class="table-sub1">
                        <tr>
                          <th>
                            <input
                              type="number"
                              class="percentage-input"
                              v-model="
                                                                data_container.remember_understand
                                                            "
                            />
                            %
                          </th>
                          <th>
                            <input
                              type="number"
                              class="percentage-input"
                              v-model="
                                                                data_container.apply_analyze
                                                            "
                            />
                            %
                          </th>
                          <th>
                            <input
                              type="number"
                              class="percentage-input"
                              v-model="
                                                                data_container.evaluate_create
                                                            "
                            />
                            %
                          </th>
                        </tr>
                      </table>
                    </th>
                    <th style="width:8%">Total</th>
                    <th style="width:3%; border: none;"></th>
                  </tr>
                </table>

                <table class="table-main">
                  <tr
                    v-for="(tos_data,
                                        k) in data_container.tos_datas"
                    :key="k"
                  >
                    <td style="width:20%">
                      <textarea-autosize v-model="tos_data.topics" :autosize="true" :row="1" />
                    </td>
                    <td style="width:8%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="tos_data.no_of_hours"
                        v-on:keyup="
                                                    calculateHoursTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:8%">
                      <input class="tos-input" type="number" v-model="tos_data.percent" readonly />
                    </td>
                    <td style="width:21%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    tos_data.remember_understand
                                                "
                        v-on:keyup="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:21%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="tos_data.apply_analyze"
                        v-on:keyup="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:21%">
                      <input
                        class="tos-input"
                        type="text"
                        v-model="
                                                    tos_data.evaluate_create
                                                "
                        v-on:keyup="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:8%">
                      <input class="tos-input" type="number" v-model="tos_data.total" />
                    </td>
                    <td style="width:3%">
                      <i class="fa fa-trash" @click="deleteRow(k, tos_data)"></i>
                    </td>
                  </tr>
                </table>

                <table class="table-main">
                  <tr>
                    <td style="width:20%">
                      <input class="tos-input" type="Text" value="Total" readonly />
                    </td>
                    <td style="width:8%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container.total_no_of_hours
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:8%">
                      <input
                        class="tos-input"
                        type="text"
                        v-model="
                                                    data_container.total_percent
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:21%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container.total_remember_understand
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:21%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container.total_apply_analyze
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:21%">
                      <input
                        class="tos-input"
                        type="text"
                        v-model="
                                                    data_container.total_evaluate_create
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:8%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container.total_total
                                                "
                        readonly
                      />
                    </td>

                    <td style="width:3%; border: none;"></td>
                  </tr>
                </table>
              </div>

              <button v-on:click="goBack()" class="btn btn-primary" style="margin-top:10px">back</button>
              <button
                v-on:click="generateTos()"
                class="btn btn-primary"
                style="margin-top:10px"
              >Generate TOS</button>
            </div>
            <!-- end desc -->
          </div>
          <!-- end blog -->
        </div>
        <!-- end content -->
      </div>

      <!-- end container -->
    </section>
  </div>
</template>
<script>
export default {
  data: function() {
    return {
      data_container: {
        percent_remember_understand: null,
        percent_apply_analyze: null,
        percent_evaluate_create: null,
        total_no_of_hours: null,
        total_percent: null,
        total_remember_understand: null,
        total_apply_analyze: null,
        total_evaluate_create: null,
        total_total: null,
        tos_datas: [
          {
            topics: "",
            no_of_hours: null,
            percent: null,
            remember_understand: null,
            apply_analyze: null,
            evaluate_create: null,
            total: null
          }
        ]
      }
    };
  },
  computed: {},
  mounted() {
    let app = this;
    app.data_container = this.$store.state.data_container;
  },
  methods: {
    goBack() {
      let app = this;
      this.$store.commit("changeDataContainer", app.data_container);
      this.$router.push({ name: "GetStarted" });
    },
    generateTos() {
      let app = this;
      this.$store.commit("changeDataContainer", app.data_container);
      this.$router.push({ name: "GenerateTosFinal" });
    },
    addNewRow() {
      this.data_container.tos_datas.push({
        topics: "",
        no_of_hours: "",
        percent: "",
        remember_understand: "",
        apply_analyze: "",
        evaluate_create: "",
        total: ""
      });
    },
    deleteRow(index, tos_data) {
      var idx = this.data_container.tos_datas.indexOf(tos_data);
      console.log(idx, index);
      if (idx > -1) {
        this.data_container.tos_datas.splice(idx, 1);
      }
      this.calculateTotal();
      this.calculatePercentTotal();
      this.calculateHoursTotal();
    },
    calculateLineTotal(tos_data) {
      var remember_understand = parseInt(tos_data.remember_understand) || 0;
      var apply_analyze = parseInt(tos_data.apply_analyze) || 0;
      var evaluate_create = parseInt(tos_data.evaluate_create) || 0;
      var total = remember_understand + apply_analyze + evaluate_create;

      if (!isNaN(total)) {
        tos_data.total = total.toFixed(0);
      }
      this.calculateTotal();
    },
    calculateTotal() {
      let app = this;
      var subtotal;
      subtotal = app.data_container.tos_datas.reduce(function(sum, tos) {
        var lineTotal = parseFloat(tos.total) || 0;
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      }, 0);
      this.data_container.total_total = subtotal;

      var remember_understand = app.data_container.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal = parseFloat(tos.remember_understand) || 0;

        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container.total_remember_understand = remember_understand;

      var apply_analyze = app.data_container.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal = parseFloat(tos.apply_analyze) || 0;

        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container.total_apply_analyze = apply_analyze;

      var evaluate_create = app.data_container.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal = parseFloat(tos.evaluate_create) || 0;

        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container.total_evaluate_create = evaluate_create;
    },
    calculatePercentTotal() {
      let app = this;
      var percent = app.data_container.tos_datas.reduce(function(sum, tos) {
        var lineTotal = parseFloat(tos.percent) || 0;

        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      }, 0);
      this.data_container.total_percent = percent + " %";
    },
    calculateHoursTotal(tos_data) {
      let app = this;
      var no_of_hours = app.data_container.tos_datas.reduce(function(sum, tos) {
        var lineTotal = parseFloat(tos.no_of_hours) || 0;
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      }, 0);
      tos_data.percent = tos_data.no_of_hours / no_of_hours;
      this.data_container.total_no_of_hours = no_of_hours;
    }
  }
};
</script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-weight: 600;
  font-family: Helvetica, Arial, Microsoft YaHei;
  font-size: 13px;
  color: #606266;
}

.percentage-input {
  width: 15%;
  text-align: center;
  outline: 0;
  border-width: 0 0 2px;
  border-color: inherit;
  margin: 2px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.table-main {
  table-layout: fixed;
  width: 100%;
}
.tos-input {
  width: 100%;
  outline: 0;
  border: 0;
  padding: 6px;
  font-weight: lighter;
  text-align: center;
}

.table-sub1 {
  table-layout: fixed;
  width: 100%;
}
.table-sub1 > tr > th {
  width: 25%;
}
td,
th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 0px;
}

tr:nth-child(even) {
  background-color: #ffffff;
}

textarea {
  border: none;
  margin: 2px;
  height: fit-content;
  outline: none;
  box-shadow: none;
  font-weight: lighter;
}
</style>
