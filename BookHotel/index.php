<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <?php require('inc/links.php'); ?>
    <title><?php echo $settings_r['site_title'] ?> - HOME</title>
<style>
    #swiper img {
        width: 100%; 
        height: 600px; 
    }
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
    .uniform-card{
        width: 500px; 
        height: 800px; 
        object-fit: cover;
    }
    .uniform-image{
        width: 350px; 
        height: 250px; 
        object-fit: cover;
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
                        <div class="swiper-slide" id="swiper">
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
        <?php 
            
            $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

            while($room_data = mysqli_fetch_assoc($room_res))
            {
                // get features of room

                $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                INNER JOIN `room_features` rfea ON f.id = rfea.feature_id 
                WHERE rfea.room_id = '$room_data[id]'");

                $features_data = "";
                while($fea_row = mysqli_fetch_assoc($fea_q)){
                    $features_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fea_row[name]
                    </span>";
                }

                // get facilities of room

                $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f 
                INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                WHERE rfac.room_id = '$room_data[id]'");

                $facilities_data = "";
                while($fac_row = mysqli_fetch_assoc($fac_q)){
                    $facilities_data .="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fac_row[name]
                    </span>";
                }

                //get thumbnail of image

                $room_thumb = ROOMS_IMG_PATH."thumbnail.jpg";
                $thumb_q = mysqli_query($con,"SELECT * FROM `room_images` 
                    WHERE `room_id`='$room_data[id]' 
                    AND `thumb`='1'");

                if(mysqli_num_rows($thumb_q)>0){
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH.$thumb_res['image'];
                }

                $book_btn = "";

                if(!$settings_r['shutdown']){
                    $login=0;
                    if(isset($_SESSION['login']) && $_SESSION['login']==true){
                        $login=1;
                    }
                    $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</button>";
                }

                // print room card

                echo <<<data
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow uniform-card" style="max-width: 350px; margin: auto;">
                    <img src="$room_thumb" class="card-img-top uniform-image">                
                        <div class="card-body">
                                <h5>$room_data[name]</h5>
                                <h6 class="mb-4">PHP $room_data[price] PER NIGHT</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">FEATURES</h6>
                                $features_data
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">FACILITIES</h6>
                                $facilities_data                    
                            </div>
                            <div class="guests mb-4">
                                <h6 class="mb-1">GUESTS</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    $room_data[adult] ADULTS 
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    $room_data[children] CHILDREN 
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
                                $book_btn
                                <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none more-details">MORE DETAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
                data;
            }
        ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none text-white custom-bg">MORE ROOMS ></a>
            </div>
        </div>
    </div>

<!-- OUR FACILITIES -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-semi-bold h2-font h2">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <?php 
                $res = mysqli_query($con,"SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
                $path = FACILITIES_IMG_PATH;

                while($row = mysqli_fetch_assoc($res)){
                echo<<<data
                    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                        <img src="$path$row[icon]" width= "70px">
                        <h5 class="mt-3">$row[name]</h5>
                    </div>
                data;
                }
            ?>
            
            <div class="col-lg-12 text-center mt-5">
                <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none text-white custom-bg">MORE FACILITIES ></a>
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
        <div class="col-lg-12 text-center mt-5">
            <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none text-white custom-bg">KNOW MORE ></a></a>
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

    <!-- Password reset modal and code -->
    <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="recovery-form">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center">
                <i class="bi bi-shield-lock fs-3 me-2"></i> Set up New Password
                </h5>
            </div>
            <div class="modal-body">
                    <div class="mb-4">
                    <label class="form-label">New Password</label>
                    <input type="password" name="pass" required class="form-control shadow-none">
                    <input type="hidden" name="email">
                    <input type="hidden" name="token">
                </div>
                <div class="mb-2 text-end">
                    <button type="submit" class="btn btn-dark shadow-none">CANCEL</button>
                    <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div> 

<?php require('inc/footer.php'); ?>

<?php

    if(isset($_GET['account_recovery']))
    {
        $data = filteration($_GET);

        $t_date = date("Y-m-d");

        $query = select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1",
            [$data['email'],$data['token'],$t_date],'sss');

            if(mysqli_num_rows($query)==1)
            {   
                echo<<<showModal
                <script>
                    var myModal = document.getElementById('recoveryModal');

                    myModal.querySelector("input[name='email']").value = '$data[email]';
                    myModal.querySelector("input[name='token']").value = '$data[token]';

                    var modal = bootstrap.Modal.getOrCreateInstance(myModal);
                    modal.show();
                </script>
                showModal;
            }
            else{
                alert("error","Invalid or Expired Link");
            }
    }
?>

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

    //recover account

    let recovery_form = document.getElementById('recovery-form');
    recovery_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email' ,recovery_form.elements['email'].value);
        data.append('token' ,recovery_form.elements['token'].value);
        data.append('pass' ,recovery_form.elements['pass'].value);
        data.append('recover_user' , '');

        var myModal = document.getElementById('recoveryModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/login_register.php",true);

        xhr.onload = function(){
        if(this.responseText == 'failed'){
            alert('error', "Account reset failed!");
            }
        else{
            alert('error', "Account Reset Successful!");
            recovery_form.reset();
          }
        }
        xhr.send('data');
    });
</script>
</body>
</html>