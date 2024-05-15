<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - ABOUT</title>
</head>
<style>
     @media screen and (max-width: 575px) {
     .h2{
        font-size: 50px;
     }
     .custom-font-size{
        font-size: 30px;
     }
     }
     .box{
        border-top-color: var(--maroon) !important;
     }
     .custom-font-size{
        font-size: 50px;
     }
     .uniform-image{
        width: 500px; 
        height: 600px; 
        object-fit: cover;
     }
</style>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h2-font text-center h2">ABOUT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
            Our hotel embodies a commitment to excellence in every aspect of guest experience. Our ownership is driven by a passion
            <br>for providing unparalleled service and creating unforgettable memories for our guests. With a focus on innovation,
            <br>sustainability, and guest satisfaction, our management ensures that every detail is meticulously attended to, from the moment of arrival to departure.
            <br>We take pride in our hands-on approach, fostering a culture of warmth, efficiency, and attention to detail.
            <br>At our hotel, you can trust that your comfort and enjoyment are our top priorities.
    </p>
</div>

<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
            <h3 class="mb-3">Who we are?</h3>
            <p style="text-indent: 20px;">
                Our Hotel is proudly owned by a reputable and esteemed group committed to the highest standards of hospitality and guest satisfaction. Their unwavering
                dedication to quality ensures that every detail, from the ambiance of our surroundings to the amenities we offer, reflects their passion for creating
                unforgettable moments for our guests.
            </p>
        </div>
        <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
            <img src="Images/About/1.jpg" class="w-100">
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="Images/About/hotel.svg" width="70px">
                <h4 class="mt-3">100+ ROOMS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="Images/About/customers.svg" width="70px">
                <h4 class="mt-3">200+ CUSTOMERS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="Images/About/rating.svg" width="70px">
                <h4 class="mt-3">150+ REVIEWS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="Images/About/staff.svg" width="70px">
                <h4 class="mt-3">100+ STAFFS</h4>
            </div>
        </div>
    </div>
</div>

<h3 class="my-5 fw-bold h2-font text-center h2 custom-font-size">MANAGEMENT TEAM</h3>

<div class="container px-4">
<div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5">
     <?php 
        $about_r = selectAll('team_details');
        $path=ABOUT_IMG_PATH;
        while($row = mysqli_fetch_assoc($about_r)){
            echo<<<data
                <div class="swiper-slide bg-white text-center overflow-hidden rounded"> 
                    <img src="$path$row[picture]" class="uniform-image">
                    <h5 class="mt-2">$row[name]</h5>
                </div>
            data;
        }
     ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>
    
<?php require('inc/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 40,
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
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 3,
        },
      }
  });
</script>

</body>
</html>