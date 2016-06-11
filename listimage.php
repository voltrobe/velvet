<?php
$imagetypes=array("images/jpeg","images/png","images/jpg","images/x-png","images/gif");

function getimages($dir){
global $imagetypes;
//		array to hold return values;
$retval=array();
//		add trailing slashes if missing;
if(substr($dir, -1)!="/")
$dir.="/images/";
//		Full server path to dir
$fulldir ="{$_SERVER['DOCUMENT_ROOT']}/$dir";
// $fulldir ="localhost/novademo-localhost/images/";
$d=@dir($fulldir) or die("getimages: Failed opening directory {$_SERVER['DOCUMENT_ROOT']}/$dir for reading");
while(false!=($entry= $d->read())){
//		skip hidden files
	if($entry[0] == ".")
	continue;
//		check for image files
	$f=escapeshellarg("$fulldir"."$entry");
	$mimetype=trim(`file -bi $f`);
	foreach($imagetypes as $valid_type){
	if(preg_match("@^{$valid_type}@",$mimetype)){
	$retval[]=array('file' => "/$dir"."$entry", 'size' =>getimagesize("$fulldir"."$entry"));
	break;
	}}}
	$d->close();
return $retval;
}
?>