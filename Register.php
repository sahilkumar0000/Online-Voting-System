<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Registration">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Register</title>
    <link rel="stylesheet" href="Css/nicepage.css" media="screen">
    <link rel="stylesheet" href="Css/Register.css" media="screen">
    <script class="u-script" type="text/javascript" src="Js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <script type="text/javascript" src="Js/jquery.js"></script>
	  <script type="text/javascript" src="Js/bootstrap.js"></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

  </head>

  <?php
require("includes/db.php");
$emailError="";
$accountSuccess="";
if(isset($_POST['register'])){
	 $user_name=$_POST['name'];
   $user_uid=$_POST['uid'];
	 $user_email=$_POST['email'];
 	 $user_password=$_POST['password'];

    $target_dir = "User/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $user_image=basename( $_FILES["imageUpload"]["name"],".jpg");

	$select="SELECT * from user_db where user_email='$user_email'";
	$exe=$conn->query($select);
	if($exe->num_rows>0){
		$emailError= "<p>Email already registered</p>";
	}
	else{

		$insert="INSERT into user_db (user_name,user_uid,user_email,user_password,user_image) values('$user_name','$user_uid','$user_email','$user_password','$user_image')";
	$run=$conn->query($insert);
	if($run){
		$accountSuccess="<p>Account created successfully</p>";
	}
	else{
		echo "error";
	}
}
}
?>

<?php
					if ($emailError!="") {
						echo $emailError;
					}
					if ($accountSuccess!="") {
						echo $accountSuccess;
						echo "<script> alert('Congratulations! You are Registered....') </script>";
						header("location:log-In.php");
					}
					?>


  <body class="u-body u-xl-mode"><header class="u-black u-clearfix u-header u-header" id="sec-3385"><div class="u-clearfix u-sheet u-sheet-1"><span class="u-file-icon u-icon u-icon-1" data-href="index.php" data-page-id="50819088"><img src="images/unknown1.png" alt=""></span>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1.25rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 500;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link" href="#" style="padding: 6px 0px; font-size: calc(1em + 12px);">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-8672"></use></svg>
              <svg class="u-svg-content" version="1.1" id="svg-8672" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-2 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-active-custom-color-1 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-hover-white u-text-white" href="index.php" style="padding: 20px 22px;">Home</a>
</li><li class="u-nav-item"><a class="u-active-custom-color-1 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-hover-white u-text-white" href="Vote.php" style="padding: 20px 22px;">Vote</a>
</li><li class="u-nav-item"><a class="u-active-custom-color-1 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-hover-white u-text-white" href="Survey.php" style="padding: 20px 22px;">Survey</a>
</li><li class="u-nav-item"><a class="u-active-custom-color-1 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-hover-white u-text-white" href="Register.php" style="padding: 20px 22px;">Register</a>
</li><li class="u-nav-item"><a class="u-active-custom-color-1 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-hover-white u-text-white" href="Log-In.php" style="padding: 20px 22px;">Log In</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Vote.php">Vote</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Survey.php">Survey</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Register.php">Register</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Log-In.php">Log In</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-gradient u-section-1" id="sec-4a60">
      <div class="u-clearfix u-sheet u-sheet-1"><span class="u-file-icon u-icon u-icon-1"><img src="images/925816016s1.png" alt=""></span>
        <h1 class="u-custom-font u-font-raleway u-text u-text-default u-text-1">Registration<span style="font-size: 3.75rem;"></span>&nbsp;
        </h1><span class="u-file-icon u-icon u-icon-2"><img src="images/6610595.png" alt=""></span>
        <div class="u-black u-border-2 u-border-custom-color-1 u-form u-radius-10 u-form-1">
          <form method="POST" class="u-clearfix u-form-spacing-30 u-form-vertical u-inner-form" style="padding: 50px;" enctype="multipart/form-data">
            <div class="u-form-email u-form-group u-form-group-1">
              <label for="email-319a" class="u-label u-text-body-alt-color u-label-1">Name</label>
              <input type="text" placeholder="Enter your name" id="email-319a" name="name" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle" required="">
            </div>
            <div class="u-form-group u-form-group-2">
              <label for="text-1c2c" class="u-label u-text-body-alt-color u-label-2">UID</label>
              <input type="text" placeholder="Enter your UID" id="text-1c2c" name="uid" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle">
            </div>
            <div class="u-form-group u-form-name u-form-group-3">
              <label for="name-319a" class="u-label u-text-body-alt-color u-label-3">Email</label>
              <input type="email" placeholder="Enter your email " id="name-319a" name="email" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle" required="">
            </div>
            <div class="u-form-group u-form-group-4">
              <label for="text-dd29" class="u-label u-text-body-alt-color u-label-4">Password</label>
              <input type="password" placeholder="Enter your password" id="text-dd29" name="password" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle">
            </div>
            <div class="u-form-group u-form-group-5">
              <label for="text-dd29" class="u-label u-text-body-alt-color u-label-5">Image</label>
              <input type="file"  name="imageUpload" class="u-border-3 u-border-no-left u-border-no-right u-border-no-top u-border-white u-input u-input-rectangle id="imageUpload">
            </div>
            <div class="u-align-right u-form-group u-form-submit u-form-group-5">
              <button type="submit" class="u-active-palette-2-light-2 u-border-none u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-2-light-2 u-radius-8 u-text-palette-2-base u-white u-btn-1" name="register">Register</button>
            </div>
            </form>        
        
        <div class="u-social-icons u-spacing-20 u-social-icons-1">
          <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon u-text-palette-2-base u-icon-3">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f107"></use></svg>
          <svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-f107" class="u-svg-content"><path d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path></svg>
        </span>
          </a>
          <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-twitter u-text-palette-2-base u-icon-4">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e140"></use></svg>
          <svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-e140" class="u-svg-content"><path d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path></svg>
        </span>
          </a>
          <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram u-text-palette-2-base u-icon-5">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4718"></use></svg>
          <svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-4718" class="u-svg-content"><path d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path><path d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path><path d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path></svg>
        </span>
          </a>
          <a class="u-social-url" target="_blank" href="#"><span class="u-icon u-icon-circle u-social-icon u-social-linkedin u-text-palette-2-base u-icon-6">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-438b"></use></svg>
          <svg x="0px" y="0px" viewBox="0 0 112 112" id="svg-438b" class="u-svg-content"><path d="M33.8,96.8H14.5v-58h19.3V96.8z M24.1,30.9L24.1,30.9c-6.6,0-10.8-4.5-10.8-10.1c0-5.8,4.3-10.1,10.9-10.1 S34.9,15,35.1,20.8C35.1,26.4,30.8,30.9,24.1,30.9z M103.3,96.8H84.1v-31c0-7.8-2.7-13.1-9.8-13.1c-5.3,0-8.5,3.6-9.9,7.1 c-0.6,1.3-0.6,3-0.6,4.8V97H44.5c0,0,0.3-52.6,0-58h19.3v8.2c2.6-3.9,7.2-9.6,17.4-9.6c12.7,0,22.2,8.4,22.2,26.1V96.8z"></path></svg>
        </span>
          </a>
        </div>
      </div>
    </section>
    
    
    <footer class="u-align-center u-black u-clearfix u-footer u-footer" id="sec-d120"><div class="u-align-left u-clearfix u-sheet u-sheet-1">
        <div class="u-social-icons u-spacing-10 u-social-icons-1">
          <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-2a8c"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-2a8c"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
          </a>
          <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f9aa"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-f9aa"><circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>
          </a>
          <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-df59"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-df59"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path><path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path><path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path></svg></span>
          </a>
        </div>
      </div>
  </body>
</html>