<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>TOS</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        @page {
            size: portrait;
        }

        html,
        body {
            font-family: arial, sans-serif;
            /* height: 100%; */
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 96vh;
        }

        .header {
            height: 100px;
            width: 100%;
            border-bottom: 2px black solid;
            padding-bottom: 5px;
        }

        .header-left {
            float: left;
            height: 100%;
            width: 65%;
        }

        .header-left>table {
            height: 100%;
        }

        .header-right {
            float: right;
            height: 100%;
            width: fit-content;
            text-align: right;
        }

        .ssu-logo {
            height: 100px;
            float: left;
        }

        .ssu-address {
            border-left: black 2px solid;
            float: left;
            margin-left: 15px;
            padding-left: 10px;
        }

        .ssu-address>p {
            margin: 0px;
        }

        .aja-logo {
            height: 100px;
        }

        .aja-address {
            margin-top: 5px;
        }

        .aja-address>p {
            margin: 0px;
            font-size: 11px;
            text-align: center;
            color: rgb(7, 83, 159);
            font-weight: 600;
        }


        .body-header>p,
        h4 {
            text-align: center;
            margin: 4px;
            font-weight: 600;
        }

        .body-header {
            margin-top: 30px;
        }

        .body-header>p {
            font-size: 14px;
        }

        .footer {
            margin-top: auto;
        }

        .footer-table {
            width: 100%;
            border: none !important;
        }

        .designation>td>p {
            margin: 0px;
        }

        .sign-name {
            font-size: 13px;
            text-decoration: underline;
            font-weight: 600;
            text-transform: uppercase;
        }

        .sign-by {
            font-size: 13px;
            font-weight: 600;
        }

        .sign {
            font-size: 12px;
            font-style: italic;
        }

        .footer-2 {
            font-size: 10px;
            margin-top: 30px;
            margin-left: 10px;
            float: right;
        }

        p {
            overflow-wrap: break-word;
            font-weight: 500;
        }

        .body-questions {
            margin-left: 20px;
        }

        .choices {
            margin-left: 20px;
        }

        .table-choices {
            width: 100%;
        }

        img.uploaded-image {
            height: 110px;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <table style="border:none">
                <tr style="border:none">
                    <td style="border:none">
                        <img class="ssu-logo" src="../images/ssu_logo.png" />
                    </td>
                    <td style="border:none">
                        <div class="ssu-address">
                            <p>SAMAR STATE UNIVERSITY</p>
                            <p>
                                Arteche Blvd., Catbalogan City, Philippines
                                6700
                            </p>
                            <p style="font-weight: 600;">
                                College of Education
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="header-right">
            <img class="aja-logo" src="../images/aja_logo.png" />

        </div>
    </div>
    <div class="body">
        <div class="body-header">
            <p>{{$test_data->type_of_exam}} Examination in {{$test_data->subject_code}} (<span
                    style="font-weight:normal">{{$test_data->subject_description}}</span>)</p>
            <p style="font-weight:normal">{{$test_data->semester}} Semester, SY: {{$test_data->school_year}}</p>
        </div>
        <p><span style="font-weight:600">Multiple Choice:</span> {{$test_data->general_instructions}}</p>
        @forelse($questions as $index=>$question)
        <div class="body-questions">
            <p style="margin-bottom: 0px;">{{$index+1}}. <span id="question_{{$index+1}}"></span></p>
            <div class="choices">
                <table class="table-choices">
                    <tr>
                        <td style="width: 50%;">a. <span id="choices_a_{{$index+1}}"></span>
                        </td>
                        <td style="width: 50%;">c. <span id="choices_b_{{$index+1}}"></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">b. <span id="choices_c_{{$index+1}}"></span>
                        </td>
                        <td style="width: 50%;">d. <span id="choices_d_{{$index+1}}"></span>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        @empty
        @endforelse
    </div>

</body>
<script src="/js/jquery.min.js"></script>

<script>
    // self executing function here
(function() {
   

   @forelse($questions as $index=>$question)
    changeToHMTL('choices_a_{{$index+1}}', '{{$question->choices_b}}');
   changeToHMTL('choices_b_{{$index+1}}', '{{$question->choices_b}}' );
   changeToHMTL('choices_c_{{$index+1}}', '{{$question->choices_c}}'  );
   changeToHMTL('choices_d_{{$index+1}}', '{{$question->choices_d}}');
   changeToHMTL('question_{{$index+1}}', '{{$question->question}}');
   
    @empty
    @endforelse

    window.print();
})();

function changeToHMTL(id, text){
    document.getElementById(id).innerHTML = decodeHTML(text);
    
}

function decodeHTML (html){
    var txt = document.createElement('textarea');
    txt.innerHTML = html;
    return txt.value;
}
</script>

</html>