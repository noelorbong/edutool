/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require("jspdf/dist/jspdf.debug.js");

// import jsPDF from "jspdf/dist/jspdf.min.js";
window.Vue = require("vue");
import Vue from "vue";
import store from "./store/index.js";
import VueRouter from "vue-router";
import VueTableDynamic from "vue-table-dynamic";
import axios from "axios";
import VueAlertify from "vue-alertify";
import Loading from "vue-loading-overlay";
import VModal from "vue-js-modal";
import "vue-loading-overlay/dist/vue-loading.css";

// import VueTabulator from "vue-tabulator";
import TextareaAutosize from "vue-textarea-autosize";

import GetStarted from "./components/tos/GetStarted.vue";
import GenerateTos from "./components/tos/GenerateTos.vue";
import GenerateTosFinal from "./components/tos/GenerateTosFinal.vue";

import AddQuestion from "./components/multiplechoice/AddQuestion.vue";
import EditQuestion from "./components/multiplechoice/EditQuestion.vue";
import ShowQuestion from "./components/multiplechoice/ShowQuestion.vue";

import CreateTest from "./components/createquestionpaper/CreateTest.vue";
import AddQuestionBlueprint from "./components/createquestionpaper/AddQuestionBlueprint.vue";
import PreviewPdf from "./components/createquestionpaper/PreviewPdf.vue";
Vue.component("loading", Loading);
Vue.use(VModal);
Vue.use(TextareaAutosize);
Vue.use(VueTableDynamic);
Vue.use(VueAlertify, {
    // dialogs defaults
    autoReset: true,
    basic: false,
    closable: true,
    closableByDimmer: true,
    frameless: false,
    maintainFocus: true, // <== global default not per instance, applies to all dialogs
    maximizable: true,
    modal: true,
    movable: true,
    moveBounded: false,
    overflow: true,
    padding: true,
    pinnable: true,
    pinned: true,
    preventBodyShift: false, // <== global default not per instance, applies to all dialogs
    resizable: true,
    startMaximized: false,
    transition: "pulse",

    // notifier defaults
    notifier: {
        // auto-dismiss wait time (in seconds)
        delay: 2,
        // default position
        position: "top-right",
        // adds a close button to notifier messages
        closeButton: true
    },

    // language resources
    glossary: {
        // dialogs default title
        title: "AlertifyJS",
        // ok button text
        ok: "OK",
        // cancel button text
        cancel: "Cancel"
    },

    // theme settings
    theme: {
        // class name attached to prompt dialog input textbox.
        input: "ajs-input",
        // class name attached to ok button
        ok: "ajs-ok",
        // class name attached to cancel button
        cancel: "ajs-cancel"
    }
});
// Vue.use(jsPDF);
window.Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        components: {
            getstarted: GetStarted
        }
    },
    { path: "/getstarted", component: GetStarted, name: "GetStarted" },
    { path: "/generatetos", component: GenerateTos, name: "GenerateTos" },
    {
        path: "/generatetosfinal",
        component: GenerateTosFinal,
        name: "GenerateTosFinal"
    },
    { path: "/addquestion", component: AddQuestion, name: "AddQuestion" },
    {
        path: "/editquestion/:id",
        component: EditQuestion,
        name: "EditQuestion"
    },
    { path: "/showquestion", component: ShowQuestion, name: "ShowQuestion" },
    { path: "/createtest", component: CreateTest, name: "CreateTest" },
    {
        path: "/addquestionblueprint",
        component: AddQuestionBlueprint,
        name: "AddQuestionBlueprint"
    },
    {
        path: "/previewpdf",
        component: PreviewPdf,
        name: "PreviewPdf"
    }
];

const router = new VueRouter({ routes });

const app = new Vue({
    router,
    store
}).$mount("#app");
