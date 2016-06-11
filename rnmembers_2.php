<?php // rnmembers.php
ob_start();
include_once 'rnheader.php';
if (!isset($_SESSION['user']))
die("<br /><br /><br/><br/><br/><meta http-equiv='Refresh' content='5;url=index.php'/><div align='center' class='div4' ><hr/><br/><br/><b><big><font class='ftmsg'>!...Oppss Wrong place...!<br/>You need to login to view this page...!<br/>Wait for 5 seconds, you'll be redirected</font></big></b><br/><br/><hr/></div>");

echo " <style>
#load {
	display: none;
	position: fixed;
	left: 40%;
	top: 40%;
	background: url(images/slick_image/gif-loadingimages/image_471433.gif);
	width: 90px;
	/*marign:-40px -50px -40px -20px;*/
	z-index:999;
	height: 90px;
	text-indent: -9999em;
}
</style>";
if (isset($_GET['view']))
{
echo "<div id='wrapper'>";
$view = sanitizeString($_GET['view']);
if ($view == $user) $name = "Your Home";
else $name = "$view's";
//					LOader ajax(.gif						//
//						|| Shadow Box ||					//

echo"<div class='drop-shadow curved curved-vt-2' id='div-shadow-box'>";
//							Division Green						//
echo"
<div class='div4' >
<h3 class='pg'>$name Page</h3>
<hr style='margin-bottom:0px;'/>
<div class='divpg'>";
echo<<<_END


_END;
//				Quote of the Day				//
echo"<hr /><fieldset id='quoteajax' class='outer' style='background-image:url(son.png);margin:0 auto;top:0px;left:0px;'>";
require_once('quote.php');
echo"</fieldset><br clear=right />";

echo "<div style='margin:-90px 90% auto;' float='right' id='refresh'><a class='button black' href='rnmembers.php?view=$view'>Refresh</a></div>";
//				Messages Notification				//

//				ShareBocx				//
echo<<<_END
<br/><br/>
<div style='display:block;margin-left:20px;width:600px;height:150px;' id='sharebox'>
<table><tr>
<form id='shareform' action='shareform.php?view=$view' method='post' name='shareform' enctype="multipart/form-data">
<b id='gifinfo' class='defb' style='display:block;' align='center'>Share Box</b>

<td>
<textarea name='shareboxtxt' id='shareboxtxt' cols='55
' class='ud3btn' placeholder='Whats In Ur Mind..!!'  style='max-width:480px;height:85px;resize:none;'></textarea>
</td><td>
Pr<input type='radio' name='pm' value='0' checked='checked' />
Pb<input type='radio'  name='pm' value='1' checked='checked'/>
<input type='file' style='width:100px;' id='sharepix' name='sharepix' class='button blue' value='upload' />
<input type='submit' id='sharesubmit' name='sharesubmit' class='button green' value='Post' onclick='document.shareform.sharesubmit.value="Posting..!!"'/>
</td>

</form></tr></table>
</div><br/>

_END;
echo"<div id='sharecontent'>";
require_once('shareform.php');
echo"</div>";
//			shareform			//
////			End of divisions			////

echo<<<_END

<script type='text/javascript'>
	var sharebutton = document.getElementById('sharesubmit');
 var boxtxt= document.getElementById('shareboxtxt');
	var sharepixfile = document.getElementById('sharepix');

function txtload1(){
	$("textarea[name='txt']").each(function(i,el){
	$(el).height(el.scrollHeight);
});
}
$(document).ready(function(){
	window.txtload1();
});

function clear(){
$('#gifinfo').html("<img src='images/slick_image/gif-loadingimages/image_471476.gif' style='margin-top:10px;'/>");

}
function reset(){
boxtxt.value='';
sharebutton.value='Post Again';
$('#gifinfo').html('<b>Share Box</b>');
sharepixfile.value='';
window.txtload1();
}

var sharediv = document.getElementById('sharecontent');
var frm1 = $('#shareform');

$('#sharesubmit').click(function(){

		frm1.ajaxForm({
		beforeSubmit: clear,
		target: sharediv,
		success: reset
		}).submit();

return false;
});

var msgchk=0;
function loadload1(){
$('#sharediv').load('shareform.php?view=$view #sharediv');
window.txtload1();
}
function msgchkfn1()
{
	$.get('sharecheck.php',function(datashare){
	if(msgchk!=datashare)
	{
	window.setTimeout('loadload1()',1000);
	msgchk=datashare;
	}
	});
}
$(document).on('scroll',function(e){
window.setTimeout('msgchkfn1()',1000);
});
</script>
<script type="text/javascript" src="js/msgnotify.js"></script>
<script>
$(document).on('mousemove',function(e){
window.setTimeout('msgchkfn()',1000);
});
</script>
_END;
echo"</div><hr style='margin-top:0px;'/><p  style='margin-left:50;'>| <a class='button grey' href='rnmessages.php?view=$view'><font color='black' face='segoe print'><strong>$name Messages</strong></font></a> | ";
echo"<a class='button grey' href='rnfriends.php?view=$view'><font color='black' face='segoe print'><strong>$name Friends </strong></font></a>|</p>
</div></div>";
footer();
	echo"</div>";
}
ob_end_flush();
?>