<?php 

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    date_default_timezone_set("Asia/Hong_Kong");



    if(isset($_POST['register']))
    {
        $frm_data = filteration($_POST);

        // match password and confirm password field

        if($frm_data['pass'] != $frm_data['cpass']) {
            echo 'pass_mismatch';
            exit;
        }

        // check user exist or not

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1",
            [$frm_data['email'],$frm_data['phonenum']], "ss");
        if(mysqli_num_rows($u_exist)!=0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $frm_data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        // upload user image to server

         $img = uploadUserImage($_FILES['profile']);

         if($img == 'inv_img'){
            echo 'inv_img';
            exit;
         }
         else if($img == 'upd_failed'){
            echo 'upd_failed';
            exit;
         }

         $enc_pass = password_hash($frm_data['pass'],PASSWORD_BCRYPT);

         $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`,
          `password`, `token`) VALUES (?,?,?,?,?,?,?,?,?)";
         
         $values = [$frm_data['name'],$frm_data['email'],$frm_data['address'],$frm_data['phonenum'],$frm_data['pincode'],$frm_data['dob'],
          $img,$enc_pass,$token];

         if(insert($query,$values,'sssssssss')){
         echo 1;
         }
         else{
            echo 'ins_failed';
         }
    }

    if(isset($_POST['login']))
    {
        $frm_data = filteration($_POST);
        $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1",
        [$frm_data['email_mob'],$frm_data['email_mob']], "ss");

        if(mysqli_num_rows($u_exist)==0){
            echo 'inv_email_mob';
        }
        else{
        $u_fetch = mysqli_fetch_assoc($u_exist);
          //if($u_fetch['is_verified']==0){
            //echo 'not_verified';
          //}
          if($u_fetch['status']==0){
            echo 'inactive';}
          else{
            if(!password_verify($frm_data['pass'],$u_fetch['password'])){
              echo 'invalid_pass';
            }
            else{
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['uid'] = $u_fetch['id'];
            $_SESSION['uName'] = $u_fetch['name'];
            $_SESSION['uPic'] = $u_fetch['profile'];
            $_SESSION['uPhone'] = $u_fetch['phonenum'];
            echo 1;
                }
              }
        }
    }

?>