<?php // rnmessages.php
ob_start();
include_once 'rnheader.php';

if (!isset($_SESSION['user']))
die(require_once('error.php'));

if (isset($_GET['view'])){
	if(($_GET['view'])!= $user)
	die("<br /><br /><br/><br/><br/><meta http-equiv='Refresh' content='5;url=rnmessages.php?view=$user'/><div align='center'  class='div4'><hr/><br/><br/><b><big><font class='ftmsg'>!...Oppss.., Something Wrong...!<br/>You cannot access Someone else's( ".$_GET['view']." ) Message Page ...!<br/>Wait for 5 seconds, you'll be redirected</font></big></b><br/><br/><hr/></div>");
else
	$view = stripslashes($_GET['view']);
}
/*
?>
<div id='st-container' class='st-container'>

<div class="st-pusher">
<nav class="st-menu st-effect-2" id="menu-2">
	<h2 class="icon icon-stack">Sidebar</h2>
		<ul>
			<li><a class="icon icon-data" href="#">Data Management</a></li>
			<li><a class="icon icon-location" href="#">Location</a></li>
			<li><a class="icon icon-study" href="#">Study</a></li>
			<li><a class="icon icon-photo" href="#">Collections</a></li>
			<li><a class="icon icon-wallet" href="#">Credits</a></li>
				</ul>
	</nav>
<div class="st-content"><!-- this is the wrapper for the content -->
<div class="st-content-inner">
<?php
*/
if ($view != "")
{
if ($view == $user)
{
$name1 = "Your";
$name2 = "Your";
$name3 = "You";
}
else
{
$name1 = "<a href='rnmembers.php?view=".ucwords($view)."'><font class='ud1btn' style='font-size:24px;'>".ucwords($view)."</font></a>'s";
$name2 = ucwords($view)."'s";
}
//.............				Shadowed Box		..............//
echo " <style>
.hide{
display:none;
}
</style>";
//require_once('leftpane.php');
echo"<div class='notifyland'></div>";

echo"
 <div class='drop-shadow curved curved-vt-2' id='div-shadow-box' style='height:auto;width:75%;margin:0px auto 80px 22%;padding:-60px;top:0px;'> ";
//			.......Division Green			.......//
echo "<div class='div4'><h3 class='pg'> ";
echo ucwords($name1)." Messages </h3>";
echo "
<hr style='margin-bottom:0px;'/><div class='divpg'>";
echo "<br/><div id='msgover'  style='margin-left:8px'>";
require_once('msgdiv.php');
echo "<br/></div>
</div><hr style='margin-top:0px;'/>
<p  style='margin-left:50;text-shadow:20px;'><strong>|<a class='button grey' href='rnmessages.php?view=$view'><font color='black' face='segoe print'> Refresh messages</font></a>";
echo " | <a class='button grey' href='rnfriends.php?view=$view'><font color='black' face='segoe print'>View $name2 friends </font></strong></a>|</p></div></div><br/>";
footer();
echo"</div>";
}
/*
?>
</div></div></div>
<?php  ?>
<script src="js/classie.js"></script>
<script src="js/sidebarEffects.js"></script>
<?php
*/
echo<<<_END
<script type='text/javascript'>
//				Onload Settings				//

$('#$msgsetrecent[0]').addClass('fieldavailableusersactive');
$('#currentuser').html(" <b class='ud1btn'>< $msgsetrecentname ></b>");
function txtload(){
$('textarea[rel=txtarea]').each(function(i,el){
$(el).height(el.scrollHeight);
});}
var frm = $('#div-message');
var msgpost = document.getElementById('submitmsg');
var msgdiv = document.getElementById('postmsg');
var txtinput = document.getElementById('txtinput1');

$(document).ready(function(){
window.txtload();
});
</script>
_END;
?>
<script type='text/javascript' src='js/msgnotify.js'>
</script>
<?php
echo<<<_END
<script>
// 		for loading the content after every MouseMove 		//
function loadload(){
$.get('messagepost.php?view=$user&read=1',function(data){
window.setTimeout(function(){msgdiv.innerHTML=data;},2000);
window.txtload();
});
}

//$(document).on('mousemove',function(e){
window.setInterval('msgchkfn()',1000);
//});
</script>
_END;
?>
<script>

//......Functions For Newline on Enter in textarea......//

 $('#chk').click(function(){
var check = $(this).attr('checked');
if(check=='checked'){
	//msgpost.removeAttribute("disabled");
	txtinput.setAttribute('placeholder',' NOw Press Enter to Newline and submit button to Send !!');
	$('#submitmsg').show('fast');
	}
else{
	msgpost.setAttribute("disabled","true");
	txtinput.setAttribute('placeholder',' Press Enter + Shift for NEW-LINE, While Writing !!');
	$('#submitmsg').hide('fast');
	}
}); 
</script>
<script>

function interval()
{  
msgpost.value ='Send';
}
function loadgif(){
document.getElementById('msggifinfo').innerHTML="<img src='images/slick_image/gif-loadingimages/image_471476.gif' style='margin-top:10px;'/>";
}
function cleargif(){
$('#msggifinfo').html('Compose Message');
}
function reset() {
window.cleargif();
window.txtload();
window.setTimeout('interval()',2000);
}
function clear(){
txtinput.value='';
msgpost.value = 'Posted..!!';
}
function sendmsg(){
$('#specific').prepend("<div class='color:red;'>Hello..</div>")
}
$('.txtinput1').keydown(function(e){
 var check = $('#chk').attr('checked');
	if(check!='checked')
  {
	if( e.keyCode==13 && !e.shiftKey )
	{
	window.loadgif();
	var fieldid=$('.fieldavailableusersactive').attr('id');
$.ajax({
		type: 'POST',
		data: frm.serialize(),
		url: 'messagepost.php?view='+fieldid,
	success: function (data) {
		clear();
		//alert(frm.serialize());
		//sendmsg();
		$('div#postmsg').innerHTML=data;
		//$('div#postmsg').html(data);
		reset();
		}
	});
	e.preventDefault();
	}
//msgpost.setAttribute("disabled","true");
  }
});
</script>
<script>
//......Functions For Animating the username-list in message box........//

function rmvclass(){
$('.divavailableusers').animate({'width':'5px'},500);
$('.divavailableusers').removeClass('divavailableusers1');
}
/*var ishover = false;
$('.divavailableusers').hover(function(){
$(this).addClass('divavailableusers1');
$(this).animate({'width':'250px'},500);});
*/
var j=0;
$('#slidebtn').click(function(){
	if(j%2==0 ){
$('.divavailableusers').addClass('divavailableusers1');
$('.divavailableusers ').animate({'width':'250px'},500);
j++;
}
else{
	window.rmvclass();
	j++;
	}
});

$("#slidy, #div-messagebox").click(function(){
window.rmvclass();
//ishover=false;
});
</script>

<script type='text/javascript'>
//.....Functions for sending the required user name to messagepost.php.....//
$('.fieldavailableusers[rel=clic]').click(function(e){
	window.loadgif();
 var idval =$(this).attr('id');
 if($('.fieldavailableusers').hasClass('fieldavailableusersactive'))
 $('.fieldavailableusers').removeClass('fieldavailableusersactive');
 $(this).addClass('fieldavailableusersactive');
	
	$('#postmsg').load('messagepost.php?view='+ idval +'&read=1',function(data){
	$('span.recipajaxname').html("<input type='hidden' id='recipajaxname' name='recipent' value='"+idval+"'></input>");
	window.setTimeout('cleargif()',500);
	window.txtload();
	});
	/*
	$('#msgover').html(data);
	//;
	window.txtload();
	window.setTimeout('cleargif()',500);
	});*/
	var classfield =$(this).attr('value');
document.getElementById('currentuser').innerHTML=" <b class='ud3btn' style='color:#7e93a8;'>< "+classfield+" ></b>";
e.preventDefault();
});
</script>
<?php
echo<<<_END
<script type='text/javascript'>
//		Function for changing the Sent-tick icon		// 
$(document).mousemove(function(){
	var idclass= $('div#specific').attr('class');
	var idrel= $('div#specific').attr('rel');
	if(idrel=='$user')
$.get('msgreadcheck.php?id='+ idclass +'&view='+ idrel,function(data){
if(data==1){
//$('img#txtimg[rel='+idclass+']').setAttribute("src","images/msgsicons/tick.png");
	$('span#'+idclass).html("<img id='txtimg' src='images/msgsicons/tick.png'/>");
	}
});
});
</script>
_END;
?>
<script >
//		Function for refeshing the msgs after remove	// 
function slideup(id){
$('div#specific.'+id).fadeOut('slow');
$('div#specific.'+id).hide('fast');
}
function refresh(){
	window.txtload();
	window.cleargif();
}

function erasemsg(userid){ 
window.loadgif();
var hrf=$('#erase-'+userid).attr('href');
window.slideup(userid);
window.setTimeout(function(){
$.get(hrf,function(data){
$('#postmsg').html(data);
});},1500);

window.refresh();
}
</script>
<script>

</script>
<?php

ob_end_flush();
?>