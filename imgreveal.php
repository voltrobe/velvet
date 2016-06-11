<?php
require_once('file_links.php');
//$dir="{$_SERVER['DOCUMENT_ROOT']}/novademo-localhost/";
/* 
$odir=opendir($dir);
$imgtype=array("image/JPEG","image/PNG","image/JPG","image/GIF");
$flist =scandir($dir);
// $size=sizeof($flist);
$txt="";
foreach($flist as $file){
if(!is_dir($file))
//foreach ($imgtype as $img)
// if(filetype($file)=="image/PNG"){
$txt.="<img src='".$file."'/><br/>";
echo ($txt);
}

while($file=readdir($odir)){
foreach ($imgtype as $img)
if(filetype($file)==$img){
echo $file;
}} */
$ltop="top:0px;left:0px;";
$ltop1="top:10px;left:10px;";
$hw="width:450px;height:300px;";
/* echo "<table><tr>";
foreach(glob("pics/sharepix/sgdtavor/*.{jpg,JPG,JPEG,jpeg,gif,GIF,png,PNG}",GLOB_BRACE) as $images)
echo "<td><div  style='border:thick ridge;$hw;z-index:1;position:relative;'><img width='450px' src='".$images."'  style='position:absolute;z-index:0;$ltop'/></div><div style='border:thick ridge;$hw;$ltop1;position:absolute;z-index:100;'></div></td>";
echo "</tr></table><br/>"; */
echo"
<div id='sharebox' style='width:70%;'>
<div id='page'>
			<ul id='slider'>";
foreach(glob("pics/sharepix/naveen/*.{jpg,JPG,JPEG,jpeg,gif,GIF,png,PNG}",GLOB_BRACE) as $images)
echo"<li><img src='".$images."' style='width:600px;' alt='' /></li>";
echo"</ul>
</div>
</div>";
?>