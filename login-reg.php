<?php
	require_once('db.php');
	require_once('functions/dbandler.php');
	require_once('login-process.php');
	require_once('vendor_reg_process.php');
	require_once('forgot-pass-process.php');
?>


<!DOCTYPE html>
<html>
<head>
   <title></title>

   <link rel="stylesheet" type="text/css" href="style.css">

   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
   
   <div id="bg-image">
       <div class="container">
          <div class="row">
            	<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-1 col-lg-8 col-md-8 col-sm-10 col-xs-10 bg bg-primary col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-1" id='theLogRegPage'>
					
				
	



				<div class="container"><h1>Login & Registration </h1></div>
<div id="exTab1" class="container">	
<ul  class="nav nav-pills">
			<li class="active">
        <a  href="#thelogin" data-toggle="tab">Login</a>
			</li>
			<li><a href="#theregister" data-toggle="tab">Register</a>
			</li>
			<li><a href="#theforgot-pw" data-toggle="tab">Forgot Password?</a>
			</li>
  		
		</ul>


            




             

	

  


			<div class="tab-content clearfix">


			  <div class="tab-pane active" id="thelogin">



				<form class="form-horizontal" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form-group">
				
				
				<div class="form-group">


				   <label class="col-lg-2 col-md-2 col-sm-2">Email:</label>
					 
					 <div class="col-lg-10 col-md-10 col-sm-10">
				   <input type="text" name="vend-email">
					 </div>
					 </div>

					 <div class="form-group">
				   <label class="col-lg-2 col-md-2 col-sm-2">Password:</label>

					 <div class="col-lg-10 col-md-10 col-sm-10">
				   <input type="password" name="vend-pass">
					 </div>
					 </div>


           <div class="form-group">
					 <div class="col-sm-offset-2 col-sm-10">
				   <button type="submit" class="btn btn-primary" name="loginVend">Login</button>

					 </div>
					 </div>
				</form>

							  
			<!--ERROR MESSAGE WHEN LOGIN FAILED -->
			<?php
                if (isset($messageForError)) {
                                     
                 echo "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 alert alert-danger'>$messageForError</div>";

                                   }
			?>





			 
<!--DISPLAYING THE RESULT FOR REGISTRATION,AFTER IT IS SUCESSFUL OR SHOWING ERROR MESSAGE -->

<?php
     if (isset($_GET['status']) && $_GET['status'] == 'success') {
                     
            echo "<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7 alert alert-success'>SUCCESSFULLY REGISTERED </div>";
        }elseif(isset($messageError)){

	echo "<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7 alert alert-danger'>$messageError</div>";
				   }
				?>

				




		
         <!-- MESSAGE WHEN YOU FORGOT YOUR PASSWORD -->

	<?php
                   if (isset($_GET['thestatus']) && $_GET['thestatus'] == 'successNewPw') {
                     
                     echo "<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7 alert alert-success'>MAIL SENT </div>";

                   }elseif (isset($errorMessForgetPw)) {
                     

                     echo "<div class='col-lg-7 col-md-7 col-sm-7 col-xs-7 alert alert-danger'>$errorMessForgetPw</div>";
                   }
				?>
				

   




			</div>

				<div class="tab-pane" id="theregister">


				<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form-group">

				<div class="form-group">
				<label class="col-sm-2">Company Name:</label>

				<div  class="col-sm-10">
				<input type="text" name="vendorName">
             </div>
             </div>



             <div class="form-group">
				<label class="col-sm-2">Address:</label>

				<div class="col-sm-10">
				<input type="address" name="vendorAddress">

				</div>
				</div>

				<div class="form-group">

				<label class="col-sm-2">Email Address:</label>

				<div class="col-sm-10">
				<input type="email" name="vendorEmail">
				</div>
				</div>

                

                <div class="form-group">
				<label class="col-sm-2">Phone Number:</label>
				<div class="col-sm-10">
				<input type="text" name="vendorPhone">
				</div>
				</div>



				<div class="form-group">
				<label class="col-sm-2">Password:</label>

				<div class="col-sm-10">
				<input type="password" name="vendorPass">
				</div>
				</div>


				<input type="hidden">

                <div class="form-group">
                <div  class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary" name="registerMe">Register</button>
				</div>
				</div>
			 </form>



</div>


        <div class="tab-pane" id="theforgot-pw">


		<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form-group">

<br>
		<h4>Enter your email address</h4>

				<div class="form-group">
				   <label class="col-lg-2 col-md-2 col-sm-2">Email:</label>

				   <div class="col-lg-10 col-md-10 col-sm-10">
				   <input type="text" name="forgetPass-email">
				   </div>
				   </div>

				   <div class="form-group">
                <div  class="col-sm-offset-2 col-sm-10">
				   <button type="submit" class="btn btn-primary" name="forgetButton">Send</button>

				   </div>
				   </div>
				</form>
				

   

		</div>
          
			</div>
  </div>









							</div>


          </div>
				 
					

       </div>
			
		 
			 




   </div>



   <!--LINKING BOOTSTRAP JQUERY AND JAVASCRIPT -->
     <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
		 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		 
		 <!--LINKING MY JQUERY AND JAVASCRIPT -->
		 <script type="text/javascript" src="jsfile/jquery.js"></script>
		 <script type="text/javascript" src="jsfile/script.js"></script>

</body>
</html>