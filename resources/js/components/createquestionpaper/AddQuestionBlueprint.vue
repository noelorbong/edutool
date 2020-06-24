<template>
  <div class="vld-parent">
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
            <div class="col-md-12">
              <table>
                <thead>
                  <th style="border:none !important;">
                    <button class="test-button">
                      <span>1</span>
                      <br />
                      <span>Create New Test</span>
                    </button>
                  </th>
                  <th style="border:none !important;">
                    <button style="background-color: rgba(59, 71, 206, 0.29);" class="test-button">
                      <span>2</span>
                      <br />
                      <span>Add Question Blueprint</span>
                    </button>
                  </th>
                  <th style="border:none !important;">
                    <button class="test-button">
                      <span>3</span>
                      <br />
                      <span>Preview and Generate PDF</span>
                    </button>
                  </th>
                </thead>
              </table>
            </div>
            <div class="col-md-12">
              <p style="margin-left: 10px;">Question List.</p>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td style="width:100px;">Item No.</td>
                      <td>Subject</td>
                      <td>Chapter</td>
                      <td>Level</td>
                      <td>Question</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(question,key) in searchResult" :key="question.id">
                      <td style="cursor:pointer;" @click="modalShowQuestion(question)">{{ key+1}}</td>

                      <td
                        style="cursor:pointer;"
                        @click="modalShowQuestion(question)"
                      >{{ question.subject_code }}</td>
                      <td
                        style="cursor:pointer;"
                        @click="modalShowQuestion(question)"
                      >{{ question.chapter }}</td>

                      <td
                        style="cursor:pointer;"
                        @click="modalShowQuestion(question)"
                      >{{ question.level}}</td>
                      <td
                        @click="modalShowQuestion(question)"
                        class="truncate"
                        style="max-width: 150px; cursor:pointer;"
                      >{{ question.question }}</td>
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
                          v-on:click="removeEntry(question.id)"
                        >
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <button
                @click="modalShow"
                style="float:left; margin-right :10px;"
                class="btn btn-primary"
              >Add Question</button>
              <button
                style="float:left;"
                @click="nextStep"
                class="btn btn-primary"
              >Save and Continue to Step 3</button>
            </div>
          </div>
        </div>
        <!-- end boxed -->
      </div>
      <!-- end container -->
    </section>
    <modal name="question-modal" height="auto" :scrollable="true">
      <div class="card" style="height: 400px; padding:20px; border: #a2a2a2 3px solid;">
        <div class="card-header" style="font-weight:600;">Add/Edit Questions:</div>

        <div>
          <form autocomplete="off" v-on:submit="saveForm()">
            <div class="row">
              <div class="col-md-8">
                <select
                  class="form-control"
                  @change="newcountAvailable(1)"
                  style="margin-top:15px"
                  v-model="data.subject_code"
                >
                  <option value disabled="disabled">Subject</option>
                  <option
                    v-for="subject in subjects"
                    :key="subject.subject_code"
                    v-bind:value="subject.subject_code"
                  >{{ subject.subject_code }}</option>
                </select>
                <select
                  class="form-control"
                  @change="newcountAvailable(2)"
                  style="margin-top:10px"
                  v-model="data.chapter"
                >
                  <option value disabled="disabled">Chapter</option>
                  <option
                    v-for="chapter in chapters"
                    :key="chapter.chapter"
                    v-bind:value="chapter.chapter"
                    v-if="chapter.subject_code == data.subject_code"
                  >{{ chapter.chapter }}</option>
                </select>
                <select
                  class="form-control"
                  style="margin-top:10px"
                  @change="newcountAvailable(3)"
                  v-model="data.level"
                >
                  <option value disabled="disabled">
                    <span style="font-weight:600;">Level</span>
                  </option>
                  <option
                    v-for="level in levels"
                    :key="level.level"
                    v-bind:value="level.level"
                    v-if="level.subject_code == data.subject_code && level.chapter == data.chapter"
                  >{{ level.level }}</option>
                  <!-- <option value="Remember">Remember</option>
                  <option value="Understand">Understand</option>
                  <option value="Apply">Apply</option>
                  <option value="Analyze">Analyze</option>
                  <option value="Evaluate">Evaluate</option>
                  <option value="Create">Create</option>-->
                </select>
              </div>
              <div class="col-md-12">
                <table style="margin-top:15px">
                  <tr style="border: none !important; ">
                    <td style="width:60%; border: none !important;">Available Questions</td>
                    <td style="width:40%; border: none !important;">
                      <input
                        type="text"
                        style="text-align:center;"
                        v-model="data.available_questions"
                        class="form-control col-6"
                        readonly
                      />
                    </td>
                  </tr>
                  <tr style="border: none !important; ">
                    <td style="border: none !important; ">Required Questions</td>
                    <td style="border: none !important; ">
                      <input
                        type="number"
                        style="text-align:center;"
                        v-model="data.required_questions"
                        class="form-control col-6"
                        required
                      />
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </form>
        </div>
        <div style="margin-left:40px;">
          <button
            style="float:right; margin-top:20px; margin-right:10px;"
            @click="getRequired"
            class="btn btn-primary"
          >Ok</button>
        </div>
      </div>
    </modal>
    <modal name="preview-modal" height="auto" :scrollable="true">
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
            style="float:right; margin-top:20px; margin-right:10px;"
            @click="modalHideQuestion"
            class="btn btn-primary"
          >Ok</button>
        </div>
      </div>
    </modal>
  </div>
</template>
<script>
export default {
  data: function() {
    return {
      inputSearchMessage: "",
      questions: [],
      data: {
        _token: document.head.querySelector('meta[name="csrf-token"]').content,
        subject_code: "",
        chapter: "",
        level: "",
        available_questions: "",
        required_questions: ""
      },
      subjects: [],
      chapters: [],
      levels: [],
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
  mounted() {
    let app = this;
    app.questions = this.$store.state.questions;
    axios
      .get("/question/dropdowns/")
      .then(function(resp) {
        app.subjects = resp.data.subjects;
        app.chapters = resp.data.chapters;
        app.levels = resp.data.levels;
        // console.log(app.subjects);
      })
      .catch(function() {
        alert("Could not load dropdowns");
      });
  },
  methods: {
    nextStep() {
      this.$store.commit("changeQuestions", this.questions);
      this.$router.push({ name: "PreviewPdf" });
    },
    editQuestion(id) {
      this.$store.commit("changeQuestions", this.questions);
      this.$router.push({ name: "EditQuestion", params: { id: id } });
    },
    modalShowQuestion(question) {
      this.question = question;
      this.$modal.show("preview-modal");
    },
    modalHideQuestion() {
      this.$modal.hide("preview-modal");
    },
    modalShow() {
      this.$modal.show("question-modal");
    },
    modalHide() {
      this.$modal.hide("question-modal");
    },
    success: function() {
      this.$alertify.success("success");
    },
    newcountAvailable(type) {
      let app = this;

      if (type == 1) {
        app.data.chapter = "";
        app.data.level = "";
        app.data.available_questions = "";
        app.data.required_questions = "";
      } else if (type == 2) {
        app.data.level = "";
        app.data.available_questions = "";
        app.data.required_questions = "";
      }
      // console.log("type: " + type);
      // subject_code: "",
      //   chapter: "",
      //   level: "",
      //   available_questions: "",
      //   required_questions: ""
      if (
        app.data.subject_code == "" ||
        app.data.chapter == "" ||
        app.data.level == ""
      ) {
        return;
      }
      axios
        .get(
          "/question/countavailable/" +
            app.data.subject_code +
            "/" +
            app.data.chapter +
            "/" +
            app.data.level +
            "/"
        )
        .then(function(resp) {
          app.data.available_questions = resp.data.available_count;
          //   console.log(resp.data);
        })
        .catch(function() {
          alert("Could not count availables");
        });
    },
    getRequired() {
      let app = this;

      if (
        app.data.subject_code == "" ||
        app.data.chapter == "" ||
        app.data.level == "" ||
        app.data.required_questions == ""
      ) {
        return;
      }
      var question_ids = [0];
      var question_ids_string = "";
      console.log(app.questions);
      $.each(app.questions, function(key, value) {
        question_ids.push(value.id);
      });

      question_ids_string = question_ids.join(",");

      // console.log(question_ids_string);
      // return;
      axios
        .get(
          "/question/getrequired/" +
            app.data.subject_code +
            "/" +
            app.data.chapter +
            "/" +
            app.data.level +
            "/" +
            app.data.required_questions +
            "/" +
            question_ids_string +
            "/"
        )
        .then(function(resp) {
          //   app.data.questions.push(resp.data.records);
          $.each(resp.data.records, function(key2, value) {
            var index = app.questions.findIndex(x => x.id == value.id);
            if (index === -1) {
              app.questions.push(value);
            }
          });
          //   console.log(resp.data);
          app.modalHide();
        })
        .catch(function(error) {
          console.log(error);
          alert("Could not add questions");
        });
    },
    saveForm() {
      event.preventDefault();
      this.$store.commit("changeTos", this.tos);
      this.$router.push({ name: "GenerateTos" });
    },
    removeEntry(id) {
      let app = this;
      var index = app.questions
        .map(x => {
          return x.id;
        })
        .indexOf(id);
      app.questions.splice(index, 1);
    }
  }
};
</script>
<style>
.truncate {
  /* need automatic multi-line height */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  word-wrap: break-word;
  /* color:#170694; */
}
.test-button {
  height: 100px;
  width: 100%;
}

th {
  width: 25%;
  padding: 10px;
  border: none;
}
.input-text-holder2 {
  width: 100%;
  padding: 8px;
  float: left;
  resize: none;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border-color ease-in-out 0.15s,
    -webkit-box-shadow ease-in-out 0.15s;
  -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
  transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
</style>
