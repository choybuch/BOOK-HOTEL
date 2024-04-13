<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel - FACILITIES</title>
    <?php require('inc/links.php'); ?>

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
</style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h2-font text-center h2">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore, 
            sapiente expedita? Ullam cupiditate, <br> nisi nesciunt dolorum quod iste quae 
            aspernatur?
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
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
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


            
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/ac.png" width="40px">
                        <h5 class="m-0 ms-3">AIRCONDITIONER</h5>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                      Omnis ratione porro dicta aliquam voluptatibus. Error, nesciunt.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/heater.png" width="40px">
                        <h5 class="m-0 ms-3">HEATER</h5>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                      Omnis ratione porro dicta aliquam voluptatibus. Error, nesciunt.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/spa.png" width="40px">
                        <h5 class="m-0 ms-3">SPA</h5>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                      Omnis ratione porro dicta aliquam voluptatibus. Error, nesciunt.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/tv.png" width="40px">
                        <h5 class="m-0 ms-3">TELEVISION</h5>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                      Omnis ratione porro dicta aliquam voluptatibus. Error, nesciunt.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="Images/Facilities/POOL.png" width="40px">
                        <h5 class="m-0 ms-3">SWIMMING POOL</h5>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                      Omnis ratione porro dicta aliquam voluptatibus. Error, nesciunt.
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php require('inc/footer.php'); ?>

</body>
</html>