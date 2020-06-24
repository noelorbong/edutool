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
            <div class="col-md-3" style="text-align:center;">
              <h4 style="text-align:center;">Edit Question</h4>
              <img class="add-image" src="/images/add-icon-new.png" />
            </div>
            <div class="col-md-9">
              <form autocomplete="off" v-on:submit="saveForm()">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="grade_level">Question</label>
                    <div style="width: 100%;display: flex;">
                      <div
                        style="width:90%"
                        class="div-text-holder"
                        id="question"
                        contenteditable="true"
                        v-html="que.question"
                      ></div>
                      <!-- <textarea class="input-text-holder" v-model="que.choices_a" required></textarea> -->
                      <div style="width:5%">
                        <label for="file-input-question">
                          <img
                            style="width:100%;margin-left:4px; margin-top: 17px; border: 1px solid #ddd;"
                            src="/images/image_icon.jpg"
                            alt="Image Icon"
                          />
                        </label>
                        <input
                          style="display: none;"
                          @change="onFileChange($event,'question')"
                          id="file-input-question"
                          type="file"
                        />
                      </div>
                      <!-- <input @change="onFileChange($event)" id="file-input" type="file" /> -->
                    </div>
                    <!-- <textarea class="form-control" v-model="que.question"></textarea> -->
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label for="name">Check to indicate answer.</label>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input
                      @click="pickedAnswer('option_a','a')"
                      id="option_a"
                      class="input-checkbox"
                      type="checkbox"
                    />
                    <label class="input-choices" for="name">a.</label>
                    <div style="width: 80%;display: flex;">
                      <div
                        style="width:85%"
                        class="div-text-holder"
                        id="choices_a"
                        contenteditable="true"
                        v-html="que.choices_a"
                      ></div>
                      <!-- <textarea class="input-text-holder" v-model="que.choices_a" required></textarea> -->
                      <div style="width:10%">
                        <label for="file-input">
                          <img
                            style="width:100%;margin-left:4px; margin-top: 17px; border: 1px solid #ddd;"
                            src="/images/image_icon.jpg"
                            alt="Image Icon"
                          />
                        </label>
                        <input
                          style="display: none;"
                          @change="onFileChange($event,'choices_a')"
                          id="file-input"
                          type="file"
                        />
                      </div>
                      <!-- <input @change="onFileChange($event)" id="file-input" type="file" /> -->
                    </div>
                    <!-- <textarea-autosize class="input-text-holder" :autosize="true" :height="35" /> -->
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      @click="pickedAnswer('option_b','b')"
                      id="option_b"
                      class="input-checkbox"
                      type="checkbox"
                    />
                    <label class="input-choices" for="name">b.</label>
                    <div style="width: 80%;display: flex;">
                      <div
                        style="width:85%"
                        class="div-text-holder"
                        id="choices_b"
                        contenteditable="true"
                        v-html="que.choices_b"
                      ></div>
                      <!-- <textarea class="input-text-holder" v-model="que.choices_a" required></textarea> -->
                      <div style="width:10%">
                        <label for="file-input-b">
                          <img
                            style="width:100%;margin-left:4px; margin-top: 17px; border: 1px solid #ddd;"
                            src="/images/image_icon.jpg"
                            alt="Image Icon"
                          />
                        </label>
                        <input
                          style="display: none;"
                          @change="onFileChange($event,'choices_b')"
                          id="file-input-b"
                          type="file"
                        />
                      </div>
                      <!-- <input @change="onFileChange($event)" id="file-input" type="file" /> -->
                    </div>
                    <!-- <textarea class="input-text-holder" v-model="que.choices_b" required></textarea> -->
                    <!-- <textarea-autosize class="input-text-holder" :autosize="true" /> -->
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input
                      @click="pickedAnswer('option_c','c')"
                      id="option_c"
                      class="input-checkbox"
                      type="checkbox"
                    />
                    <label class="input-choices" for="name">c.</label>
                    <div style="width: 80%;display: flex;">
                      <div
                        style="width:85%"
                        class="div-text-holder"
                        id="choices_c"
                        contenteditable="true"
                        v-html="que.choices_c"
                      ></div>
                      <!-- <textarea class="input-text-holder" v-model="que.choices_a" required></textarea> -->
                      <div style="width:10%">
                        <label for="file-input-c">
                          <img
                            style="width:100%;margin-left:4px; margin-top: 17px; border: 1px solid #ddd;"
                            src="/images/image_icon.jpg"
                            alt="Image Icon"
                          />
                        </label>
                        <input
                          style="display: none;"
                          @change="onFileChange($event,'choices_c')"
                          id="file-input-c"
                          type="file"
                        />
                      </div>
                    </div>
                    <!-- <textarea class="input-text-holder" v-model="que.choices_c" required></textarea> -->
                    <!-- <textarea-autosize class="input-text-holder" :autosize="true" /> -->
                  </div>
                  <div class="form-group col-md-6">
                    <input
                      @click="pickedAnswer('option_d','d')"
                      id="option_d"
                      class="input-checkbox"
                      type="checkbox"
                    />
                    <label class="input-choices" for="name">d.</label>
                    <div style="width: 80%;display: flex;">
                      <div
                        style="width:85%"
                        class="div-text-holder"
                        id="choices_d"
                        contenteditable="true"
                        v-html="que.choices_d"
                      ></div>
                      <!-- <textarea class="input-text-holder" v-model="que.choices_a" required></textarea> -->
                      <div style="width:10%">
                        <label for="file-input-d">
                          <img
                            style="width:100%;margin-left:4px; margin-top: 17px; border: 1px solid #ddd;"
                            src="/images/image_icon.jpg"
                            alt="Image Icon"
                          />
                        </label>
                        <input
                          style="display: none;"
                          @change="onFileChange($event,'choices_d')"
                          id="file-input-d"
                          type="file"
                        />
                      </div>
                      <!-- <input @change="onFileChange($event)" id="file-input" type="file" /> -->
                    </div>
                    <!-- <textarea class="input-text-holder" v-model="que.choices_d" required></textarea> -->
                    <!-- <textarea-autosize class="input-text-holder" :autosize="true" /> -->
                  </div>

                  <div class="form-group col-md-12">
                    <table>
                      <tr style="border: none !important; ">
                        <td style="border: none !important; ">
                          <label
                            style="float:right; margin-right:10px;  color: #a2a2a2;"
                          >Subject Code</label>
                        </td>
                        <td style="border: none !important; "></td>
                        <td style="border: none !important; ">
                          <input
                            v-model="que.subject_code"
                            type="text"
                            class="input-text-holder2"
                            required
                          />
                        </td>
                      </tr>
                      <tr style="border: none !important; ">
                        <td style="border: none !important; ">
                          <label
                            style="float:right; margin-right:10px; color: #a2a2a2;"
                          >Subject Description</label>
                        </td>
                        <td style="border: none !important; "></td>
                        <td style="border: none !important; ">
                          <input
                            v-model="que.subject_description"
                            type="text"
                            class="input-text-holder2"
                            required
                          />
                        </td>
                      </tr>
                      <tr style="border: none !important; ">
                        <td style="border: none !important; ">
                          <label style="float:right; margin-right:10px; color: #a2a2a2;">Chapter</label>
                        </td>
                        <td style="border: none !important; "></td>
                        <td style="border: none !important; ">
                          <input
                            v-model="que.chapter"
                            type="text"
                            class="input-text-holder2"
                            required
                          />
                        </td>
                      </tr>
                      <tr style="border: none !important; ">
                        <td style="border: none !important; ">
                          <label style="float:right; margin-right:10px; color: #a2a2a2;">Level</label>
                        </td>
                        <td style="border: none !important; "></td>
                        <td style="border: none !important; ">
                          <select v-model="que.level" class="input-text-holder2">
                            <option value="Remember">Remember</option>
                            <option value="Understand">Understand</option>
                            <option value="Apply">Apply</option>
                            <option value="Analyze">Analyze</option>
                            <option value="Evaluate">Evaluate</option>
                            <option value="Create">Create</option>
                          </select>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <button
                  style="float:right; margin-top:20px;"
                  type="submit"
                  class="btn btn-primary"
                >Update</button>
                <a
                  style="float:right; margin-top:20px; margin-right:10px;"
                  href="javascript:history.go(-1)"
                  class="btn btn-primary"
                >Back</a>
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
      fullPage: false,
      isLoading: false,
      loader: "dots",
      loaderColor: "rgb(255, 27, 0)",
      que: {
        _token: document.head.querySelector('meta[name="csrf-token"]').content,
        id: 0,
        question: "",
        choices_a: "",
        choices_b: "",
        choices_c: "",
        choices_d: "",
        answer: "a",
        subject_code: "",
        subject_description: "",
        chapter: "",
        level: "Remember",
        created_at: "",
        updated_at: ""
      },
      local_que: {
        id: 0,
        question: "",
        choices_a: "",
        choices_b: "",
        choices_c: "",
        choices_d: "",
        answer: "a",
        subject_code: "",
        subject_description: "",
        chapter: "",
        level: "Remember",
        created_at: "",
        updated_at: ""
      }
    };
  },
  computed: {},
  mounted() {
    let app = this;
    let id = app.$route.params.id;
    app.userId = id;
    axios
      .get("/question/edit/" + id)
      .then(function(resp) {
        app.que.id = id;
        app.que.question = resp.data.record.question;
        app.que.choices_a = resp.data.record.choices_a;
        app.que.choices_b = resp.data.record.choices_b;
        app.que.choices_c = resp.data.record.choices_c;
        app.que.choices_d = resp.data.record.choices_d;
        app.que.subject_code = resp.data.record.subject_code;
        app.que.subject_description = resp.data.record.subject_description;
        app.que.chapter = resp.data.record.chapter;
        app.que.level = resp.data.record.level;
        app.que.answer = resp.data.record.answer;

        document.getElementById(
          "option_" + resp.data.record.answer
        ).checked = true;
      })
      .catch(function() {
        alert("Could not load question");
      });
  },
  methods: {
    success: function() {
      this.$alertify.success("success");
    },
    returnList() {
      //   this.$router.push({ name: "ShowQuestion" });
      this.$router.go(-1);
    },
    pickedAnswer(id, answer) {
      document.getElementById("option_a").checked = false;
      document.getElementById("option_b").checked = false;
      document.getElementById("option_c").checked = false;
      document.getElementById("option_d").checked = false;

      document.getElementById(id).checked = true;
      this.que.answer = answer;
    },
    onFileChange(e, choices) {
      var app = this;
      app.isLoading = true;
      console.log(choices);
      var option_a = document.getElementById(choices);
      var image_name = app.strRandom(25);
      app.uploadImage(e.target.files[0], image_name, option_a);
      // var imageFileUrl = URL.createObjectURL(e.target.files[0]);
    },
    uploadImage(imagefile, name, option) {
      let app = this;
      var formData = new FormData();
      formData.append("photo", imagefile);
      formData.append("filename", name);
      formData.append(
        "_token",
        document.head.querySelector('meta[name="csrf-token"]').content
      );
      axios
        .post("/question/uploadimage", formData)
        .then(function(resp) {
          app.isLoading = false;
          app.changeOption(option, name);
          app.success();
        })
        .catch(function(resp) {
          console.log(resp);
          app.isLoading = false;
          alert("Could not upload image");
        });
    },
    changeOption(option, image_name) {
      var stringContent = option.innerHTML;
      var imageFileUrl = "/uploads/" + image_name + ".png";
      var imageTag =
        "<img class='uploaded-image'  tag='" +
        image_name +
        "'src='" +
        imageFileUrl +
        "' />";
      option.innerHTML = stringContent + imageTag;
    },
    strRandom(len) {
      let text = "";
      let chars =
        "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
      for (let i = 0; i < len; i++) {
        text += chars.charAt(Math.floor(Math.random() * chars.length));
      }

      return text;
    },
    saveForm() {
      event.preventDefault();
      var app = this;
      app.que.question = document.getElementById("question").innerHTML;
      app.que.choices_a = document.getElementById("choices_a").innerHTML;
      app.que.choices_b = document.getElementById("choices_b").innerHTML;
      app.que.choices_c = document.getElementById("choices_c").innerHTML;
      app.que.choices_d = document.getElementById("choices_d").innerHTML;

      axios
        .post("/question/update", app.que)
        .then(function(resp) {
          //   console.log(resp);
          app.isLoading = false;
          app.local_que = app.que;
          //   console.log(app.local_que);
          app.$store.commit("updateQuestion", app.local_que);
          app.returnList();
          app.success();
        })
        .catch(function(resp) {
          app.isLoading = false;
          console.log(resp);
          alert("Could not update question");
        });
    }
  }
};
</script>
<style>
.spacing {
  margin-top: 10px;
  margin-bottom: 0;
}

td {
  border: none;
  padding: 10px;
}
.add-image {
  width: 70%;
  margin: auto;
}
.input-checkbox {
  height: 25px;
  width: 25px;
  float: left;
}
.input-choices {
  float: left;
  margin: 5px;
}
.input-text-holder {
  width: 80%;
  padding: 8px;
  resize: none;
  max-height: 70px !important;
  min-height: 50px !important;
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
.input-text-holder2 {
  width: 70%;
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
