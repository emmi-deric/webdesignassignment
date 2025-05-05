<?php include('dbconnection.php');
include('header.php'); ?>
<section id="Main-Slider">
        <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/slider.jpg" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="assets/img/slider2.jpg" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            </ol>
        </div>
    </section>
    <section id="Scroll-Category">
        <div class="container">
            <h2 style="text-align: center;margin-top: 40px;">Products</h2>
            <div class="scroll-container">
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/lenovo-legion.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">Lenovo Legion</p>
                </div>
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/bestlaptops-2048px-9765.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">MacBook Pro</p>
                </div>
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/lenovo-legion.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">Lenovo Legion</p>
                </div>
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/bestlaptops-2048px-9765.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">MacBook Pro</p>
                </div>
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/lenovo-legion.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">Lenovo Legion</p>
                </div>
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/bestlaptops-2048px-9765.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">MacBook Pro</p>
                </div>
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/lenovo-legion.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">Lenovo Legion</p>
                </div>
                <div class="d-flex justify-content-center align-items-end justify-content-lg-center align-items-lg-end card2" style="background: url(&quot;assets/img/bestlaptops-2048px-9765.jpg&quot;) center / contain no-repeat;">
                    <p class="img-scroll-text">MacBook Pro</p>
                </div>
            </div>
        </div>
    </section>
    <section id="Top-Selling-product">
        <div class="container">
            <div class="top-scroll-overlay">
                <div class="text-center">
                    <h2 style="margin-bottom: 30px;">Top Selling Product</h2>
                    <div class="row">
                        <div class="col-sm-12 col-md-5 col-lg-6 col-xl-6 col-xxl-6">
                            <div class="div-top-selling-img"><img class="img-top-selling" src="assets/img/lenovo-legion.jpg"></div>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center align-items-xl-center top-selling-text">
                                <div>
                                    <h3>Lenovo Legion</h3>
                                    <p class="text-start">With five new performance-driving and portable IdeaPad laptops, a sleek and compact IdeaCentre desktop, and a 9-inch Lenovo tablet, these devices are designed for all the spaces and places in line with the on-the-go lifestyle of today’s consumer. Whether working, studying, creating, or just catching up with friends out of town, these new products offer speed, versatility, and convenience to suit their needs wherever they are</p>
                                    <div class="top-selling-div-btns">
                                        <div class="row g-0">
                                            <div class="col">
                                                <div><a class="top-selling-btn" href="#">BUY NOW</a></div>
                                            </div>
                                            <div class="col">
                                                <div><a class="top-selling-btn" href="#">READ MORE</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
// Address
include('address.php');
// footer
include('footer.php');
?>