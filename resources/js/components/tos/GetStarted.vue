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
            <div class="col-md-8">
              <div class="content blog-list">
                <div class="blog-wrapper clearfix">
                  <div class="blog-meta">
                    <div class="blog-desc-big">
                      <p class="lead">Get Started.</p>
                      <p>Fill in the necessary data.</p>
                      <div class="subject-input">
                        <form autocomplete="off" v-on:submit="saveForm()">
                          <p class="spacing">Examination</p>
                          <select class="form-control col-6" v-model="tos.examination">
                            <option value="Midterm">Midterm</option>
                            <option value="Final">Final</option>
                          </select>
                          <p class="spacing">Semester</p>
                          <select class="form-control col-6" v-model="tos.semester">
                            <option value="First">First</option>
                            <option value="Second">Second</option>
                          </select>
                          <p class="spacing">College/Department</p>
                          <select class="form-control col-6" v-model="tos.college">
                            <option value="Arts and Sciences">Arts and Sciences</option>
                            <option value="Education">Education</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Industrial Technology">Industrial Technology</option>
                            <option value="Nursing">Nursing</option>
                            <option value="Graduate Studies">Graduate Studies</option>
                          </select>
                          <p class="spacing">School Year</p>
                          <input
                            type="text"
                            v-model="tos.school_year"
                            class="form-control col-6"
                            placeholder="eg.2019-2020"
                            required
                          />
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

                          <button type="submit" class="btn btn-primary">Next</button>
                        </form>
                      </div>
                    </div>
                    <!-- end desc -->
                  </div>
                  <!-- end blog -->
                </div>
                <!-- end content -->
              </div>
            </div>
            <!-- end row -->
          </div>
          <!-- end row -->
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
        examination: "Midterm",
        semester: "First",
        college: "Arts and Sciences",
        school_year: "",
        subject_code: "",
        subject_description: ""
      },
      examinations: [
        { text: "Midterm", value: "Midterm" },
        { text: "Final", value: "Final" }
      ],
      semesters: [
        { text: "First", value: "First" },
        { text: "Second", value: "Second" }
      ],
      colleges: [
        { text: "Arts and Sciences", value: "Arts and Sciences" },
        { text: "Education", value: "Education" },
        { text: "Engineering", value: "Engineering" },
        { text: "Industrial Technology", value: "Industrial Technology" },
        { text: "Nursing", value: "Nursing" },
        { text: "Graduate Studies", value: "Graduate Studies" }
      ]
    };
  },
  computed: {},
  mounted() {
    let app = this;
    app.tos = this.$store.state.tos;
  },
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;

      app.isLoading = true;
      var tos = app.tos;
      console.log(tos);
      // console.log(this.$store.state.user.username);
      // console.log(this.$store.getters.firstName);
      // return;
      this.$store.commit("changeTos", tos);
      this.$router.push({ name: "GenerateTos" });
      //   axios
      //     .post("/auth/member/store", formData)
      //     .then(function(resp) {
      //       // console.log(resp);

      //       app.isLoading = false;
      //       app.resetForm();
      //       app.success();
      //     })
      //     .catch(function(resp) {
      //       console.log(resp);
      //       app.isLoading = false;
      //       alert("Could not create member");
      //     });
    }
  }
};
</script>
<style>
.spacing {
  margin-top: 10px;
  margin-bottom: 0;
}
</style>