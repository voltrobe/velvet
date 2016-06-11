<?php // rnmembers.php
ob_start();
include_once 'rnheader.php';
if (!isset($_SESSION['user']))
die(require_once('error.php'));

require_once('leftpane.php');
echo "<div id='wrapper'><div class='main clearfix'>";
if (isset($_GET['view']))
{
$view = sanitizeString($_GET['view']);
if ($view == $user) $name = "Your Home";
else $name = "$view's";
//					LOader ajax(.gif						//
//						|| Shadow Box ||					//

echo"<div class='drop-shadow curved curved-vt-2' id='div-shadow-box' style='height:auto;width:75%;margin:0px auto 80px 22%;padding:-60px;top:0px;'>";
//							Division Green						//
echo"
<div class='div4' >
<h3 class='pg'>$name Page</h3><hr style='margin-bottom:0px;'/>
<div class='divpg'>";
/*
//				Quote of the Day				//
echo"<hr /><fieldset id='quoteajax' class='outer' style='background-image:url(son.png);margin:0 auto;top:0px;left:0px;'>";
require_once('quote.php');
echo"</fieldset><br clear=right />";

echo "<div  style='margin:-90px 90% auto;' float='right' id='refresh'><a class='button black' href='rnmembers.php?view=$view'>Refresh</a></div>";
*/
//				Messages Notification			//

//				ShareBocx				//
echo<<<_END
	<br/><br/>
	<div rel='share' class='shareboxstyle' id='sharebox'>
	<table><tr>
	<form id='shareform' action='shareform.php?view=$view' method='post' name='shareform' enctype="multipart/form-data">
	<b id='gifinfo' class='defb' style='display:block;' align='center'>Share Box</b>

	<td>
	<textarea name='shareboxtxt' id='shareboxtxt' cols='38
	' class='ud3btn' placeholder='Whats In Ur Mind..!!'  style='max-width:480px;height:85px;resize:none;'></textarea>
	</td><td>
	Pr<input type='radio' name='pm' value='0' checked='checked' />
	Pb<input type='radio'  name='pm' value='1' checked='checked'/>
	<input type='file' style='width:100px;' id='sharepix' name='sharepix'  value='upload' />
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
echo"</div><hr style='margin-top:0px;'/><p  style='margin-left:50;'>| <a class='button grey' href='rnmessages.php?view=$view'><font color='black' face='segoe print'><strong>$name Messages</strong></font></a> | <a class='button grey' href='rnfriends.php?view=$view'><font color='black' face='segoe print'><strong>$name Friends </strong></font></a>|</p>
</div></div>";

echo"<br />";

echo"</div>"; //		External Shadow Area
 //		Container Ends
echo "<div class='md-overlay'></div>";
echo"</div>"; //		Wrapper Ends
footer();
echo <<<_END
<script type='text/javascript'>
	var sharebutton = document.getElementById('sharesubmit');
 var boxtxt= document.getElementById('shareboxtxt');
	var sharepixfile = document.getElementById('sharepix');
function txtload(){
$('textarea[rel=textarea]').each(function(i,el){
$(el).height(el.scrollHeight);
});}

function clear(){
$('#gifinfo').html("<img src='images/slick_image/gif-loadingimages/image_471476.gif' style='margin-top:10px;'/>");

}
function reset(){
boxtxt.value='';
sharebutton.value='Post Again';
$('#gifinfo').html('<b>Share Box</b>');
sharepixfile.value='';
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

var sharemsgchk=0;
function loadload1(){
//load('shareform.php?view=$view #sharediv');
$.get('shareform.php?view=$view',function(datas){
$('#sharediv').html(datas);
window.txtload();
$.getScript('js/classie.js',function(){console.log('modalClassie.js');});
$.getScript('js/modalEffects.js',function(){console.log('modalEffect.js');});
});
}
function wallmsgchkfn()
{
	$.get('sharecheck.php',function(datashare){
	if(sharemsgchk!=datashare)
	{
	//alert(datashare);
	window.setTimeout('loadload1()',1000);
	sharemsgchk=datashare;
	}
	});
}
$(document).on('scroll',function(e){
window.setTimeout('wallmsgchkfn()',1000);
});
</script>
<script type="text/javascript" src="js/msgnotify.js"></script>
<script>
$(document).on('mousemove',function(e){
window.setTimeout('msgchkfn()',1000);
});
</script>
<script>

function slideup(id){
$('fieldset#txtslidy-'+id).fadeOut('slow');
$('fieldset#txtslidy-'+id).hide('fast');
}
function refresh(){
	window.txtload();
	window.cleargif();
}

function erasemsg(userid){ 
//window.loadgif();
var hrf=$('#erase-'+userid).attr('href');
window.slideup(userid);
window.setTimeout(function(){
$.get(hrf,function(data){
$('#sharediv').html(data);
});},1500);
//window.refresh();
}
</script>
_END;
}
ob_end_flush();
?>