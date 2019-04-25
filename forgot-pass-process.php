


<?php
      
      require_once("db.php");
      require_once("functions/dbandler.php");


      //SELECT ALL FROM THE EMAIL ADDRESS
      //COMPARE THE EMAIL ADDRESS WITH THE ONE SUPPLIED INTO THE DATABASE
      //IF IT DOESN'T MATCH OR IF IT IS EMPTY.. THROW AN ERROR
      // THEN IF IT MATCHES THE ONE IN THE DATABASE


      //CHOOSE THE EMAIL ADDRESS IN THE DATABASE AND SEND A MAIL TO IT
      //REGENERATE A NEW PASSWORD...SEND TO THE EMAIL IN THE DATABASE AND ALSO UPDATE IN THE DATABASE
      

      //WHICH YOU HAVE TO LOGIN WITH YOUR NEW PASSWORD


   if (isset($_POST['forgetButton'])) {

   	  $emailSupplied = sanitize($_POST['forgetPass-email']);
      
      $errorForgetPw = array();



      if (empty($emailSupplied)) {
      	
      	$errorForgetPw[] = "Enter your email address";
      }




      if (empty($errorForgetPw)) {
      	

      $forgetDetails = "SELECT * FROM vendor_registration WHERE comp_email = '$emailSupplied' ";
      
     
      
      $queryForgetDetails = mysqli_query($db_connect, $forgetDetails);


      //FETCH THE EMAIL ADDRESS AND STORE IT IN A VARIABLE

      $fetchForgetPw = mysqli_fetch_assoc($queryForgetDetails);
 


      $theUserEmail = $fetchForgetPw['comp_email'];
      $theCompName = $fetchForgetPw['comp_name'];



//IF THE EMAIL ADDRESS DOESN'T MATCH

      if ($theUserEmail !== $emailSupplied) {
      	
      	$errorForgetPw[] = "Incorrect Email Address";

//IF THE EMAIL SUPPLIED IS THE SAME WITH THE ONE IN THE DATABASE
 //THE SEND AN EMAIL TO THE EMAIL ADDRESS IN THE DATABASE     	
      }elseif ($theUserEmail === $emailSupplied) {
      	
         

      		     //GENERATE A RANDOM CODE AND UPDATE THE PASSCODE IN THE 
      		     //DATABASE AND ALSO SEND IT TO THE USER'S EMAIL ADDRESS
      	      //GOTTEN IN THE DATABASE.

      	

      		     $genNewPassCode = substr(base_convert(sha1(uniqid(mt_rand())),16, 36), 0 );




      		     //THEN SEND THE EMAIL ADDRESS AND USERNAME TO THE EMAIL ADDRESS OF THE USER SUPPLIED BEFORE IN THE DATABASE


      		     $to = "$theUserEmail";
      		     $subject = "Password Recovery";
      		     $body = "Hi '$theCompName' , nn You or someone have requested your account details. nn Here is your account details, nn Your username is '$theCompName' nn Your password is $genNewPassCode nn Your password has being reset and that is your new pass word nn proceed to your login page, login with the username and password in this mail, nn then proceed to change your password to a convinient one. nn Regards Site Admin  ";

      	      $headers = "From: <contact@domain.com>" ."\r\n" ;
      		     $headers .= "Reply-To : thecleaners@gmail.com". "\r\n";

      		     mail($to, $subject, $body,$headers);




      		   //THEN UPDATE THE GENERATED PASSCODE INTO THE DATABASE

      		     $updateThePassCode = "UPDATE vendor_registration SET comp_password = '$genNewPassCode' WHERE comp_password = '$emailSupplied' ";

      		     

      		     $queryTheUpdate = mysqli_query($db_connect,$updateThePassCode);


      		     header("location:login-reg.php?thestatus=successNewPw");
      		     exit();

      }







    
      }else{

      	$errorMessForgetPw = "<ul>";

      	foreach ($errorForgetPw as $errorForgetPws) {

      		$errorMessForgetPw .= "<li>$errorForgetPws</li>";
      	}

      	$errorMessForgetPw .= "</ul>";

      }
   


   	














   }
      

?>