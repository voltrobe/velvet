<div id='footer' style='position:fixed;width:100%;z-index:4009;'>
<div class='div1'>
<fieldset class='fldheadapp'><img src='images/logo.png'/>
<small class='defbtn' style='font-size:12px;'><?php echo"$user"; ?></small></fieldset>
</div>


<?php 
if($loggedin){ 
$imgthumb = picthere($user);
$time=time();
$time=md5($time);
?>

<span class='boxfloat'>
<div id='floatingbar' >
<ul align='center' >
<li><img id='imgfloat' height='36' width='36' src='<?php echo"$imgthumb"; ?>' /></li>
<li><a id='iconbtn' class='defbtn' href='rnmembers.php?view=<?php echo"$user"; ?>'><img  src='PNG-icons\Home_32x32-32.png'/></a></li>
<li><a id='iconbtn' class='defbtn' href='peoples.php'>People<img   src='PNG-icons\iDisk Public_32x32-32.png'/></a></li>
<li><a id='iconbtn' class='defbtn' href='rnfriends.php'><img  src='PNG-icons\Finder_32x32-32.png'/></a></li>
<li><a id='iconbtn' class='defbtn' href='rnmessages.php?view=<?php echo"$user" ?>'><img  src='PNG-icons\Chat Alt_32x32-32.png'/></a></li>
<li><a id='iconbtn' class='defbtn' href='rnprofile.php'>Profile<img  src='PNG-icons\Applications_32x32-32.png'/></a></li>
<li><a id='iconbtn' class='defbtn' href='rnlogout.php?hext=<?php echo $time ?>'><img  src='PNG-icons\Public_32x32-32.png'/></a></li>

</ul>
</div></span>

<?php } ?>
</div>	<!-- End of Upper Footer-->
<br/><br/><br/><br/>
<!--
<div class='drop-shadow lifted'  id='topshadowedbox'>
<h1 class='footerfont' style='margin-top:-8px;'><strong>Noviya Corporation Limited</strong></h1>
</div>

	<li><a href='javascript:#'><button title='Scroll' id='dirbutton' class='default'>
	<img border=0 src='images/bottomarrow.png'></img>
	</button></a></li>
-->