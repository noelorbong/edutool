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
              <p>
                <span style="font-weight:600">Note:</span> Click the item number to edit.
              </p>

              <div class="base-demo" style="width: 100%">
                <table style=" table-layout: fixed; width:100%" id="table-header">
                  <tr>
                    <th style="width:20%">Topics</th>
                    <th style="width:8%">No. of Hours</th>
                    <th style="width:8%">Percent (%)</th>
                    <th style="width:66%; padding:0px;">
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
                        <tr>
                          <th>Item No.</th>
                          <th>Item No.</th>
                          <th>Item No.</th>
                          <th>Item No.</th>
                          <th>Item No.</th>
                          <th>Item No.</th>
                        </tr>
                      </table>
                    </th>
                    <th style="width:8%">Total</th>
                  </tr>
                </table>

                <table class="table-main">
                  <tr
                    v-for="(tos_data,
                                        k) in data_container_final.tos_datas"
                    :key="k"
                  >
                    <td style="width:20%">
                      <p>{{ tos_data.topics }}</p>
                    </td>
                    <td style="width:8%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="tos_data.no_of_hours"
                        v-on:keyup="
                                                    calculateHoursTotal()
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:8.1%">
                      <span style="font-weight:normal;">{{tos_data.percent}} %</span>
                    </td>
                    <td style="width:11%">
                      <textarea-autosize
                        v-model="tos_data.remember"
                        :autosize="true"
                        :row="1"
                        v-on:input="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:11%">
                      <textarea-autosize
                        v-model="tos_data.understand"
                        :autosize="true"
                        :row="1"
                        v-on:input="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:11%">
                      <textarea-autosize
                        v-model="tos_data.apply"
                        :autosize="true"
                        :row="1"
                        v-on:input="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:11%">
                      <textarea-autosize
                        v-model="tos_data.analyze"
                        :autosize="true"
                        :row="1"
                        v-on:input="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:11%">
                      <textarea-autosize
                        v-model="tos_data.evaluate"
                        :autosize="true"
                        :row="1"
                        v-on:input="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:11%">
                      <textarea-autosize
                        v-model="tos_data.create"
                        :autosize="true"
                        :row="1"
                        v-on:input="
                                                    calculateLineTotal(tos_data)
                                                "
                      />
                    </td>
                    <td style="width:8.1%">
                      {{ tos_data.total }}
                      <!-- <input
                                                class="tos-input"
                                                type="number"
                                                v-model="tos_data.total"
                      />-->
                    </td>
                  </tr>
                </table>

                <table class="table-main">
                  <tr>
                    <td style="width:20%">
                      <input class="tos-input" type="Text" value="Total" readonly />
                    </td>
                    <td style="width:7.9%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container_final.total_no_of_hours
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:8%">
                      <span style="font-weight:normal">{{data_container_final.total_percent}} %</span>
                    </td>
                    <td style="width:11%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container_final.total_remember
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:11%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container_final.total_understand
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:11%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container_final.total_apply
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:11%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container_final.total_analyze
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:11%">
                      <input
                        class="tos-input"
                        type="text"
                        v-model="
                                                    data_container_final.total_evaluate
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:11%">
                      <input
                        class="tos-input"
                        type="text"
                        v-model="
                                                    data_container_final.total_create
                                                "
                        readonly
                      />
                    </td>
                    <td style="width:8%">
                      <input
                        class="tos-input"
                        type="number"
                        v-model="
                                                    data_container_final.total_total
                                                "
                        readonly
                      />
                    </td>
                  </tr>
                </table>
              </div>
              <form v-on:submit="saveForm()">
                <div>
                  <p style="margin-top:10px;">Provide Signatories:</p>
                  <div class="row">
                    <div class="col-md-4">
                      <input
                        type="text"
                        v-model="
                                                data_container_final.faculty
                                            "
                        class="form-control col-4"
                        placeholder="Name of Faculty"
                        style="margin-bottom:5px"
                        required
                      />
                      <input
                        v-model="
                                                data_container_final.chair_person
                                            "
                        type="text"
                        class="form-control col-4"
                        placeholder="Area/Program Chair Person"
                        style="margin-bottom:5px"
                        required
                      />
                      <input
                        type="text"
                        v-model="
                                                data_container_final.focal_person
                                            "
                        class="form-control col-4"
                        placeholder="  Focal Person for Quality Assurance	"
                        style="margin-bottom:5px"
                        required
                      />
                      <select
                        class="form-control col-6"
                        style="margin-bottom:5px"
                        v-model="data_container_final.college_department"
                        @change="changeDean()"
                      >
                        <!-- <option value="College/Department "
                                                >College/Department
                        </option>-->
                        <option value="Arts and Sciences">Arts and Sciences</option>
                        <option value="Education">Education</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Industrial Technology">Industrial Technology</option>
                        <option value="Nursing and Health Sciences">Nursing and Health Sciences</option>
                        <option value="Graduate Studies">Graduate Studies</option>
                      </select>

                      <input
                        v-model="
                                                data_container_final.college_dean
                                            "
                        type="text"
                        class="form-control col-4"
                        placeholder=" Dean of the College	"
                        readonly
                      />
                    </div>
                  </div>
                </div>
                <button
                  type="submit"
                  style="float:right; margin-left:10px;"
                  class="btn btn-primary"
                >PDS Download</button>
                <a v-on:click="goBack()" class="btn btn-primary" style="float:right">back</a>
              </form>
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
// import jsPDF from "jspdf";
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
      },
      data_container_final: {
        _token: document.head.querySelector('meta[name="csrf-token"]').content,
        total_no_of_hours: null,
        total_percent: null,
        total_remember: null,
        total_understand: null,
        total_apply: null,
        total_analyze: null,
        total_evaluate: null,
        total_create: null,
        total_total: null,
        faculty: "",
        chair_person: "",
        focal_person: "",
        college_department: "Arts and Sciences",
        college_dean: "",
        tos: {
          examination: "Midterm",
          semester: "First",
          college: "Arts and Sciences",
          school_year: "",
          subject_code: "",
          subject_description: ""
        },
        tos_datas: [
          // {
          //     topics: "",
          //     no_of_hours: null,
          //     percent: null,
          //     remember: null,
          //     understand: null,
          //     apply: null,
          //     analyze: null,
          //     evaluate: null,
          //     create: null,
          //     total: null
          // }
        ]
      },
      tos_model: {
        topics: "",
        no_of_hours: null,
        percent: null,
        remember: null,
        understand: null,
        apply: null,
        analyze: null,
        evaluate: null,
        create: null,
        total: null
      }
    };
  },
  computed: {},
  mounted() {
    let app = this;
    // app.data_container_final.tos_datas = [];
    var tos_datas_final = [];
    app.data_container_final.faculty = this.$store.state.signatories.faculty;
    app.data_container_final.chair_person = this.$store.state.signatories.chair_person;
    app.data_container_final.focal_person = this.$store.state.signatories.focal_person;
    app.data_container_final.college_department = this.$store.state.signatories.college_department;
    app.data_container_final.college_dean = this.$store.state.signatories.college_dean;

    app.data_container = this.$store.state.data_container;
    app.data_container_final.tos = this.$store.state.tos;

    app.data_container_final.total_no_of_hours =
      app.data_container.total_no_of_hours;
    app.data_container_final.total_percent = app.data_container.total_percent;
    app.data_container_final.total = app.data_container.total_total;
    // console.log(app.data_container.tos_datas);
    var counter = 1;
    $.each(app.data_container.tos_datas, function(key, value) {
      app.tos_model = {};
      app.tos_model.topics = value.topics;
      app.tos_model.no_of_hours = value.no_of_hours;
      app.tos_model.percent = value.percent;
      app.tos_model.total = value.total;

      var remember_understand = app.tosGenerator(
        value.remember_understand,
        counter
      );
      app.tos_model.remember = remember_understand[0];
      app.tos_model.understand = remember_understand[1];
      counter = remember_understand[2];

      var apply_analyze = app.tosGenerator(value.apply_analyze, counter);
      app.tos_model.apply = apply_analyze[0];
      app.tos_model.analyze = apply_analyze[1];
      counter = apply_analyze[2];

      var evaluate_create = app.tosGenerator(value.evaluate_create, counter);
      app.tos_model.evaluate = evaluate_create[0];
      app.tos_model.create = evaluate_create[1];
      counter = evaluate_create[2];

      app.data_container_final.tos_datas.push(app.tos_model);
    });

    app.calculateTotal();
  },
  methods: {
    changeDean() {
      let app = this;
      if (app.data_container_final.college_department == "Arts and Sciences") {
        app.data_container_final.college_dean = "Florabelle B. Patosa, Ph D.";
      } else if (app.data_container_final.college_department == "Education") {
        app.data_container_final.college_dean = "Gina U. Espano, Ph D.";
      } else if (app.data_container_final.college_department == "Engineering") {
        app.data_container_final.college_dean = "Engr. Meddy S. Mangaring";
      } else if (
        app.data_container_final.college_department ==
        "Nursing and Health Sciences"
      ) {
        app.data_container_final.college_dean = "Dolores L. Arteche, DN";
      } else if (
        app.data_container_final.college_department == "Industrial Technology"
      ) {
        app.data_container_final.college_dean = "Gamaliel A. Baldos, Ph D.";
      } else if (
        app.data_container_final.college_department == "Graduate Studies"
      ) {
        app.data_container_final.college_dean =
          "Esteban A. Malindog, Jr., Ph.D";
      }
      // console.log();
    },
    goBack() {
      let app = this;
      var signatories = {
        faculty: "",
        chair_person: "",
        focal_person: "",
        college_department: "Arts and Sciences",
        college_dean: ""
      };
      signatories.faculty = app.data_container_final.faculty;
      signatories.chair_person = app.data_container_final.chair_person;
      signatories.focal_person = app.data_container_final.focal_person;
      signatories.college_department =
        app.data_container_final.college_department;
      signatories.college_dean = app.data_container_final.college_dean;
      this.$store.commit("changeSignatories", signatories);
      this.$router.push({ name: "GenerateTos" });
    },
    tosGenerator(value, number_counter) {
      var value_float = parseFloat(value / 2);
      var value_int = parseInt(value / 2);
      var str1 = "";
      var str2 = "";

      var i;
      for (i = 1; i <= value; i++) {
        if (i <= value_int) {
          str1 += number_counter + ",";
        } else {
          str2 += number_counter + ",";
        }
        number_counter++;
      }

      return [
        str1.replace(/,\s*$/, ""),
        str2.replace(/,\s*$/, ""),
        number_counter
      ];
    },
    calculateLineTotal(tos_data) {
      var remember =
        this.hasData(tos_data.remember) == true
          ? tos_data.remember.split(",").length
          : 0;

      var understand =
        this.hasData(tos_data.understand) == true
          ? tos_data.understand.split(",").length
          : 0;
      var apply =
        this.hasData(tos_data.apply) == true
          ? tos_data.apply.split(",").length
          : 0;
      var analyze =
        this.hasData(tos_data.analyze) == true
          ? tos_data.analyze.split(",").length
          : 0;
      var evaluate =
        this.hasData(tos_data.evaluate) == true
          ? tos_data.evaluate.split(",").length
          : 0;
      var create =
        this.hasData(tos_data.create) == true
          ? tos_data.create.split(",").length
          : 0;

      var total = remember + understand + apply + analyze + evaluate + create;
      // console.log(total);

      tos_data.total = total.toFixed(0);

      this.calculateTotal();
    },
    calculateTotal() {
      let app = this;
      var subtotal;
      subtotal = app.data_container_final.tos_datas.reduce(function(sum, tos) {
        var lineTotal = parseFloat(tos.total) || 0;
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      }, 0);
      this.data_container_final.total_total = subtotal;

      var remember = app.data_container_final.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal =
          app.hasData(tos.remember) == true
            ? tos.remember.split(",").length
            : 0;
        // console.log(lineTotal.split(",").length);
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container_final.total_remember = remember;

      var understand = app.data_container_final.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal =
          app.hasData(tos.understand) == true
            ? tos.understand.split(",").length
            : 0;
        // console.log(lineTotal.split(",").length);
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container_final.total_understand = understand;

      var apply = app.data_container_final.tos_datas.reduce(function(sum, tos) {
        var lineTotal =
          app.hasData(tos.apply) == true ? tos.apply.split(",").length : 0;
        // console.log(lineTotal.split(",").length);
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      }, 0);
      this.data_container_final.total_apply = apply;

      var analyze = app.data_container_final.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal =
          app.hasData(tos.analyze) == true ? tos.analyze.split(",").length : 0;
        // console.log(lineTotal.split(",").length);
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container_final.total_analyze = analyze;

      var evaluate = app.data_container_final.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal =
          app.hasData(tos.evaluate) == true
            ? tos.evaluate.split(",").length
            : 0;
        // console.log(lineTotal.split(",").length);
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container_final.total_evaluate = evaluate;

      var create = app.data_container_final.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal =
          app.hasData(tos.create) == true ? tos.create.split(",").length : 0;
        // console.log(lineTotal.split(",").length);
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container_final.total_create = create;
    },
    calculatePercentTotal() {
      let app = this;
      var percent = app.data_container_final.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal = parseFloat(tos.percent) || 0;

        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container_final.total_percent = percent + " %";
    },
    calculateHoursTotal() {
      let app = this;
      var no_of_hours = app.data_container_final.tos_datas.reduce(function(
        sum,
        tos
      ) {
        var lineTotal = parseFloat(tos.no_of_hours) || 0;
        if (!isNaN(lineTotal)) {
          return sum + lineTotal;
        }
      },
      0);
      this.data_container_final.total_no_of_hours = no_of_hours;
    },
    hasData(data) {
      var has_data = true;

      if (data.trim() == "") {
        has_data = false;
      }
      return has_data;
    },
    saveForm() {
      event.preventDefault();
      var app = this;

      axios
        .post("/tos/store", app.data_container_final)
        .then(function(resp) {
          // console.log(resp);
          window.open("/doc/" + resp.data.token, "_blank");
        })
        .catch(function(resp) {
          console.log(resp);
        });
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
  width: 95%;
  margin: 2px;
  height: fit-content;
  outline: none;
  box-shadow: none;
  font-weight: lighter;
}
</style>
