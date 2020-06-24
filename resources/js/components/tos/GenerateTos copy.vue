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
                            <p class="lead">Get Started.</p>
                            <p>Fill in the necessary data.</p>
                            <button
                                type="button"
                                class="btn btn-info"
                                @click="addNewRow"
                            >
                                <i class="fas fa-plus-circle"></i>
                                Add
                            </button>
                            <div class="base-demo" style="width: 100%">
                                <table
                                    style=" table-layout: fixed; width:100%"
                                    id="table-header"
                                >
                                    <tr>
                                        <th style="width:20%">
                                            Topics
                                        </th>
                                        <th style="width:8%">
                                            No. of Hours
                                        </th>
                                        <th style="width:8%">
                                            Percent (%)
                                        </th>
                                        <th style="width:66%">
                                            Cognitive Skills Tested
                                            <table
                                                style="width:100%"
                                                class="table-sub1"
                                            >
                                                <tr>
                                                    <th>
                                                        Remember
                                                    </th>
                                                    <th>
                                                        Understand
                                                    </th>
                                                    <th>
                                                        Apply
                                                    </th>
                                                    <th>
                                                        Analyze
                                                    </th>
                                                    <th>
                                                        Evaluate
                                                    </th>
                                                    <th>
                                                        Create
                                                    </th>
                                                </tr>
                                            </table>

                                            <table class="table-sub1">
                                                <tr>
                                                    <th>
                                                        <input
                                                            type="number"
                                                            class="percentage-input"
                                                        />
                                                        %
                                                    </th>
                                                    <th>
                                                        <input
                                                            type="number"
                                                            class="percentage-input"
                                                        />
                                                        %
                                                    </th>
                                                    <th>
                                                        <input
                                                            type="number"
                                                            class="percentage-input"
                                                        />
                                                        %
                                                    </th>
                                                </tr>
                                            </table>
                                        </th>
                                        <th style="width:8%">
                                            Total
                                        </th>
                                    </tr>
                                </table>

                                <table class="table-main">
                                    <tr
                                        v-for="(tos_data, k) in tos_datas"
                                        :key="k"
                                    >
                                        <td style="width:20%">
                                            <!-- <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.topics"
                                            /> -->
                                            <!-- <textarea
                                                v-model="tos_data.topics"
                                                rows="4"
                                                cols="50"
                                                style="width:100%;
                                                 height:auto;
                                                 overflow:auto"
                                            ></textarea> -->
                                            <textarea-autosize
                                                v-model="tos_data.topics"
                                                :autosize="true"
                                                :row="1"
                                            />
                                        </td>
                                        <td style="width:8%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.no_of_hours"
                                            />
                                        </td>
                                        <td style="width:8%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.percent"
                                            />
                                        </td>
                                        <td style="width:11%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.remember"
                                            />
                                        </td>
                                        <td style="width:11%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.understand"
                                            />
                                        </td>
                                        <td style="width:11%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.apply"
                                            />
                                        </td>
                                        <td style="width:11%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.analyze"
                                            />
                                        </td>
                                        <td style="width:11%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.evaluate"
                                            />
                                        </td>
                                        <td style="width:11%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.create"
                                            />
                                        </td>
                                        <td style="width:8%">
                                            <input
                                                class="tos-input"
                                                type="text"
                                                v-model="tos_data.total"
                                            />
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <button
                                v-on:click="goBack()"
                                class="btn btn-primary"
                            >
                                back
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Next
                            </button>
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
            tos_datas: [
                {
                    topics: "",
                    no_of_hours: "",
                    percent: "",
                    remember: "",
                    understand: "",
                    apply: "",
                    analyze: "",
                    evaluate: "",
                    create: "",
                    total: ""
                }
            ],
            params: {
                data: [
                    [
                        "Topics dasad dasda dasdasd dasdasd",
                        "No. of",
                        "Percent",
                        "Cognitive ",
                        "Total",
                        "Topics",
                        "No. of Hours",
                        "Percent",
                        "Cognitive ",
                        "Total"
                    ],
                    [
                        "Topics",
                        "No. ",
                        "Percent",
                        "Cognitive ",
                        "Total",
                        "Topics",
                        "No. of Hours",
                        "Percent",
                        "Cognitive ",
                        "Total"
                    ]
                ],
                border: true,
                maxWidth: 2000,
                rowHeight: 60,
                edit: { row: "all" },
                columnWidth: [
                    { column: 0, width: "18.3%" },
                    { column: 1, width: "7.2%" },
                    { column: 2, width: "7.4%" },
                    { column: 3, width: "9.9%" },
                    { column: 4, width: "10.0%" },
                    { column: 5, width: "10.0%" },
                    { column: 6, width: "10.0%" },
                    { column: 7, width: "9.9%" },
                    { column: 8, width: "10.0%" },
                    { column: 9, width: "8%" }
                ]
            }
        };
    },
    computed: {},
    mounted() {},

    events: {
        event_name: function(data) {
            this.tos = data;
        }
    },
    methods: {
        goBack() {
            this.$router.push({ name: "GetStarted" });
        },
        addNewRow() {
            this.tos_datas.push({
                topics: "",
                no_of_hours: "",
                percent: "",
                remember: "",
                understand: "",
                apply: "",
                analyze: "",
                evaluate: "",
                create: "",
                total: ""
            });
        },
        saveForm() {
            event.preventDefault();
            var app = this;

            app.isLoading = true;
            var tos = app.tos;
            console.log(tos);
            axios
                .post("/auth/member/store", formData)
                .then(function(resp) {
                    // console.log(resp);

                    app.isLoading = false;
                    app.resetForm();
                    app.success();
                })
                .catch(function(resp) {
                    console.log(resp);
                    app.isLoading = false;
                    alert("Could not create member");
                });
        },
        autosize() {
            var el = this;
            setTimeout(function() {
                el.style.cssText = "height:auto; padding:0";
                // for box-sizing other than "content-box" use:
                // el.style.cssText = '-moz-box-sizing:content-box';
                el.style.cssText = "height:" + el.scrollHeight + "px";
            }, 0);
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
