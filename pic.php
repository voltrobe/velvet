<?php
error_reporting(E_ALL & ~E_NOTICE);
//			Random image Function
//$directory='/';
function random_image($dir){
$directory="{$_SERVER['DOCUMENT_ROOT']}/novademo-localhost/$dir";

$leading  = substr($directory,0,1);
$trailing = substr($directory,-1,1);

if($leading=='/')
$directory=substr($directory,1);

if($trailing!='/')
$directory = $directory.'/';
if(empty($directory) or !is_dir($directory))
{
die('Directory :"'.$directory.'" ,Not Found...Sorry !!');
}
$files=scandir($directory,1);
$make_array = array();
foreach($files as $id => $files)
{
$info  =pathinfo($directory.$file);
$image_extensions = array('jpg','jpeg','png','gif','ico');
if(!in_array($info['extension'],$image_extensions))
	unset($file);
else
	{
	$file=str_replace(' ','%20',$file);
	$temp=array($id=>$file);
	array_push($make_array,$temp);
	}
}
if(sizeof($make_array)==0)
{
die('No images in, "'.$directory.'" ,Directory');
}
$total = count($make_array)-1;
$random_image=rand(0,$total);
return $directory;
$make_array[$random_image][$random_image];
}
echo"<img src=".random_image('')."/>";
?>