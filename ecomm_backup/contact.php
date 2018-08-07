<?php require_once("includes/header.php");?>

        <section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
            <div class="overlay"></div>
            <div class="container">
                <div class="page-header">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Contact us</li>
                        </ol>
                    </div><!-- end bread -->
                    <h1>Contact Us</h1>
                </div>
            </div>
        </section>

        <section class="section aboutsection">
            <div class="container">
                <div class="row promo-item">
                    <div class="col-md-6 col-sm-12">
                        <div class="shop-item-title clearfix">
                            <h4>Contact Form</h4>
                            <div class="shopmeta clearfix">
                                <span>Please complete all fields * to before send email.</span>
                            </div><!-- end shop-meta -->

                            <div class="shop-desc-style">
                                <div class="contact_form">
                                    <div id="message"></div>
                                    <form id="contactform" class="row" action="http://showwp.com/demos/shopist/contact.php" name="contactform" method="post">
                                        <div class="col-lg-12">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"> 

                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email"> 

                                            <input type="text" name="name" id="phone" class="form-control" placeholder="Phone"> 

                                            <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Message Below"></textarea>

                                            <button type="submit" value="SEND" id="submit" class="btn custombutton button--isi btn-primary"> SEND MAIL</button>
                                        </div>
                                    </form> 
                                </div>

                                <hr>

                                <div class="social">
                                    <a href="#" class="btn custombutton button--isi btn-primary"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="btn custombutton button--isi btn-primary"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="btn custombutton button--isi btn-primary"><i class="fa fa-pinterest"></i></a>
                                    <a href="#" class="btn custombutton button--isi btn-primary"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="btn custombutton button--isi btn-primary"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div><!-- end shop-item-title -->
                    </div><!-- end col -->

                    <div class="col-md-6 col-sm-12">
                        <div id="map" class="wow slideInUp nopadding"></div>
                    </div><!-- end col -->
                </div><!-- end row promoitem -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section border-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 wow fadeIn">
                        <div class="about-box">
                            <h4>Call Us Today</h4>
                            <p class="lead">+91 9898989898<br> +91 8787878787</p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-4 col-sm-4 wow fadeIn">
                        <div class="about-box">
                            <h4> Send an Email </h4>
                            <p class="lead"><a href="#">info@ecomm.com</a></br>
                            <a href="#">support@ecomm.com</a></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-4 col-sm-4 wow fadeIn">
                        <div class="about-box">
                            <h4>Address </h4>
                            <p class="lead">825, Nirmals Corporate Center, Mulund West-400080</p>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>     
         
<?php require_once("includes/footer.php");?>
    </div><!-- end wrapper -->
    <!-- END SITE -->

 

    <script src="js/contact.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyC9LTayB22-aQOHq5dTOuloNJsCqZDFz78"></script>
    <script src="js/map.js"></script>
</body>

</html>