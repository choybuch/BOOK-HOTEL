<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - FACILITIES</title>
<style>
    @media screen and (max-width: 575px) {
     .h2{
        font-size: 50px;
     }
     }
    .pop:hover{
        border-top-color: var(--maroon) !important;
        transform: scale(1.03);
        transition: all 0.3s;
    }
    .fixed-height{
        height: 480px;
        overflow: hidden;
    }
</style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h2-font text-center h2">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        Discover an array of exceptional facilities at our hotel, designed to elevate your stay to new heights of comfort and convenience. 
        <br>From our state-of-the-art fitness center and rejuvenating spa to our sparkling pool and                elegant dining options,
        <br>every aspect of your experience is crafted with your satisfaction in mind. Whether you're here for business or leisure, <br>Our hotel offers everything you need for a memorable and enjoyable stay.               <br>Experience unparalleled luxury and hospitality with our wide range of facilities,
        <br> ensuring your every need is met with style and sophistication.
        </p>
    </div>

    <div class="container">
        <div class="row">
        <?php 
             $res = selectAll('facilities');
             $path = FACILITIES_IMG_PATH;

             while($row = mysqli_fetch_assoc($res)){
              echo<<<data
               <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop fixed-height">
                    <div class="d-flex align-items-center mb-2">
                        <img src="$path$row[icon]" width="40px">
                        <h5 class="m-0 ms-3">$row[name]</h5>
                    </div>
                    <p>$row[description]</p>
                  </div>
                </div>
               data;
             }
        ?>
        </div>
    </div>

<?php require('inc/footer.php'); ?>

</body>
</html>