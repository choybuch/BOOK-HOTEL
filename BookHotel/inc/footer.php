<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
        <a class="navbar-brand me-5 fw-bold fs-2 h-font" href="index.php" style="color: black;">BookHotel</a>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Possimus eligendi aliquid, veniam soluta inventore voluptate perferendis recusandae quo amet? 
                Odit quo accusantium atque temporibus quod quos sequi, asperiores hic unde.
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a> <br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a> <br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a> 
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow Us</h5>
            <?php 
                if($contact_r['fb']!=''){
                    echo<<<data
                        <a href="$contact_r[fb]" class="d-inline-block text-dark text-decoration-none mb-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </a><br>
                    data;
                }
            ?>
            <a href="<?php echo $contact_r['insta']?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-instagram me-1"></i> Instagram
            </a><br>
            <a href="<?php echo $contact_r['tw']?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-twitter-x me-1"></i> Twitter
            </a><br>
        </div>
    </div>
</div>


<h6 class="text-center bg text-white p-3 m-0">All Rights Reserved 2024 <br>
Developed by Group 2</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    function setActive()
    {
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for(i=0; i<a_tags.length; i++)
        {
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if(document.location.href.indexOf(file_name) >= 0){
                a_tags[i].classList.add('active');
            }
        }
    }
    setActive();
</script>