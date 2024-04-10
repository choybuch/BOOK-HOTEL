<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel - HOME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <?php require('inc/links.php'); ?>
<style>
    
     .availability-form{
        margin-top: -50px;
        z-index: 2;
        position: relative;
     }

     @media screen and (max-width: 575px) {
        .availability-form{
            margin-top: 25px;
            padding: 0 35px;
     }
     .h2{
        font-size: 40px;
     }
     }
</style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<!-- carousel -->
<div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <?php 
                $res = selectAll('carousel');
                while($row = mysqli_fetch_assoc($res))
                {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                        <div class="swiper-slide">
                            <img src="$path$row[image]" class="w-100 d-block">
                        </div>
                    data;
                }
            ?>
        </div>
    </div>
</div>

<!-- check availability form -->
<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check Booking Availability</h5>
            <form>
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-In</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-Out</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                    <label class="form-label" style="font-weight: 500;">Adult</label>
                        <select class="form-select shadow-none">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                    <label class="form-label" style="font-weight: 500;">Children</label>
                        <select class="form-select shadow-none">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Our Rooms -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-400 h2-font h2">OUR ROOMS</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="Images/Rooms/1.jpg" class="card-img-top">                
                    <div class="card-body">
                            <h5>SIMPLE ROOM NAME</h5>
                            <h6 class="mb-4">PHP 7500 PER NIGHT</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">FEATURES</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 ROOMS
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 BATHROOM
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 BALCONY
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 SOFA
                                </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">FACILITIES</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                WIFI
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AIRCONDITIONER
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                HEATER
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                GEYSER
                            </span>                    
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">GUESTS</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 ADULTS 
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 CHILDREN
                            </span>                
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Ratings</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">BOOK NOW</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none more-details">MORE DETAILS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="Images/Rooms/2.jpg" class="card-img-top">                
                    <div class="card-body">
                            <h5>SIMPLE ROOM NAME</h5>
                            <h6 class="mb-4">PHP 7500 PER NIGHT</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">FEATURES</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 ROOMS
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 BATHROOM
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 BALCONY
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 SOFA
                                </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">FACILITIES</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                WIFI
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AIRCONDITIONER
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                HEATER
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                GEYSER
                            </span>                    
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">GUESTS</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 ADULTS
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3 CHILDREN
                            </span>                 
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Ratings</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">BOOK NOW</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none more-details">MORE DETAILS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="Images/Rooms/3.jpg" class="card-img-top">                
                    <div class="card-body">
                            <h5>SIMPLE ROOM NAME</h5>
                            <h6 class="mb-4">PHP 7500 PER NIGHT</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">FEATURES</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 ROOMS
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 BATHROOM
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 BALCONY
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 SOFA
                                </span>
                        </div>
                        <div class="facilities mb-4">
                            <h6 class="mb-1">FACILITIES</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                WIFI
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                AIRCONDITIONER
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                HEATER
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                GEYSER
                            </span>                    
                        </div>
                        <div class="guests mb-4">
                            <h6 class="mb-1">GUESTS</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 ADULTS
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                5 CHILDREN
                            </span>                 
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Ratings</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">BOOK NOW</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none more-details">MORE DETAILS</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none text-white custom-bg">MORE ROOMS ></a>
            </div>
        </div>
    </div>

<!-- OUR FACILITIES -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-semi-bold h2-font h2">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Images/Facilities/wifi.png" width= "80px">
                <h5 class="mt-3">WIFI</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Images/Facilities/ac.png" width= "80px">
                <h5 class="mt-3">AIRCONDITIONER</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Images/Facilities/spa.png" width= "80px">
                <h5 class="mt-3">SPA</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Images/Facilities/heater.png" width= "80px">
                <h5 class="mt-3">HEATER</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="Images/Facilities/tv.png" width= "80px">
                <h5 class="mt-3">TELEVISION</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none text-white custom-bg">MORE FACILITIES ></a>
            </div>
        </div>
    </div>


<!-- TESTIMONIALS -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-semi-bold h2-font h2">TESTIMONIALS</h2>
    <div class="container mt-5">
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper mb-5">

        <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-4">
                <img src="Images/Profile/1.jpg" width="30px">
                <h6 class="m-0 ms-2">Hev Abi</h6>
            </div>
            <p>
                    Oh, ang amat pumutok, medyo makalat, mapusok
            Medyo kailangan kita, hindi na 'ko magpapalusot
            Kung sa matao bumukod, ikaw lang ang gusto mapanood
            Umi-spaghetti pababa, o pataas, o lumuhod
            </p>
            <div class="rating">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
            </div>
        </div>
        <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-4">
                <img src="Images/Profile/1.jpg" width="30px">
                <h6 class="m-0 ms-2">Hev Abi</h6>
            </div>
            <p>
                Alam mo ba girl,
                pagka wala ka dito promise ako concern,
                di ka nagrereply di mo pa 'ko maconfirm.
                ayaw mo ba sakin porke wala ko skrt skrt,
                o ayaw mo sakin kasi ikaw mas older.
            </p>
            <div class="rating">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
            </div>
        </div>
        <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-4">
                <img src="Images/Profile/1.jpg" width="30px">
                <h6 class="m-0 ms-2">Hev Abi</h6>
            </div>
            <p>
                Alam mo ba girl,
                pagka wala ka dito promise ako concern,
                di ka nagrereply di mo pa 'ko maconfirm.
                ayaw mo ba sakin porke wala ko skrt skrt,
                o ayaw mo sakin kasi ikaw mas older.
            </p>
            <div class="rating">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
            </div>
        </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    </div>

<!-- REACH US -->

<h2 class="mt-5 pt-4 mb-4 text-center fw-semi-bold h2-font h2">REACH US</h2>

     <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call Us</h5>
                    <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>
                    <?php 
                        if($contact_r['pn2']!=''){
                            echo<<<data
                                <a href="tel: +$contact_r[pn2]" class="d-inline-block text-decoration-none text-dark">
                                    <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
                                </a>
                            data;
                        }

                    ?>
                </div>  
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>
                    <?php 
                        if($contact_r['fb']!=''){
                            echo<<<data
                                <a href="$contact_r[fb]" class="d-inline-block mb-3">
                                    <span class="badge bg-light text-dark fs-6 p-2">
                                    <i class="bi bi-facebook me-1"></i> Facebook
                                    </span>
                                </a>
                                <br>
                            data;
                        }
                    ?>
                    <a href="<?php echo $contact_r['insta']?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram"></i> Instagram
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['tw']?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter-x"></i> Twitter
                        </span>
                    </a>
                </div>
            </div>
        </div>
     </div>

<?php require('inc/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      }
    });

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
      }
    });
  </script>
</body>
</html>