var i=0;
var msgchk=0;
var leng=0;
var msgdiv = document.getElementById('postmsg');
function loadload(){

}

function msgnotifyload(numsnew){
for(i=0;i<numsnew;i++)
 $.get('msgnotify.php?refresh=1',function(data){
var splitdata=data.split("|");
if(splitdata[2])
 window.loadanim(splitdata[0],splitdata[1],splitdata[2],splitdata[3]);
 });
}
function msgchkfn()
{
 $.get('msgcheck.php',function(data){
 if(msgchk!=data)
 {
 var splitd=data.split("|");
 if(splitd[0]>leng){
 window.setTimeout('msgnotifyload('+splitd[0]+')',50);
 }
window.setTimeout('loadload()',1000);
 msgchk=data;
 }
 });
}

function clearanim(){
$('.notify').animate({'margin-top':'-200px'},1000);
clearTimeout();
}
function loadanim(user,pic,time,msg){

$('body').append('<div class="notify"><button id="btnclose" class="ud3btn">X</button><b class="ud1btn">'+user+'</b><fieldset class="txtshw">'+msg+'</fieldset><small class="ud3btn">'+time+'</small><img src="'+pic+'"/></div>');

$('.notify').fadeIn('slow').animate({'margin-top':'150px'},1500);
window.setTimeout('clearanim()',5000);

$('.notify>button#btnclose').click(function(){
window.clearTimeout();
window.setTimeout('clearanim()',0);
//window.clearTimeout();
});
}


/*
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
*/