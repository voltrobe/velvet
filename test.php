<?php
require_once('rnheader.php');
echo"
<head>
<script >
$(document).ready(function() {
$('iframe').niceScroll({touchbehavior:true,cursoropacitymax:0.6,cursorwidth:8,usetransition:true,hwacceleration:true});
});
</script>
";
echo"
<style>
body{
	font-size:30px;
	font-family:'segoe print';
}
	.txtar{
height:60;
top:200px;
max-height:1000px;
overflow:hidden;
resize:none;
width:350px;
display:none;
}
.write{
	height:200px;
	position:fixed;
	left:700px;
	top:300px;
	resize:none;
	width:300px;
}
.div{
	top:200px;
	left:100px;
height:400px;
width:600px;
	position:absolute;
	z-index:1;
	border:groove;
background:url(sn.png);
-o-filter:blur(1px);
-moz-filter:blur(1px);
-webkit-filter:blur(1px);
-ms-filter:blur(1px);
filter:blur(1px);
}

.innerlt, .innerrt{
height:200px;
}
.innerlt{
	width:10%;
	float:left;
	z-index:999;
	overflow-y:scroll;
	position:absolute;
	background:url(sn.png);

}
.innerrt{
width:100%;
float:right;
z-index:50;
background:url(sonova2.png);
}
button{
	z-index:50000;
}
</style>";
echo"</head><body><div class='container'>";
		$row[5]="whats up guys...\n we hyhjdtjhthf<br/>rhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhrhtht rhthrhrthrt rwent to the staton at 5.  It was abondoned";
echo<<<_END
	<p align='$align'><strong><textarea class='txtar'  id='ar' >$row[5]</textarea></strong></p>
		<textarea class='write'  onkeypress="keyprs(['ar']);" ></textarea>
_END;
echo<<<_END
<div class="md-modal md-effect-16" id="modal-16">
			<div class="md-content">
				<h3>Modal Dialog</h3>
				<div>
					<p>This is a modal window. You can do the following things with it:</p>
					<ul>
						<li><strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.</li>
						<li><strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.</li>
						<li><strong>Close:</strong> click on the button below to close the modal.</li>
					</ul>
					<button class="md-close">Close me!</button>
				</div>
			</div>
		</div>
_END;
echo"
<button id='click'>Click Here</button>
<button class='md-trigger' data-modal='modal-16' id='mob'>Mobile</button>
<button id='site'>Site</button>
<iframe  style='overflow:none;' class='div'>

</iframe>

<div class='innerlt'>a
<div class='innerrt'></div>
</div>
<font class='fontdarkcarve'>Socialnova</font>";
$vol = "heloo|kolp|sielm|koil|pivo|fiulde";
$ecg = explode("|",$vol);
$fol=count($ecg);
for($i=0;$i< $fol;$i++)
echo "$ecg[$i]<br/>";
echo"<div class='notify'><button class='ud3btn'>X</button><fieldset class='txtshw'>hellooo ddgdrgdgrdggdgrdgrdgdgdgdgr<br/>rgrgrdgdgdgdgdgdrgrdgdrgdrg</fieldset><img src='pics/p-photo.png'/><b class='ud1btn'>sgdtavor</b></div>";

echo "<div class='md-overlay'></div>
</div></body>";
///					Js scripts				//
echo<<<_END
<script>
$(document).ready(function(){
//loadTArea(['ar']);
$('textarea').each(function(i,el){
$(el).height(el.scrollHeight);
});

$(".div").attr("src","http://localhost/tousif/");
});
</script>
<script>

 $('.write').focus(function(){
	$('.txtar').css('display','block');
});
$('.write').blur(function(){
$('.txtar').css('display','none');
});

function loadTArea(ids) {
for (var i = 0; i < ids.length; i++) {
var text = document.getElementById(ids[i]);

function resize(el) {
el.style.height = 'auto';
el.style.height = text.scrollHeight + 'px';
}
resize(text);
}
}
function keyprs(tid){
	var wr =$('.write').val();
	$('.txtar').html( wr) ;
	loadTArea(tid);
}
</script>
<script>
$('.innerlt').hover(function(){
	$(this).animate({'width':'200px'},500);
});
$('.innerrt, body').hover(function(){
$('.innerlt').animate({'width':'10px'},500);
});
</script>
<script>
function clear(){
$('.notify').animate({'margin-top':'-150px'},1000).fadeOut();
clearTimeout();
}
function loadanim(){
$('.notify').fadeIn('fast').animate({'margin-top':'100px'},1000);
}
$('#click').click(function(){
	window.loadanim();
	window.setTimeout('clear()',5000);
});
$('.notify>button').click(function(){

window.setTimeout('clear()',0);
});
</script>
<script>
$('#mob').click(function(){
$(".div").attr("src","http://localhost/tousif/mobile/");
});

$('#site').click(function(){
$(".div").attr("src","http://localhost/tousif/webcode/");
});
</script>

_END;
/* 
	
	// other available options for ajaxForm or ajaxSumbit: 
	//url:       url         // override for form's 'action' attribute 
	//beforeSubmit: ,		// performing an action before submitting ajax action
	//type:      type        // 'get' or 'post', override for form's 'method' attribute 
	//dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
	//clearForm: true        // clear all form fields after successful submit 
	//resetForm: true        // reset the form after successful submit 
	//success :				//carrying a task after successfull completion of an ajax action
	// $.ajax options can be used here too, for example: 
//timeout:   3000 */

/*
	
	//			for mousemove			//
	$(document).on('mousemove',function(e){
	$('#log').text('e.pageX:' +e.pageX+ 'e.pageY:' + e.pageY+)
	})
	
	//			.load()				//
	$('#result').load('URL' #rslt);
	url page should contain an element with an ID as rslt which will be appended in the give result ID
	
	//			$.ajaxStop			//
	$(document).ajaxStop(function(){
	$(#load).hide();
	});
 */
 
 
 /*
function loadTArea(ids) { 		// ids =12
for (var i = 0; i < ids.length; i++) {		//
var text = document.getElementById(ids[i]);

function resize(el) {
el.style.height = 'auto';
el.style.height = text.scrollHeight + 'px';
}
resize(text);
}}
*/
?>