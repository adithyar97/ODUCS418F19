<?php

if($_SESSION["roleId"]==19 && $_SESSION["temp_pwd_status"]==0){
  header("Location:./pmpChangePassword.php");
}

?>

<nav class="navbar  navbar-default navbar-properties">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" class="active" href="./pmpHome.php"> Patient Medication Access Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <!-- Principle Investigator =18  Care giver = 19 MEDICAL ADMIN = 21 -->
      <?php
      if (($_SESSION["roleId"] == "18") || ($_SESSION["roleId"] == "47") ){
        ?>
        <!-- <li><a href="./pmpPISendInvite.php">SEND INVITE</a></li> -->
        <!-- Prof said they donnot want to register via send invite button insteqad the PI should be able to register directly -->
        <li class="active"><a href="./pmpPIAccessCtrlTab.php">ACCESS CONTROL</a></li>
        <li><a href="./pmpPIUserMaintenanceTab.php">USERS</a></li>
      <?php
      }
      if ($_SESSION["roleId"] == "21" || $_SESSION["roleId"] == "18") {
        ?>
        <!-- <li><a href="./patientDashBoardTab.php">DASHBOARD</a></li> -->
        <!-- Prof needs dash board data to appear in home page not in a seperate tab in nav bar -->

      <?php
      }
      if ($_SESSION["f4"]) {
        ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">FORMS<span class="caret"></span></a>
          <ul class="dropdown-menu" id="navbar-dropdown-forms">
            <li><a id="loadNPI" href="NPI.php">NPI</a></li>
            <!-- <li role="separator" class="divider"></li> -->
            <li><a id="loadZBI" href="ZBI.php">ZBI</a></li>
            <!-- <li role="separator" class="divider"></li> -->
            <li><a id="loadDemqol" href="Demqol_Proxy.php">DEMQOL-Proxy</a></li>
          </ul>
        </li> 
      <?php
      }
     if ($_SESSION["f5"]){
       ?>
      <li><a href="./pmpManageUsers.php">PATIENTS</a></li>
     <?php 
         }
      ?>
      <li><a href="./pmpProfile.php">PROFILE</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION["rname"]; ?></a></li>
      <li class="organge_color"><a class="fa fa-envelope" aria-hidden="true"></span> <?php echo $_SESSION["username"] ?></a></li>
      <li><a href="./pmpLogout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT </a></li> 
     <!-- <li><a href="./pmpLogin.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT </a></li> -->
    </ul>
  </div>
</nav>
<!-- <script type="text/javascript" src="./jsFiles/renderForms.js"></script> -->
<script type="text/javascript">
$(function() {
   $(".navbar-properties>.navbar-nav>li").click(function() {
      // remove classes from all
      $("li").removeClass("active");
      // add class to the one we clicked
      $(this).addClass("active");
   });
});
</script>