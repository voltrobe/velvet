<?php // rnmembers.php
ob_start();
include_once 'rnheader.php';
if (!isset($_SESSION['user']))
die("<br /><br /><br/><br/><br/><meta http-equiv='Refresh' content='5;url=index.php'/><div align='center' class='div4' ><hr/><br/><br/><b><big><font class='ftmsg'>!...Oppss Wrong place...!<br/>You need to login to view this page...!<br/>Wait for 5 seconds, you'll be redirected</font></big></b><br/><br/><hr/></div>");
if(isset($_GET['view']))
$view=sanitizeString($_GET['view']);

$query = "SELECT user FROM snmembers WHERE user='$view' ";
if(mysql_num_rows(queryMysql($query)) == 0)
die("<br /><br /><br/><br/><br/><meta http-equiv='Refresh' content='5;url=member.php?view=$user'/><div align='center'  class='div4'><hr/><br/><br/><b><big><font class='ftmsg'>!...Oppss.., Something Wrong...!<br/>You cannot access Non-Existing Profile's( ".$_GET['view']." ) ShareFeed Page ...!<br/>Wait for 5 seconds, you'll be redirected</font></big></b><br/><br/><hr/></div>");

echo " <style>
.wrapper{
	z-index:999;
	text-indent: -9999em;
}
</style>";
if ($view)
{
echo"<div class='sidebar'><div class='innersidebar'>
<span style='display:block;width:100%;height:40px;margin-top:5px;'>
	<span style='text-align:center;width:80%;'>
<button rel='btn' id='messenger' class='defbtn'>Messanger-></button>
<button rel='btn' id='activities' class='defbtn'>Activities-></button>
</span></span>
	<div class='messengerdiv'>
		<br/> <small class='xmlwords'>Available users</small>";
	for($i=0 ;$i<$numheader; $i++){
	$rowheader=mysql_fetch_row($resultheader);
	if($rowheader[0]==$user) continue;
	$userpicexists=(file_exists("pics/profile/$rowheader[0]/thumbnail/$rowheader[0]"."_thumb.jpg"))? "pics/profile/$rowheader[0]/thumbnail/$rowheader[0]"."_thumb.jpg" : "pics/p-photo.png";
	$nameabc=ucwords($rowheader[2]." ".$rowheader[3]);
	echo"<button class='fieldavailableusers' rel='clic' value='$nameabc' id='$rowheader[0]'>
	<img src='$userpicexists' align='left'/><small id='fieldvalue' >$rowheader[2] $rowheader[3]</small></button>";
	}

echo"</div>
	<div class='activitiesdiv'>
		<br/> <small class='xmlwords'>Activitsnvckjdnslkjnsd</small>
	</div>
	</div></div>";
echo "<div id='wrapper'>";
$view = sanitizeString($_GET['view']);
if ($view == $user) $name = "Your Home";
else $name = "$view's";
//					LOader ajax(.gif						//
//						|| Shadow Box ||					//

//echo"<div class='drop-shadow curved curved-vt-2' id='div-shadow-box'><div class='div4' >";
//							Division Green						//
echo"<br/>
<h2 class='footerfont' style='margin-left:50px !important;font-size:30px;'>$name Page</h2>
<hr style='margin-bottom:0px;'/>
<div class='divpg' style='background:transparent !important;margin-left:30px !important;'>";
echo<<<_END

_END;
//				Quote of the Day				//
//echo"<hr /><fieldset id='quoteajax' class='outer' style='background-image:url(son.png);margin:0 auto;top:0px;left:0px;'>";
//require_once('quote.php');
//echo"</fieldset><br clear=right />";

echo "<div style='margin:-90px 90% auto;' float='right' id='refresh'><a class='button black' href='rnmembers.php?view=$view'>Refresh</a></div>";
//				Messages Notification				//

//				ShareBocx				//
echo<<<_END
<br/><br/>
<div style='display:block;margin-left:20px;width:450px;height:150px;' id='sharebox'>
<table><tr>
<form id='shareform' action='shareform.php?view=$view' method='post' name='shareform' enctype="multipart/form-data">
<b id='gifinfo' class='defb' style='display:block;' align='center'>Share Box</b>

<td>
<textarea name='shareboxtxt' id='shareboxtxt' cols='37
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

var sharechk=0;
var k=0;
function loadload1(){
$('#sharediv').load('shareform.php?view=$view #sharediv');
}
function msgchkfn1()
{
	$.get('sharecheck.php',function(datashare){
	if(sharechk!=datashare)
	{
	window.setTimeout('loadload1()',1000);
	sharechk=datashare;
	window.txtload1();
	}
	});
	if(k<3){
	k++;
	window.txtload1();
	}
}
$(document).on('scroll',function(){
	window.setTimeout('msgchkfn1()',1000);
	window.setTimeout('msgchkfn()',1000);
});
</script>
<script type="text/javascript" src="js/msgnotify.js">
</script>
<script>
function sidehide(){
	$('.sidebar ,.innersidebar').animate({'opacity':'0'},100);
	$('#wrapper').animate({'margin-left':'0px'},500);
	}
	$('.sidebar').hover(function(){
$('#wrapper').animate({'margin-left':'20%'});
$('.sidebar ,.innersidebar').animate({'opacity':'1'},1000);
	});
	$('#wrapper').click(function(){
	sidehide();
	});
</script>
<script>
	$('.innersidebar>#messenger[rel=btn]').addClass('ud1btn');
	$('#messenger').click(function(){
		$('.activitiesdiv').hide();
		$('.messengerdiv').show();
	});
	$('#activities').click(function(){
	$('.messengerdiv').hide();
	$('.activitiesdiv').show();
	});
$('.innersidebar>span>span>button[rel=btn]').click(function(){
if($('.innersidebar>span>span>button[rel=btn]').hasClass('ud1btn'))
	{
$('.innersidebar>span>span>button[rel=btn]').removeClass('ud1btn');

	}
$(this).addClass('ud1btn');

	});
</script>
_END;
echo<<<_END
<script>
	function hide(){
	$('#txtslidy').hide('fast');
	}
	function slideup(){
	$('#txtslidy').slideUp('normal',hide);
	}

	$('#erase').live('click', function(){
	$("#erase").ajaxForm({
	beforeSubmit: slideup,
	target: '#sharediv',
	url: $(this).attr('href'),
	type: 'GET',
	}).submit();
	return false;
	});

	var clk=0;
	$('#imgclick').click(function(){
	$('body').css('height','100%');
	$('body').css('overflow-y','hidden');
	clk=1;
	});
	$('body').click(function(){
	if(clk==1){
	$('body').css('overflow-y','auto');
	clk=0;
	}
	});

</script>
_END;
echo"</div><hr style='margin-top:0px;'/><p  style='margin-left:50;'>| <a class='button grey' href='rnmessages.php?view=$view'><font color='black' face='segoe print'><strong>$name Messages</strong></font></a> | ";
echo"<a class='button grey' href='rnfriends.php?view=$view'><font color='black' face='segoe print'><strong>$name Friends </strong></font></a>|</p><br/><br/>";
//</div></div>";
footer();
	echo"</div>";
}
ob_end_flush();
?>