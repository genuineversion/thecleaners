<?php
    require_once("db.php");
     require_once("functions/dbandler.php");

     if (isset($_POST['loginVend'])) {
     	
          $errorVendLogin = array();

          $vendLoginEmail = sanitize($_POST['vend-email']);
          $vendLoginPass = sanitize($_POST['vend-pass']);

          //CHECK FOR EMPTY INPUT WHEN CLICK ON SUBMIT BUTTON

          if (empty($vendLoginEmail)) {
          	
          	$errorVendLogin[] = "Enter your email address";
          }

         
         if (empty($vendLoginPass)) {
         	
         	$errorVendLogin[] = "Enter your password";
         }

    

  
 //CHECK IF THE EMAIL AND PASSWORD SUPPLIED DOESN'T MATCH
      // FIRST SELECT THE DETAILS FROM THE VENDOR_REGISTRATION TABLE
      //THE FETCH IT OUT
      //THEN STORE THE EMAIL AND PASSSWORD IN A VARIABLE THEN COMPARE IT WITH THE EMAIL AND PASSSWORD IN THE DATABASE
      // IF IT DOESN'T MATCH..THEN THROW UP AN ERROR MESSAGE

    $userMatch = "SELECT * FROM vendor_registration WHERE comp_email = '$vendLoginEmail' AND comp_password = '$vendLoginPass' ";

    $queryUserMatch = mysqli_query($db_connect, $userMatch);

    $fetchUserMatch = mysqli_fetch_assoc($queryUserMatch);


    $userEmailAdd = $fetchUserMatch['comp_email'];
    $userPassWord = $fetchUserMatch['comp_password'];

   
            

              if ($userEmailAdd !== $vendLoginEmail || $userPassWord !== $vendLoginPass) {
                

                $errorVendLogin[] = "Email Address or Password is Incorrect";
              }



              


      //CHECK IF THEIR IS NO ERROR 


      if (empty($errorVendLogin)) {
      	
      	//SELECT THE EMAIL FROM VENDOR_REGISTRATION TABLE
      //AND COMPARE IT TO THE ONE INPUT IN THE LOGIN AREA
      
      $vendSelect = "SELECT * FROM vendor_registration WHERE comp_email = '$vendLoginEmail' AND comp_password = '$vendLoginPass' ";   

   

      $queryVendLogin = mysqli_query($db_connect,$vendSelect);

      if (!$queryVendLogin) {
      	
      	die("could not query QUERYVENDLOGIN" .mysqli_error($db_connect));
             }


   //COUNT HOW MAN ROW RESULT CAME OUT WITH

             $count = mysqli_num_rows($queryVendLogin);


          
           


             //CHECK IF THE NUMBER OF ROW RETURNED IS ONE
             //THE FETCH THE ID AND STORE IT IN A SESSION

             if ($count == 1) {
             	


             	//FETCH THE VENDOR LOGGED IN DETAILS AND STORE IT IN A VARIABLE


             	$fetchVendor = mysqli_fetch_assoc($queryVendLogin);

          // THEN STORE THE ID FRON THE VENDOR_REGISTRATION TABLE WHICH IS vendor_id IN A SESSION['vend_id']

             	$_SESSION['vend_id'] = $fetchVendor['vendor_id'];




             	//THEN IF THE ABOVE IS SUCCESSFUL
             	// REDIRECT TO THE VENDOR INDEX PAGE 

             	header("location:vendor_index.php");
             	exit();

             }


           



      }else{

        $messageForError = "<ul>";

          foreach ($errorVendLogin as $errorVendLogins) {
            

            $messageForError .= "<li>$errorVendLogins</li>";
          }


          $messageForError .= "</ul>";
      }








     }

?>