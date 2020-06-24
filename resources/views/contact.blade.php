@extends('layouts.admin3')

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>Get In Touch</h3>
                    <ul class="breadcrumb">
                        <li><a href="javascript:void(0)">EduTool</a></li>
                        <li class="active">Get in touch</li>
                    </ul>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed boxedp4">

            <div style="height: 70vh;" id="mapId" class="wow slideInUp"></div>

            <div class="row contactv2 text-center">
                <div class="col-md-4">
                    <div class="small-box">
                        <i class="flaticon-email wow fadeIn"></i>
                        <h4>Contact us today</h4>
                        <small>Phone: (055) 251 2139</small>
                        <p><a href="mail:to">ssu.edu.ph</a></p>
                    </div><!-- end small-box -->
                </div><!-- end col -->

                <div class="col-md-4">
                    <div class="small-box">
                        <i class="flaticon-map-with-position-marker wow fadeIn"></i>
                        <h4>Visit Our Office</h4>
                        <small>Arteche Blvd, Brgy. Guindapunan</small>
                        <small>Catbalogan City</small>
                        <p><a href="#">View on Google Map</a></p>
                    </div><!-- end small-box -->
                </div><!-- end col -->

                <div class="col-md-4">
                    <div class="small-box">
                        <i class="flaticon-share wow fadeIn"></i>
                        <h4>Be Social</h4>
                        <small>Twitter: @ssucatbalogan</small>
                        <small>Facebook: ssucatbalogan</small>
                        <p><a href="#">Email Us</a></p>
                    </div><!-- end small-box -->
                </div><!-- end col -->
            </div><!-- end contactv2 -->
        </div><!-- end container -->
    </div>
</section>
@endsection