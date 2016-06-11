<?php
require_once('listimage.php');
$images=getimages("novademo-localhost");
//		...Display on page...		//
foreach($images as $img){
/* echo"<img class=\"photo\" src=\"{$img['file']}\"{$img['size'][3]} alt=\"\">\n"; */
echo"<img class='photo' src='{$img['file']}{$img['size'][3]}' alt=''>\n";
}
$dirname="{$_SERVER['DOCUMENT_ROOT']}/novademo-localhost/";
$images=scandir($dirname);
foreach($images as $img){

if(!is_dir($img)){
//if(filetype($img) == 'png')
echo"<img src='$img'/>";

}}
?>