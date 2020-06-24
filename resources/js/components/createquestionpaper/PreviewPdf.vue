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
                    <button class="test-button">
                      <span>2</span>
                      <br />
                      <span>Add Question Blueprint</span>
                    </button>
                  </th>
                  <th style="border:none !important;">
                    <button style="background-color: rgba(59, 71, 206, 0.29);" class="test-button">
                      <span>3</span>
                      <br />
                      <span>Preview and Generate PDF</span>
                    </button>
                  </th>
                </thead>
              </table>
            </div>
            <div class="col-md-12">
              <p
                style="margin-left: 10px;"
              >Please review below questions. You can replace questions before generating PDF.</p>
              <div class="table-responsive">
                <div class="question" v-for="(question,key) in questions" :key="question.id">
                  <p style="margin-left: 40px;">
                    {{key+1}}.
                    <span v-html="question.question"></span>
                  </p>

                  <div style="margin-left: 80px;" class="choices">
                    <p>
                      a.
                      <span v-html="question.choices_a"></span>
                    </p>
                    <p>
                      b.
                      <span v-html="question.choices_b"></span>
                    </p>
                    <p>
                      c.
                      <span v-html="question.choices_c"></span>
                    </p>
                    <p>
                      d.
                      <span v-html="question.choices_d"></span>
                    </p>
                  </div>
                </div>
              </div>

              <a
                style="float:left; margin-right:10px; margin-top:10px;"
                href="javascript:history.go(-1)"
                class="btn btn-primary"
              >Back</a>
              <button
                style="float:left; margin-right:10px; margin-top:10px;"
                @click="generatePdfanswer"
                class="btn btn-primary"
              >Generate Answer Key</button>
              <button
                style="float:left; margin-top:10px;"
                @click="generatePdf"
                class="btn btn-primary"
              >Generate PDF</button>
            </div>
          </div>
        </div>
        <!-- end boxed -->
      </div>
      <!-- end container -->
    </section>
  </div>
</template>
<script>
export default {
  data: function() {
    return {
      inputSearchMessage: "",
      questions: [],
      test_question: {
        _token: document.head.querySelector('meta[name="csrf-token"]').content,
        questions: "",
        examination: "Midterm",
        semester: "First",
        school_year: "",
        subject_code: "",
        subject_description: "",
        general_instruction: ""
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
    app.test_question = this.$store.state.test_question;
    app.test_question._token = document.head.querySelector(
      'meta[name="csrf-token"]'
    ).content;
  },
  methods: {
    generatePdf() {
      let app = this;
      var qustion_ids = [];

      $.each(app.questions, function(key, value) {
        qustion_ids.push(value.id);
      });

      app.test_question.questions = qustion_ids.join(",");
      //   console.log(app.test_question);
      axios
        .post("/question/storetest", app.test_question)
        .then(function(resp) {
          // console.log(resp);
          window.open("/testquestion/" + resp.data.token, "_blank");
        })
        .catch(function(resp) {
          console.log(resp);
        });
    },
    generatePdfanswer() {
      let app = this;
      var qustion_ids = [];

      $.each(app.questions, function(key, value) {
        qustion_ids.push(value.id);
      });

      app.test_question.questions = qustion_ids.join(",");
      //   console.log(app.test_question);
      axios
        .post("/question/storetest", app.test_question)
        .then(function(resp) {
          window.open("/testquestionanswer/" + resp.data.token, "_blank");
        })
        .catch(function(resp) {
          console.log(resp);
        });
    }
  }
};
</script>
<style>
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
