<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>TOS</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        @page {
            size: landscape;
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
            text-align: left;
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

        .table {
            table-layout: fixed;
            border-collapse: collapse;
            width: 100%;
            font-weight: 600;
            font-size: 13px;
        }

        .table-colored>tbody>tr {
            background: rgb(220, 215, 222);
        }

        .table-main {
            table-layout: fixed;
            width: 100%;
        }

        .table-sub1 {
            border-collapse: collapse;
        }

        .table-sub1>tr>th {
            width: 16.66%;
        }

        td,
        th {
            border: 1px solid black;
            text-align: center;
            padding-left: 5px;
            padding-right: 5px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
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
            text-align: center;
        }

        p {
            overflow-wrap: break-word;
            font-weight: 500;
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
                                Office of the Vice President | Academic
                                Affairs
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="header-right">
            <img class="aja-logo" src="../images/aja_logo.png" />
            <div class="aja-address">
                <p>SSU-OVPAA-FR-014</p>
                <p>04-Feb-2019 Rev. 3</p>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="body-header">
            <h4>TABLE OF SPECIFICATIONS</h4>
            <p>{{$tos->examination}} Examination</p>
            <p>{{$tos->semester}} Semester / SY {{$tos->school_year}}</p>
            <p style="text-decoration: underline;">{{$tos->subject_code}} – {{$tos->subject_description}}</p>
            <p>Subject</p>
        </div>
        <table class="table table-colored">
            <tr>
                <th style="width:20%;border-bottom: none;">
                    Topics
                </th>
                <th style="width:8%;border-bottom: none;">
                    No. of Hours
                </th>
                <th style="width:8%;border-bottom: none;">
                    Percent (%)
                </th>
                <th style="width:66%; padding:0px;border-bottom: none;">
                    Cognitive Skills Tested
                    <table class="table table-sub1 table-colored">
                        <tr>
                            <th style="border-left:none">
                                Remember
                            </th>
                            <th style="width: 17%;">
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
                            <th style="border-right:none;">
                                Create
                            </th>
                        </tr>
                        <tr>
                            <th style="border-left:none; border-bottom: none;">
                                Item No.
                            </th>
                            <th style="border-bottom: none;">
                                Item No.
                            </th>
                            <th style="border-bottom: none;">
                                Item No.
                            </th>
                            <th style="border-bottom: none;">
                                Item No.
                            </th>
                            <th style="border-bottom: none;">
                                Item No.
                            </th>
                            <th style="border-right:none; border-bottom: none;">
                                Item No.
                            </th>
                        </tr>
                    </table>
                </th>
                <th style="width:8%;border-bottom: none;">
                    Total
                </th>
            </tr>
        </table>

        <table class="table table-main">
            @forelse($tos_datas as $tos_data)
            <tr>
                <td style="width:20%">
                    <p style="font-weight:600">{{$tos_data->topics}}</p>
                </td>
                <td style="width:8%">
                    <p>{{$tos_data->no_of_hours}}</p>
                </td>
                <td style="width:8%">
                    <p>{{$tos_data->percent}}</p>
                </td>
                <td style="width:11%">
                    <p>{{$tos_data->remember}}</p>
                </td>
                <td style="width:11%">
                    <p>{{$tos_data->understand}}</p>
                </td>
                <td style="width:11%">
                    <p>{{$tos_data->apply}}</p>
                </td>
                <td style="width:11%">
                    <p>{{$tos_data->analyze}}</p>
                </td>
                <td style="width:11%">
                    <p>{{$tos_data->evaluate}}</p>
                </td>
                <td style="width:11%">
                    <p>{{$tos_data->create}}</p>
                </td>
                <td style="width:8.0%">
                    <p>{{$tos_data->total}}</p>
                </td>
            </tr>
            @empty
            @endforelse
        </table>

        <table class="table table-main table-colored">
            <tr>
                <td style="width:20%; border-top: none;">Total</td>
                <td style="width:8.0%; border-top: none;">
                    <p>{{$tos->total_no_of_hours}}</p>
                </td>
                <td style="width:8%; border-top: none;">
                    <p>{{$tos->total_percent}}</p>
                </td>
                <td style="width:11%; border-top: none;">
                    <p>{{$tos->total_remember}}</p>
                </td>
                <td style="width:11%; border-top: none;">
                    <p>{{$tos->total_understand}}</p>
                </td>
                <td style="width:11%; border-top: none;">
                    <p>{{$tos->total_apply}}</p>
                </td>
                <td style="width:11%; border-top: none;">
                    <p>{{$tos->total_analyze}}</p>
                </td>
                <td style="width:11%; border-top: none;">
                    <p>{{$tos->total_evaluate}}</p>
                </td>
                <td style="width:11%; border-top: none;">
                    <p>{{$tos->total_create}}</p>
                </td>
                <td style="width:8%; border-top: none;">
                    <p>{{$tos->total_total}}</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <div class="footer-1">
            <table class="footer-table">
                <tr style="border:none">
                    <td style="border:none">
                        <p class="sign-by">Prepared by:</p>
                    </td>
                    <td style="border:none">
                        <p class="sign-by">Reviewed by:</p>
                    </td>
                    <td style="border:none">
                        <p class="sign-by">Checked & Verified by:</p>
                    </td>
                    <td style="border:none">
                        <p class="sign-by">APPROVED by:</p>
                    </td>
                </tr>
                <tr style="border:none">
                    <td style="border:none">
                        <p class="sign-by"></p>
                    </td>
                    <td style="border:none">
                        <p class="sign-by"></p>
                    </td>
                    <td style="border:none">
                        <p class="sign-by"></p>
                    </td>
                    <td style="border:none">
                        <p class="sign-by"></p>
                    </td>
                </tr>
                <tr class="designation" style="border:none">
                    <td style="border:none">
                        <p class="sign-name">{{$tos->faculty}}</p>
                        <p class="sign">Faculty</p>
                    </td>
                    <td style="border:none">
                        <p class="sign-name">{{$tos->chair_person}}</p>
                        <p class="sign">Area/Program Chair Person</p>
                    </td>
                    <td style="border:none">
                        <p class="sign-name">{{$tos->focal_person}}</p>
                        <p class="sign">
                            Focal Person for Quality Assurance
                        </p>
                    </td>
                    <td style="border:none">
                        <p class="sign-name">{{$tos->college_dean}}</p>
                        <p class="sign">Dean, College of {{$tos->college_department}}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer-2">
            Telephone No. +6355 251 2139 | Fax: +6355 543 8394 | Website:
            www.ssu.edu.ph | Contact us: info@ssu.edu.ph | Follow us on @
            ssucatbalogan | Page 1 of 1
        </div>
    </div>
</body>
<script>
    // self executing function here
(function() {
   window.print();

})();
</script>

</html>