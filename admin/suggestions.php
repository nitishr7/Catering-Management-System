<?php
	require_once('auth.php');
?>
<html>
<head>
<link rel="stylesheet" href="admin.css">
<script src="dng_comedor.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<body>
	<div id="top">
		<div class="logo">
			<img src="../images/logo.png"> <span style="float:right; color:#FFFFFF; font-weight:bold; display: inline-block; padding: 20px 0 0 20px;">Hello <?php echo $_SESSION['USERNAME'] ?></span>
		</div>
	</div>
	<div class="container  clearfix">
		<div class="one-third1 column">
			<ul>
				<li><a href="index.php"><span>Reservation</span></a></li>
				<li><a href="menu.php"><span>Menu</span></a></li>
				<li><a href="menuorders.php"><span>Menu Orders</span></a></li>
				<li class="active"><a href="suggestions.php"><span>Messages</span></a></li>
				<li><a href="team.php"><span>Team</span></a></li>
				<li><a href="teammember.php"><span>Team Member</span></a></li>
				<?php 
				$jhjh=$_SESSION['POWER'];
				if($jhjh==1){
				?>
				<li><a href="adminaccount.php"><span>Authority</span></a></li>
				<?php
				}
				?>
				<li><a href="../index.php"><span>Logout</span></a></li>
			</ul>
		</div>
		<div class="two-thirds1 column">
			<div class="thewraper">
				<table id="resultTable" data-responsive="table">
				<thead>
					<tr>
						<th> Name </th>
						<th> Subject </th>
						<th> Comment </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
						include('../connect.php');
						$result = $db->prepare("SELECT * FROM suggestion ORDER BY id DESC");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr class="record">
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['subject']; ?></td>
						<td><?php echo $row['comment']; ?></td>
						<td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){


var element = $(this);


var del_id = element.attr("id");


var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesuggestion.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>