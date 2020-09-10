<?php
include('connect.php');
$dsdsss=$res=$_POST['res'];
$sadsdsd = $db->prepare("SELECT count(*) FROM reservation WHERE res_id= :a");
	$sadsdsd->bindParam(':a', $dsdsss);
	$sadsdsd->execute();
	$rowaas = $sadsdsd->fetch(PDO::FETCH_NUM);
	$wapakpak=$rowaas[0];
	if($wapakpak==0) {
	echo '<div style="text-align: center; margin-top: 100px;">Reservation ID Not Found<br><a href="index.php">Back</a></div>';
	}
	if($wapakpak>0){
?>



<html>
<head>
<!--sa poip up-->
<link href="admin/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="admin/lib/jquery.js" type="text/javascript"></script>
<script src="admin/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'admin/src/loading.gif',
      closeImage   : 'admin/src/closelabel.png'
    })
  })
</script>



<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>
<body style="background-image:url(images/print.png);">
<a href="javascript:Clickheretoprint()" style="font-size:20px";>Print</a>|<a href="index.php" style="font-size:20px";>Back</a>
<div class="content" id="content" style="width: 700px; font-size:13px; font-family:arial; font-weight:normal; margin:0 auto;">
<div style="text-align:center;">
<strong style="font-size:14px">Company Name</strong><br>
<strong>RESTAURANT & CATERING</strong><br>
Rosario-Verbena Streets, Bacolod City<br>
Tel. No. 435-1114
</div><br><br>
<?php
include('connect.php');
$res=$_POST['res'];
$result = $db->prepare("SELECT * FROM reservation WHERE res_id= :userid");
	$result->bindParam(':userid', $res);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<div style="float:left; width:50%;line-height:20px;">
Reservation ID:<strong><?php echo $row['res_id']; ?></strong><br>
Status:<strong><?php echo $row['status']; ?></strong><br>
First Name:<strong><?php echo $row['firstname']; ?></strong><br>
Last Name:<strong><?php echo $row['lastname']; ?></strong><br>
Address:<strong><?php echo $row['address']; ?></strong><br>
Contact:<strong><?php echo $row['contact']; ?></strong><br>
Date:<strong><?php echo $row['date']; ?></strong><br>
Time:<strong><?php echo $row['time']; ?></strong><br>
Motif:<strong><?php echo $row['motif']; ?></strong><br>
</div>
<div style="float: right; width: 50%; text-align: right; line-height: 20px; height: 162px;">
Type of Occasion:<strong><?php echo $row['type_events']; ?></strong><br>
Type of Reservation:<strong><?php 
echo $row['type_res']; 
$dsdssd=$row['type_res'];
?></strong><br>
Type of Catering:<strong><?php echo $row['type_catering']; ?></strong><br>
No. Of Pax:<strong><?php echo $row['pax']; ?></strong><br>
Venue:<strong><?php echo $row['venueaddress']; ?></strong><br>

Combo: <strong><?php
$id=$row['combo'];
$result = $db->prepare("SELECT * FROM combo WHERE id= :asas");
	$result->bindParam(':asas', $id);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
	echo $rows['comboname'].'-'.$rows['combolist'];
	$sdsds=$rows['comboname'];
	}
?></strong><br>
Payable Amount:&nbsp;
<strong>Php<?php
function formatMoney($number, $fractional=false) {
	if ($fractional) {
		$number = sprintf('%.2f', $number);
	}
	while (true) {
		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
		if ($replaced != $number) {
			$number = $replaced;
		} else {
			break;
		}
	}
	return $number;
}
$sdrwer=$row['res_id'];
$p=$row['pax'];
$pr=$sdsds;
$total=$p*$pr;
if ($dsdssd!='functionroom') {
$dsd=$total;
echo formatMoney($dsd, true);

}
echo '</div>';
if ($dsdssd=='functionroom') {
$bbbb=$total+3000;
echo formatMoney($bbbb, true);
}
?>
</strong>
<br><br>
<br><br>

<?php
	}
?>
<table id="resultTable" width="100%" style="font-size:11px; font-family:arial; font-weight:normal;">
<thead>
	<tr>
		<th style="text-align:left;"> Type Of Menu </th>
		<th style="text-align:left;"> Menu </th>
	</tr>
</thead>
<tbody>
<?php
	$result = $db->prepare("SELECT * FROM menu_res WHERE res_id= :asas");
	$result->bindParam(':asas', $res);
	$result->execute();
	for($i=0; $rowas = $result->fetch(); $i++){
		$menu=$rowas['menu'];
		$results = $db->prepare("SELECT * FROM menu WHERE id= :ll");
		$results->bindParam(':ll', $menu);
		$results->execute();
		for($i=0; $rowass = $results->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $rowass['scat']; ?></td>
			<td><?php echo $rowass['name']; ?></td>
			</tr>
			<?php
		}
	}
?>
</tbody>
</table>
</div>
</body>
</html>
<?php
}
?>