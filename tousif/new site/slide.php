<script language="JavaScript">
<!--

/*
Random Image Script- By JavaScript Kit (http://www.javascriptkit.com) 
Over 400+ free JavaScripts here!
Keep this notice intact please
*/

function random_imglink(){
var myimages=new Array()
//specify random images below. You can have as many as you wish
myimages[1]="images/slider1.jpg"
myimages[2]="images/slider2.jpg"
myimages[3]="images/slider3.jpg"
myimages[4]="images/slider4.jpg"

var ry=Math.floor(Math.random()*myimages.length)
if (ry==0)
ry=1
document.write('<img src="'+myimages[ry]+'" alt="" width="495" height="329">')
}
random_imglink()
//-->
</script>

