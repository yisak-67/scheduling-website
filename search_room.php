
<?php include('header.php'); include('hover.php'); include('admin/dbcon.php'); ?>
</head> 
<body>
<div class="coat">
<div class="wrapper">
<div class="navbar navbar-fixed-top">
 <div class="navbar">
  <div class="navbar-inner">
  <div class="nav_jkl">
    <div class="container">
<ul class="nav">
<a class="brand" href="#">
<font color="white">Course Schedule Viewer</font>
</a>
  <li>
    <a href="index.php"><i class="icon-home icon-large"></i>Home</a>
  </li>
  <li class="dropdown">
    <a href="#"
          class="dropdown-toggle"
          data-toggle="dropdown">
          <i class="icon-search icon-large"></i>Exam Schedule
          <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li><a href="Schedule.php">Teacher</a></li>
      <li><a href="">Course Year Section</a></li>
      <li><a href="">Room</a></li>
    
    </ul>
  </li>
   <li class="divider-vertical"></li>
  <li class="dropdown">
    <a href="#"
          class="dropdown-toggle"
          data-toggle="dropdown">
          <i class="icon-search icon-large"></i>Class Schedule
          <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li><a href="search_teacher.php">Teacher</a></li>
      <li><a href="CYS.php">Course Yerar Section</a></li>
      <li><a href="search_room.php">Room</a></li>
    
    </ul>
  </li>
      <li class="divider-vertical"></li>
  <li><a href=""><i class=" icon-question-sign icon-large"></i>Help</a></li>

    <li class="divider-vertical"></li>
  <li><a href="admin/index.php" class="admin"><i class="icon-user icon-large"></i>Admin Login</a></li>
 
	</ul>
    </div>
    </div>
  </div>
</div>
</div>

<div class="hero-unit">
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><img src="img/header.jpg" width="1090" height="250"></div>
    <div class="item">�</div>
    <div class="item">�</div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>

<div class="hero-unit-bud">
<div class="jkl">
<a href="" class="facebook"><img src="img/facebook.png"/></a>&nbsp;&nbsp;<img src="img/email_32.png"/>&nbsp;&nbsp;<img src="img/rss_32.png"/>&nbsp;&nbsp;<img src="img/twitter_32.png"/>
&nbsp;&nbsp;<img src="img/blogger.png"/>
</div>
<ul class="nav nav-tabs"> 
  <li class="active"><a href="" data-toggle="tab"><font color="white"><i class="icon-search icon-large"></i></font><font color="orange">Search Rooms</font></a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">
  <div class="hero-unit-y">
  
  
  <h2>Search Rooms Schedule</h2>
Please select data on each field to filter.
<hr>
	   <form id="save_voter" class="form-horizontal" method="POST" action="search_room_result.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter60">
    
	<div class="control-group">
    <label class="control-label" for="input01">Rooms:</label>
    <div class="controls">
   <select name="room" class="span33">
	<option>--Select--</option>
	<?php $room_query=mysqli_query($conn,"select * from room")or die(mysqli_error());
while($room_row=mysqli_fetch_array($room_query)){
	?>
	<option><?php echo $room_row['room_name']; ?></option>
	<?php } ?>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="semester" class="span33">
	<option>--Select--</option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">School Year:</label>
    <div class="controls">
   <select name="sy" class="span33">
	<option>--Select--</option>
<?php $sy_query=mysqli_query($conn,"select * from sy")or die(mysqli_error());
while($sy_row=mysqli_fetch_array($sy_query)){
 ?>
<option><?php echo $sy_row['sy']; ?></option>
 <?php } ?>
	</select>
    </div>
    </div>
	
	<div class="control-group">

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-ok icon-large"></i>Submit</button>
    </div>
    </div>
	
    </fieldset>
    </form>
  
  
     </div>


  </div>
  

</div>
</div>

<?php include('footer.php'); ?>
</div>
</div>


</body>

		
</html>
