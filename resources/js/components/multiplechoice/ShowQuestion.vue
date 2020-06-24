<template>
  <div class="vld-parent">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :is-full-page="fullPage"
      :loader="loader"
      :color="loaderColor"
    ></loading>
    <section class="section db p120">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="tagline-message page-title text-center">
              <h3>Multiple-Choice Test Question</h3>
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
            <div class="col-md-12" style="text-align:center;">
              <div style="float:right" class="search-wrapper panel-heading col-sm-4">
                <input
                  class="form-control"
                  type="text"
                  v-model="inputSearchMessage"
                  placeholder="Search"
                />
              </div>
            </div>
            <div class="col-md-12" style="text-align:center;">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td style="width:100px;">Question ID</td>
                      <td>Subject Code</td>
                      <td>Subject Description</td>
                      <td>Chapter</td>
                      <td>Level</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(question) in searchResult" :key="question.id">
                      <td @click="modalShow(question)" style="cursor:pointer;">{{ question.id }}</td>

                      <td
                        @click="modalShow(question)"
                        style="cursor:pointer;;"
                      >{{ question.subject_code }}</td>
                      <td
                        @click="modalShow(question)"
                        style="cursor:pointer; width:"
                      >{{ question.subject_description }}</td>

                      <td @click="modalShow(question)">{{ question.chapter}}</td>
                      <td @click="modalShow(question)" style="cursor:pointer;">{{ question.level }}</td>
                      <td>
                        <button
                          style="width:30px;height:30px;"
                          class="btn-sm btn-info"
                          v-on:click="editQuestion(question.id)"
                        >
                          <i class="fa fa-pencil"></i>
                        </button>
                        <button
                          style="width:30px;height:30px;"
                          class="btn-sm btn-danger"
                          v-on:click="deleteEntry(question.id)"
                        >
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- end boxed -->
      </div>
      <!-- end container -->
    </section>

    <modal name="question-modal" height="auto" :scrollable="true">
      <div
        class="card"
        style="height: 400px; padding:20px; border: #a2a2a2 3px solid; overflow:auto;"
      >
        <div class="card-header" style="font-weight:600;">Question:</div>
        <div style="margin-top:20px;">
          <div v-html="question.question"></div>
        </div>
        <div style="margin-left:40px; margin-top:10px;">
          <p>
            <span>a.</span>
            <span v-html="question.choices_a"></span>
          </p>
          <p>
            <span>b.</span>
            <span v-html="question.choices_b"></span>
          </p>
          <p>
            <span>c.</span>
            <span v-html="question.choices_c"></span>
          </p>
          <p>
            <span>d.</span>
            <span v-html="question.choices_d"></span>
          </p>
        </div>
        <div style="margin-top:20px; font-weight:600;">Answer:</div>
        <div style="margin-left:40px; font-weight:600;">
          <p>{{question.answer}}</p>

          <button
            style="float:right; margin-top:20px;"
            class="btn btn-danger"
            @click="deleteEntry(question.id)"
          >Delete</button>
          <button
            style="float:right; margin-top:20px; margin-right:10px;"
            @click="modalHide"
            class="btn btn-primary"
          >Ok</button>
        </div>
      </div>
    </modal>
  </div>
</template>
<script>
export default {
  data() {
    return {
      inputSearchMessage: "",
      questions: [],
      fullPage: false,
      isLoading: true,
      loader: "dots",
      loaderColor: "rgb(11, 49, 200)",
      question: {
        id: 0,
        question: "",
        choices_a: "",
        choices_b: "",
        choices_c: "",
        choices_d: "",
        answer: ""
      }
    };
  },
  created: function() {
    var app = this;
    app.isLoading = true;
    axios
      .get("/question/get")
      .then(function(resp) {
        app.questions = resp.data.records;
        app.isLoading = false;
      })
      .catch(function(resp) {
        console.log(resp);
        alert("Could not load questions");
        app.isLoading = false;
      });
  },
  computed: {
    searchResult: function() {
      var self = this;
      return this.questions.filter(item => {
        return (
          (
            item.id +
            " " +
            item.subject_code +
            " " +
            item.subject_description +
            " " +
            item.chapter +
            " " +
            item.level +
            " "
          )
            .toLowerCase()
            .indexOf(this.inputSearchMessage.toLowerCase()) > -1
        );
      });
    }
  },
  methods: {
    modalShow(question) {
      this.question = question;

      this.$modal.show("question-modal");
      // document.getElementById("ask_question").innerHTML = question.question;
      // document.getElementById("choices_a").innerHTML = question.choices_a;
      // document.getElementById("choices_b").innerHTML = question.choices_b;
      // document.getElementById("choices_c").innerHTML = question.choices_c;
      // document.getElementById("choices_d").innerHTML = question.choices_d;
    },
    modalHide() {
      this.$modal.hide("question-modal");
    },
    editQuestion(id) {
      this.$router.push({ name: "EditQuestion", params: { id: id } });
    },
    showMoreLess(index) {
      var element = document.getElementById("truncate_" + index);
      element.classList.toggle("truncate");
    },
    deleteEntry(id) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        var data = {
          id: id,
          _token: document.head.querySelector('meta[name="csrf-token"]').content
        };
        axios
          .post("/question/delete", data)
          .then(function(resp) {
            var index = app.questions
              .map(x => {
                return x.id;
              })
              .indexOf(id);
            app.questions.splice(index, 1);
            app.modalHide();
          })
          .catch(function(resp) {
            alert("Could not delete question");
          });
      }
    }
  }
};
</script>
<style>
.table-responsive {
  height: 70vh;
  overflow-x: auto;
}
.table {
  margin: 0px;
  padding: 0px;
  text-align: center;
}
td {
  vertical-align: middle;
  padding: 5px;
  text-align: center;
}
th {
  text-align: center;
}
</style>
