<?php
function getimages($dir){
$fulldir=$_SERVER['DOCUMENT_ROOT']."/$dir";
$images=array();
//			if directory is invalid
if(is_dir($fulldir)){
$dh=opendir($fulldir);
if($dh){
	while(($file=readdir($dh))!=false){
	if(preg_match("/[a-zA-Z0-9\_\.\-\s]+\.jpgbmpgifpng$/",$file)){
	echo"filename:$file: filetype:".filetype($file)."<br/>";
	$images[]=array("file"=>"$fulldir/","name"=>substr($file,0,-6),"type"=>substr($file,-3));
	}
}
}
else echo"Cannot open Directory..???";
closedir($dh);
return $images;
}
else echo"Directory doesn't Exists..!!!";
}
$myimages = getimages("novademo-localhost/images");
foreach($myimages as $img)
echo $img;
?>