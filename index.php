<?php
session_start();

include_once('layouts/header.php');
?>

<!-- IMAGE SLIDER SECTION-->
    <div class="owl-carousel" id="myslider" data-aos="zoom-in-up">
        <div style="background: url(images/slider-1.jpg); background-size: cover;" class="slider-image">
            <div class="carousel-inner mt-5 text-center">
                <h1>Find Your Favorite Property</h1>
                <!-- SEARCH SECTION-->
                <div class="container" data-aos="fade-up" data-aos-duration="2000">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="my-5 py-5 pl-5" style="background-color: #30caa0;">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <select name="city" id="" class="form-control">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <select name="type" id="" class="form-control">
                                                <option value="">Select Property Type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        <div class="form-group">
                                            <select name="bedrooms" id="" class="form-control">
                                                <option value="">No. of Bedrooms</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <input type="submit" name="search" role="button" class="btn btn-success" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END SEARCH SECTION-->
            </div>
        </div>
        <div style="background: url(images/slider-2.jpg); background-size: cover;" class="slider-image">
            <div class="carousel-inner mt-5 text-center">
                <h1>Find Your Favorite Property</h1>
                <!-- SEARCH SECTION-->
                <div class="container" data-aos="fade-up" data-aos-duration="2000">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="my-5 py-5 pl-5" style="background-color: #30caa0;">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <input type="text" name="keyword" placeholder="Enter a keyword" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <select name="country" id="" class="form-control">
                                                <option value="">Country</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <select name="city" id="" class="form-control">
                                                <option value="">City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5 col-lg-5">
                                        <div class="form-group">
                                            <select name="bedrooms" id="" class="form-control">
                                                <option value="">No. of Bedrooms</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <input type="submit" name="search" role="button" class="btn btn-success" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END SEARCH SECTION-->
            </div>
        </div>
    </div>
    <!-- END IMAGE SLIDER SECTION-->

    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia.</p>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="features">
                        <div class="thumbnail">
                            <img src="images/cause-education.jpg" style="margin-bottom: 20px;"/>
                        </div>
                        <div class="caption blog">
                            <p style="text-align: left;">1 June, 2020</p>
                            <h6 style="text-align: left;">Save Poor Female</h6>
                            <p style="text-align: left;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem.</p>
                            <a href="" class="btn btn-default" style="text-align: left; margin-top: 10px;">READ MORE</a>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-dark" id="connect">
        <div class="text-white text-center">
            <h3>Join our professional team & agents to start selling your house</h3>
            <a href="" class="btn btn-success">Connect</a>
        </div>
    </div>

<?php
include_once('layouts/footer.php');
?>