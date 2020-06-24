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
                    <button style="background-color: rgba(59, 71, 206, 0.29);" class="test-button">
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
              <p style="margin-left: 10px;">Fill in the necessary data.</p>
              <form style="margin-left: 60px;" autocomplete="off" v-on:submit="saveForm()">
                <p class="spacing">Examination</p>
                <div class="row">
                  <div class="form-group col-md-4">
                    <select class="form-control col-6" v-model="tos.examination">
                      <option value="Midterm">Midterm</option>
                      <option value="Final">Final</option>
                    </select>
                    <p class="spacing">Subject Code</p>
                    <input
                      type="text"
                      v-model="tos.subject_code"
                      class="form-control col-6"
                      placeholder="eg.CC102"
                      required
                    />
                    <p class="spacing">Subject Description</p>
                    <input
                      v-model="tos.subject_description"
                      type="text"
                      class="form-control col-6"
                      placeholder="Computer Programming 2"
                      required
                    />

                    <p class="spacing">Semester</p>
                    <select class="form-control col-6" v-model="tos.semester">
                      <option value="First">First</option>
                      <option value="Second">Second</option>
                    </select>
                    <p class="spacing">School Year</p>
                    <input
                      type="text"
                      v-model="tos.school_year"
                      class="form-control col-6"
                      placeholder="eg.2019-2020"
                      required
                    />
                    <p class="spacing">General Instruction</p>
                    <textarea class="input-text-holder2" v-model="tos.general_instruction" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button
                    style="float:right;"
                    type="submit"
                    class="btn btn-primary"
                  >Save and Continue</button>
                  <a style="float:right; margin-right:10px;" href="/" class="btn btn-primary">Cancel</a>
                </div>
              </form>
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
      tos: {
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
  computed: {},
  mounted() {
    let app = this;
    app.tos = this.$store.state.tos;
  },
  methods: {
    success: function() {
      this.$alertify.success("success");
    },
    goToHomePage() {
      window.open("/");
    },
    saveForm() {
      event.preventDefault();
      this.$store.commit("changeTestQuestions", this.tos);
      this.$router.push({ name: "AddQuestionBlueprint" });
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
}

.spacing {
  margin-top: 10px;
  margin-bottom: 0;
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
