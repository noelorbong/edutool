// store/index.js

import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        tos: {
            examination: "Midterm",
            semester: "First",
            college: "Arts and Sciences",
            school_year: "",
            subject_code: "",
            subject_description: "",
            general_instruction: ""
        },
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
        signatories: {
            faculty: "",
            chair_person: "",
            focal_person: "",
            college_department: "Arts and Sciences",
            college_dean: "Florabelle B. Patosa, Ph D."
        },
        questions: [],
        test_question: {
            _token: "",
            questions: "",
            examination: "Midterm",
            semester: "First",
            school_year: "",
            subject_code: "",
            subject_description: "",
            general_instruction: ""
        }
    },
    getters: {
        // firstName: state => {
        //     return state.user.fullName.split(" ")[0];
        // }
    },
    mutations: {
        changeTos(state, payload) {
            state.tos = payload;
        },
        changeDataContainer(state, payload) {
            state.data_container = payload;
        },
        changeSignatories(state, payload) {
            state.signatories = payload;
        },
        changeQuestions(state, payload) {
            state.questions = payload;
        },
        updateQuestion(state, payload) {
            var index = state.questions
                .map(x => {
                    return x.id;
                })
                .indexOf(payload.id);
            state.questions.splice(index, 1, payload);
        },
        changeTestQuestions(state, payload) {
            state.test_question = payload;
        }
    },
    actions: {}
});
