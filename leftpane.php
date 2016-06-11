<?php
echo"<style>
progress::-webkit-progress-bar{
	background:#eee!important;
}
progress::-webkit-progress-value{
background:blue!important;
}
#bar{
	-webkit-appearance:blue;
}
button.fieldavailableusers[rel=clic]{
margin-bottom:-25px !important;
height:25px;
}
textarea.panewriter{
margin-bottom:-15px !important;
margin-top:5px;
}
div#availablespan,div#offlinespan{
height:30% !important;
}
</style>";
echo "
<progress id='bar' color='blue' style='width:100%;
height:6px;
top:72px;
position:fixed;
z-index:6000;' value='2'  max='100'><span id='fallback'></span></progress>";
?>
<script type='text/javascript' src='js/jquery-1.8.2.min.js'></script>
<?php
echo"<!--<div id=sin></div> <button  id='clos' class='defbtn'>X</button>-->
<div class='sidebar'><div class='innersidebar'>
<span style='display:block;text-align:center;width:100%;height:30px;margin-top:5px;'>

<button rel='btn' id='messenger' class='defbtn'>Message</button>
<button rel='btn' id='activities' class='defbtn'>Activities</button>

</span>
<div class='messengerdiv'>
	 <small class='xmlwords'>Available users</small>";
echo"<div id='availablespan'>";
$resultheader=queryMysql("select * from rnprofiles where online=1");
$numheader=mysql_num_rows($resultheader);
	for($i=0 ;$i<$numheader; $i++){
	$rowheader=mysql_fetch_row($resultheader);
	if($rowheader[0]==$user) continue;
	$userpicexists=picthere($rowheader[0]);
	$nameabc=ucwords($rowheader[4]);
	/* 		Tooly() defined In requirefn.php	*/
tooly($nameabc,$rowheader[0],"button#$rowheader[0]");
echo<<<_END
<button  class='fieldavailableusers' onclick="user_button('$rowheader[0]','$nameabc')" rel='clic'  id='$rowheader[0]'>
	<img src='$userpicexists' align='left'/><small id='fieldvalue' >$nameabc</small>
	</button><form method='post' rel='$rowheader[0]' id='paneform'  action='leftpanemsg.php?view=$rowheader[0]'><hr/><textarea class='panewriter' onkeypress="keyp(event,'$rowheader[0]','$nameabc')" name='lefttextarea' id='lolwrite' rel='$rowheader[0]' style='width:100%;height:55px;resize:none;display:none;' placeholder='You may press Shift+Enter For NewLine..!!'></textarea><input type='hidden' name='recipent' value='$rowheader[0]'></input></form>
_END;
	}
echo"</div>";
	echo"<small class='xmlwords'>Offline users</small>";
echo"<div id='offlinespan'>";
$resultheader=queryMysql("select * from rnprofiles where online=0");
$numheader=mysql_num_rows($resultheader);
	for($i=0 ;$i<$numheader; $i++){
		$rowheader=mysql_fetch_row($resultheader);
		if($rowheader[0]==$user) continue;
		$userpicexists=picthere($rowheader[0]);
		$nameabc=ucwords($rowheader[4]);
	/* 		Tooly() defined In requirefn.php	*/
tooly($nameabc,$rowheader[0],"button#$rowheader[0]");
echo<<<_END
<button class='fieldavailableusers' onclick="user_button('$rowheader[0]','$nameabc')" rel='clic'  id='$rowheader[0]'>
		<img src='$userpicexists' align='left'/><small id='fieldvalue' >$nameabc</small>
	</button><form method='post' action='leftpanemsg.php?view=$rowheader[0]' rel='$rowheader[0]' id='paneform'><hr/><textarea class='panewriter' onkeypress="keyp(event,'$rowheader[0]','$nameabc')" name='lefttextarea' id='lolwrite' rel='$rowheader[0]' style='width:100%;height:55px;resize:none;display:none; placeholder='You may press Shift+Enter For NewLine..!!'></textarea><input type='hidden' name='recipent' value='$rowheader[0]'></input></form>
_END;
	}
echo"</div>";
echo"</div>
	<div class='activitiesdiv'>
		<br/> <small class='xmlwords'>Activities</small>
	</div>
	</div></div>";
?>

<script>
window.onload = function(){
var bar= document.getElementById('bar'),fallback = document.getElementById('fallback');
var loaded=0;
var load= function(){
loaded+=10;
bar.value = loaded;

$(fallback).empty().append('HTML5 progess tag not supported'+loaded +'% loaded');
if(loaded== 100){
clearInterval(dummyload);
$(bar).hide();
}
};
var dummyload = setInterval(function(){
load();
},50);
}
</script>

<!--	 Some useful Function used Below 	-->
<script>
$('#messenger').addClass('ud1btn');
function loadgifspan(yoo){
$('span#fullnamespan[rel='+yoo+']').html("<img src='images/slick_image/gif-loadingimages/image_471476.gif' style='height:10px;width:100px;'/>");
}
function loadgifcenter(yoo){
$('div#paneloader[rel='+yoo+']').append("<img src='images/slick_image/image_475259.gif' style='height:10px;width:100px;position:absolute;top:50%;'/>");
}
function cleargifcenter(yoo){
$('div#paneloader[rel='+yoo+']').html("");
}
function cleargifspan(yoo,name){
$('span#fullnamespan[rel='+yoo+']').html(name);
//alert(name);
}
function sidehide(){
$('.sidebar ').animate({'width':'-5px'},100);
$('#wrapper').animate({'margin-left':'0px'},500);
$('#wrapper').css('z-index:2000');
}
var w=$(window).width();
</script>

<!-- Function For changing the hover effect of Top-2 button-->
<script>
$("#clos ,div#wrapper").click(function(){
sidehide();
});

$('.innersidebar>#messenger[rel=btn]').addClass('ud1btn');
$('#messenger').click(function(){
$('.activitiesdiv').hide();
$('.messengerdiv').show();
});
$('#activities').click(function(){
$('.messengerdiv').hide();
$('.activitiesdiv').show();
});
$('.innersidebar>span>button[rel=btn]').click(function(){
if($('.innersidebar>span>button[rel=btn]').hasClass('ud1btn'))
{
$('.innersidebar>span>button[rel=btn]').removeClass('ud1btn');
}
$(this).addClass('ud1btn');
});
</script>

<!-- 	Core Function For Sending The message	 -->
<script type='text/javascript'>
function keyp(e,yoo,name){ 
var frmk =$('form#paneform[rel='+yoo+']');
//alert(name);
window.loadgifspan(yoo);
if(e.keyCode==13 && !e.shiftKey)
	{
$.ajax({
		type: frmk.attr('method'),
		url: frmk.attr('action'),
		data: frmk.serialize(),
	success: function (data) {
$('#paneloader').html(data);
$('textarea#lolwrite.panewriter[rel='+yoo+']').innerHTML="";
	window.cleargifspan(yoo,name);
		}
	});
e.preventDefault();
	}
//window.setTimeout("'cleargifspan("+yoo+","+name+")'",1000);
}
</script>

<!--	Function for Changing the click behaviour of user-button	-->
<script>
$('button.fieldavailableusers[rel=clic]').click(function(){
if($('button.fieldavailableusers[rel=clic]').hasClass('fieldavailableusersactive'))
{
$('button.fieldavailableusers[rel=clic]').removeClass('fieldavailableusersactive');
}
$(this).addClass('fieldavailableusersactive');
});
</script>

<!--		Function for Animating gif in Smallmodal-Msg Box		-->
<script>
var flag=0;
function user_button(idij,idname){ 
	$("textarea#lolwrite").hide();
	//alert(idname);
loadgifspan(idij);
$.get('leftpanemsg.php?view='+idij,function(datalol){
$('#paneloader').html(datalol);
window.cleargifspan(idij,idnmae);
});
	if(flag!=idij){
	//$('button#'+'idij').buildaToolTip();
	$("textarea#lolwrite[rel="+ idij+"]").show();
flag= idij;}
	else{
	//$('button#'+'idij').removeaToolTip();
	$("textarea#lolwrite[rel="+ idij+"]").hide();
flag= 0;
	}
window.tickload(idij);
}
</script>

<!--		Function for changing the Sent-tick icon		-->
<script type='text/javascript'>
 var idcache=0;
function leftmsgload(iduser2){
//alert(iduser2);
$.get('leftpanemsg.php?read=1&view='+iduser2,function(datapush){
$('div#paneloader[rel='+iduser2+']').html(datapush);
});
}


function leftmsgcheck(iduser1){

$.get('msgreadcheck.php?view='+ iduser1,function(datali){
  if(datali!=idcache){
   window.setTimeout('leftmsgload("'+iduser1+'")',50);
	idcache=datali;
	}
});

}
function tickload(iduser){
//Array.prototype.slice.call( document.querySelectorAll( 'div#leftpanemsgdiv' ) ).forEach( function( el, i ){
//var animid = el.getAttribute( 'class' ),
//idclass = document.querySelector( 'div#leftpanemsgdiv.' + animid );

window.setInterval('leftmsgcheck("'+iduser+'")',500);
window.setInterval(function(){
/* Read Request */
$.get('msgreadcheck.php?status='+ iduser,function(datasi){
  if(datasi==1){
   window.setTimeout('leftmsgload("'+iduser+'")',50);
	}
});
},500);
}
</script>