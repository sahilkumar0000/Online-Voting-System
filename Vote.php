<?php
session_start();
include("includes/db.php");
if (!$_SESSION['user_email']) {
   header('location:Log-In.php');
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Participants">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Vote</title>
    <link rel="stylesheet" href="Css/nicepage.css" media="screen">
    <link rel="stylesheet" href="Css/Vote.css" media="screen">
    <script class="u-script" type="text/javascript" src="Js/jquery.js" defer=""></script>
<script class="u-script" type="text/javascript" src="Js/nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Oswald:200,300,400,500,600,700">

  </head>
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
</li><li class="u-nav-item"><a class="u-active-custom-color-1 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-button-style u-hover-custom-color-1 u-nav-link u-text-active-white u-text-hover-white u-text-white" href="Logout.php" style="padding: 20px 22px;">Log Out</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Vote.php">Vote</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Survey.php">Survey</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Logout.php">Logout</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
        
     

   <section class="u-align-center u-clearfix u-gradient u-section-1" id="carousel_c03c">
        <div class="u-clearfix u-sheet u-sheet-1">
          <h2 class="u-text u-text-black u-text-default u-text-1">Participants</h2>
          <p class="u-text u-text-2">Vote your favourite participant to make him/her the winner of the competition&nbsp;</p>
          <form method="POST">
        
          <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1"> <?php
       
       $conn =new mysqli("localhost","root","","voting");
       
       $prj= mysqli_query($conn,"SELECT * FROM candidates_tbl") or die(mysqli_error($conn));
               $record = array();
               while($row = mysqli_fetch_assoc($prj)){
                   $record[] = $row;
               }
               
       ?>
       <?php foreach($record as $rec){?>
              <div class="u-align-center u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white u-list-item-1">
             
                <div class="u-container-layout u-similar-container u-container-layout-1">
              
                  <img alt="" class="u-expanded-width u-image u-image-round u-radius-20 u-image-1" data-image-width="380" data-image-height="380" src="User/<?php echo $rec['candidate_img']; ?>">
                  <h3 class="u-align-left u-text u-text-black u-text-3"><?php echo $rec['candidates_name'];?></h3>
                  <div class="form-group"> <input type="radio" name="candidates_name" class="list-group" value="<?php echo $rec['candidates_name'];?>">
           
           </div>
     
                </div>
          
              </div>
              <?php } ?>
            </div>
            
          </div>
      


          

          <button type="submit" name="vote_caste" class="u-black u-border-2 u-border-custom-color-1 u-border-hover-grey-90 u-btn u-btn-round u-button-style u-hover-white u-radius-50 u-btn-1">VOTE</button>
                   
         </form>
        </div>
        <?php
    if(isset($_POST['vote_caste'])) {
      
        $candidates_name=$_POST['candidates_name'];
        $user_email= $_SESSION['user_email'];
        $select="SELECT * from result_tbl where user_email='$user_email'";
        $exe1=$conn->query($select);
        if($exe1->num_rows>0) {
            echo "<div class='lol-ag'><h4>You Have Already Voted : <a href='welcome.php'>Click Here</a> </h4></div>";}
            else {
              $insert="INSERT INTO result_tbl (user_email,candidates_name) values('$user_email','$candidates_name')";
              $run=$conn->query($insert);
              if($run){
                    $update="UPDATE candidates_tbl set total_votes=`total_votes`+'1' where candidates_name='$candidates_name'";
                    $exe=$conn->query($update);
                    if($exe){
                        echo "<div class='lol-ag'><h4>You Have Successfully Voted... </h4></div>";
                    }
                    else {
                        echo "<div class='lol-ag'><h4>Your Vote Was Not Submitted...</h4></div>";
                    }
               
                  }
                  else {
                      echo "ERROR";
                }
                } 
            }
?>
           
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