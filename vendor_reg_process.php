<?php
     require_once("db.php");
     require_once("functions/dbandler.php");


if (isset($_POST['registerMe'])) {
	


       //STORE THE INPUT AS A VARIABLE

       $theInputName =sanitize($_POST['vendorName']);
       $inputEmail = sanitize($_POST['vendorEmail']);
       $theInputPass = sanitize($_POST['vendorPass']);
       $phoneNumberInput = sanitize($_POST['vendorPhone']);
       $companyAddress = sanitize($_POST["vendorAddress"]);

       //STORE THE ARRAY OF THE ERRORS IN A VARIABLE

       $errorRegistration = array();


       //CHECK IF ANY OF THE INPUT FIELD IS EMPTY BEFORE SUBMISSION
       //IF CLICK WHILE EMPTY, DISPLAY THE ERROR MESSAGE STORED FOR IT


       if (empty($theInputName)) {
        	
        	$errorRegistration[] = "Kindly enter your business name";
        } 


        if (empty($inputEmail)) {
        	
        	$errorRegistration[] = "Please enter an email address";
        }


        if (empty($theInputPass)) {
        	
        	$errorRegistration[] = "Password is needed";
        }



        if (empty($phoneNumberInput)) {
        	
        	$errorRegistration[] = "Enter your phone number";
        }


        if (empty($companyAddress)) {
        	
        	$errorRegistration[] = "Enter a valid company address";
        }

  //CHECK IF THEIR IS NO ERROR...
  // IF NO ERROR..THEN INSERT THE DETAILS TO THE DATABASE

        if (empty($errorRegistration)) {

        	$regDetails = "INSERT INTO vendor_registration(comp_name,comp_address,comp_email,comp_phone,comp_password,registered_date) VALUES('$theInputName', '$companyAddress', '$inputEmail', '$phoneNumberInput','$theInputPass',NOW()) ";


        


        	$queryRegDetails = mysqli_query($db_connect,$regDetails);

        	if (!$queryRegDetails) {
        		
        		die("could not query QUERYREGDETAILS" .mysqli_error($db_connect));
        	}
        	
        	header("location:login-reg.php?status=success");
        	exit();

        }

        else{

        	$messageError ="<ul>";

        	foreach ($errorRegistration as $errorRegistrations) {
        		
        		$messageError .="<li>$errorRegistrations</li>";
        	}

        	    $messageError .= "</ul>";
        }














}
     
?>