<?php // rnmembers.php
ob_start();
include_once 'rnheader.php';
if (!isset($_SESSION['user']))
die(require_once('error.php'));

echo<<<_END
<link href='css/vtab.css' type='text/css' rel='stylesheet'>
<style type='text/css'>
table a{
font-size:13 !important;
}
table img{
width:92px;
height:90px;
border:ridge;
}
</style>
_END;

//..............Shadowed Box.................//
require_once('leftpane.php');
echo"<div id='wrapper'>";
echo "  <div class='drop-shadow curved curved-vt-2' id='div-shadow-box' style='height:auto;width:75%;margin:0px auto 80px 22%;padding:-60px;top:0px;'> ";
//..................................................Division Green.................................//
echo "<div class='div4' ><h3 class='pg'><font class='ft3'>Other Members</font><br/></h3><hr style='margin-bottom:0px;'/>
<div class='divpg' style='overflow-y:auto !important;'><br/>";
echo"<table><tr><td>";
echo<<<_END
<h4 class='defb' style='margin:auto auto -10px 110px;z-index:999;text-align:center;' id='lola'> TAbbed Friend list</h4>
<div id="vtab">
        <ul>
            <li class="home"></li>
            <li class="login"></li>
            <li class="support"></li>
        </ul>
        <div>
            <h4 > Your Member's Group!!</h4>
	<ul>
_END;
echo"<span id='memberdiv' >";
require_once('follow.php');
echo"</span>";
echo"</ul></div>";
echo<<<_END
        <div >
            <h4>YOur Friends</h4>
	<ul>
_END;
echo"<span id='friendiv'>";
require_once('followfriend.php');
echo"</span>";
echo<<<_END
	 </ul></div>
	 <div>
	  <h4>YOur FOllowers</h4>
	 <ul>
_END;
echo"<span id='followdiv'>";
require_once('followfollow.php');
echo"</span>";
echo<<<_END
	 </ul></div>
</div>
_END;
echo"</td><td>";
echo "<fieldset class='iner'   style='width:170px;background-image:url(images/grunge.png);'>";
echo "</fieldset><hr style='margin-top:0px;'/><br/><br/>
</td></tr></table>
</div><br/></div></div>
<br/><br/>";

echo "</div>";
footer();
//..........|| peoples.php ||.........//

echo <<<_END
<script type='text/javascript'>

function clicky(id,rel){
$('h4#lola').html("<img src='images/slick_image/gif2/image_482911.gif' style='width:50px;height:20px;margin-top:5px;'/>");
var idl=$('a#'+id+'[rel='+rel+']').attr('href');
$.get(idl ,function(data){
$('#memberdiv').html(data);
$('h4#lola').html("Your Member's Group!!");
});
}
function clickyfriend(idf,relf){
$('h4#lola').html("<img src='images/slick_image/gif2/image_482911.gif' style='width:50px;height:20px;margin-top:5px;'/>");
var idlf=$('a#'+idf+'[rel='+relf+']').attr('href');

$.get(idlf ,function(data1){
$('#friendiv').html(data1);
$('h4#lola').html("Your Member's Group!!");
});
}
function clickyfollow(idf,relf){
$('h4#lola').html("<img src='images/slick_image/gif2/image_482911.gif' style='width:50px;height:20px;margin-top:5px;'/>");
var idlf=$('a#'+idf+'[rel='+relf+']').attr('href');
$.get(idlf ,function(data2){
$('#followdiv').html(data2);
$('h4#lola').html("Your Member's Group!!");
});
}
$('.home').click(function(){
$('#memberdiv').load("follow.php");
});
$('.login').click(function(){
$('#friendiv').load("followfriend.php");
});
$('.support').click(function(){
$('#followdiv').load("followfollow.php");
});
</script>
<script>
var frm= $('#account');
</script>

<script type="text/javascript">
$(function() {
var items = $('#vtab>ul>li');
items.click(function() {
items.removeClass('selected');
$(this).addClass('selected');

var index = items.index($(this));
$('#vtab > div').hide().eq(index).show();
}).eq(1).click();
});
</script>
_END;
ob_end_flush();
?>