<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['usermain'])) {
    if (isset($_COOKIE['usermain'])) {
      $_SESSION['usermain'] = $_COOKIE['usermain'];
    }
  }
   if((!isset($_SESSION['usermain'])) && (!isset($_COOKIE['usermain'])))
  {
	  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login-main.php';
  header('Location: ' . $home_url);
  }
?>
<html ng-app="mainhospital">
<head >

	<title>Main page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src="mainhospitalcontroller.js"></script>
</head>
  <style>
 .box-shadow{
  box-shadow:0 0 10px 0 rgba(0,0,0,.40);
  height:auto;
  margin:1%;
  padding:6%;
 }
 .active{
  color:#337AB7;
  font-weight: bolder;
 }
  </style>
<body ng-controller="mainhospitalcontroller">
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><?php
if (isset($_SESSION['usermain'])) {
    echo '<a href="logoutmain.php" type="button" class="btn btn-sm">Log Out </a><div class="active">(' . $_SESSION['usermain'] . ')</div>';
  }
  ?></li> 
      </ul>
    </div>
  </div>

<div class="row">
<div class="col-md-offset-3 col-md-6">
<form   role=" form" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div ng-repeat="dat in hospitaldata" class="text-center box-shadow">
  <div class="row">
    <div class="col-md-6 col-xs-12 col-sm-12">
     <h4>Patient Id :</h4>
    
  </div>
  <div class="col-md-6 col-xs-12 col-sm-12">
  <label for="id"><input name="id" id="id" type="hidden"></label>
  <h5>{{dat.p_id}}</h5>

   </div>

 </div>
 <div class="row">
    <div class="col-md-6 col-xs-12 col-sm-12">
     <h4>Patient Name :</h4>
    
  </div>
  <div class="col-md-6 col-xs-12 col-sm-12">
  <h5>{{dat.p_name}}</h5>
   </div>
 </div>
  <div class="row">
    <div class="col-md-6 col-xs-12 col-sm-12">
     <h4>Problem Report :</h4>
    
  </div>
  <div class="col-md-6 col-xs-12 col-sm-12">
  <a href="files/{{dat.p_file}}"><h5>Download</h5></a>
   </div>
 </div>
 <div class="row">
 <div class="col-md-12">
 </br>
    <?php
  echo '<a  type="button"class="btn btn-primary" href="submit.php?id=' . "{{dat.p_id}}".'"><h5>Add Report</h5></a><BR/>';
  ?>
 </div>
</div>
 </form>
 

</div>
</div>
</body>
</html>