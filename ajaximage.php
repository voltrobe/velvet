<?php
include_once('online.php');
echo"
<style>
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}
</style>";

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
//				PROFILE IMAGE				//

if (isset($_FILES['image']['name']) || isset($_POST['image']))
{
$upload_dir = "pics/profile/".useronline($user);
$upld = $upload_dir."/thumbnail";
if(!is_dir($upld) || !is_dir($upload_dir))
{
mkdir($upload_dir,0777);
	mkdir($upld, 0777);
	chmod($upld, 0777);chmod($upload_dir,0777);
}
$saveto = $upload_dir."/$user.jpg" ;
$saveto_thumb = $upld."/$user"."_thumb.jpg";			//....._thumb
move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
//move_uploaded_file($_FILES['image']['tmp_name'], $saveto_thumb);
copy($saveto,$saveto_thumb);	//....._thumb
$typeok = TRUE;
switch($_FILES['image']['type'])
{
case "image/gif":
$src = imagecreatefromgif($saveto); 
$src_thumb = imagecreatefromgif($saveto_thumb); 
break;
case "image/jpeg": // Both regular and progressive jpegs
case "image/pjpeg":
case "image/jpg":
$src = imagecreatefromjpeg($saveto);
$src_thumb = imagecreatefromjpeg($saveto_thumb);
 break;
case "image/png":
case "image/x-png":
$src = imagecreatefrompng($saveto);
$src_thumb = imagecreatefrompng($saveto_thumb);
 break;
default: $typeok = FALSE;
echo "Invalid file format..";
 break;
}
if ($typeok)
{
list($w, $h) = getimagesize($saveto);
$max = 5000;
$tw = $w;
$th = $h;
if ($w > $h &&  $max < $w ) 
{
$th = $max / $w * $h;
$tw = $max;

	$th_thumb = $max_thumb / $w * $h;
	$tw_thumb = $max_thumb;

}
elseif ($h > $w && $max < $h )
{
$tw = $max / $h * $w;
$th = $max;

	$tw_thumb = $max_thumb / $h * $w;
	$th_thumb = $max_thumb;

}
elseif ($max < $w )
{
$tw = $th = $max;

	$tw_thumb = $th_thumb = $max_thumb;

}
		//...............for thumb nail....................//
		list($w, $h) = getimagesize($saveto_thumb);
$max_thumb = 250;			//..._thumb
$tw_thumb = $w;
$th_thumb = $h;
		if ($w > $h &&  $max_thumb < $w ) 
{
	$th_thumb = $max_thumb / $w * $h;
	$tw_thumb = $max_thumb;
}
elseif ($h > $w && $max_thumb < $h )
{
	$tw_thumb = $max_thumb / $h * $w;
	$th_thumb = $max_thumb;
}
elseif ($max_thumb < $w )
{
	$tw_thumb = $th_thumb = $max_thumb;
}
$tmp = imagecreatetruecolor($tw, $th);
$tmp_thumb = imagecreatetruecolor($tw_thumb, $th_thumb);		//...._thumb
imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
imagecopyresampled($tmp_thumb, $src_thumb, 0, 0, 0, 0, $tw_thumb, $th_thumb, $w, $h);//...._thumb
imageconvolution($tmp, array( // Sharpen image
array(-1, -1, -1),
array(-1, 16, -1),
array(-1, -1, -1)
), 8, 0);
imageconvolution($tmp_thumb, array(	// Sharpen image//............thumb
array(-1, -1, -1),
array(-1, 16, -1),
array(-1, -1, -1)
), 8, 0);
imagejpeg($tmp, $saveto);
imagejpeg($tmp_thumb, $saveto_thumb);		//....._thumb
imagedestroy($tmp);
imagedestroy($tmp_thumb);		//...._thumb
imagedestroy($src);
imagedestroy($src_thumb);		//......_thumb
//echo "<img src='pics/profile/$user/$user.jpg'  class='preview'>";
echo "Uploaded Successfully...!!";
}

}


//....... For Cover photo.../////////

elseif(isset($_FILES['cimage']['name']) || isset($_POST['cimage']))
{
$upload_dir = "pics/cover/".useronline($user);
if(!is_dir($upload_dir))
{
	mkdir($upload_dir, 0777);
	chmod($upload_dir, 0777);
}
$save2 = $upload_dir."/$user.jpg" ;
move_uploaded_file($_FILES['cimage']['tmp_name'], $save2);
$typeok = TRUE;
switch($_FILES['cimage']['type'])
{
case "image/gif":
$src1 = imagecreatefromgif($save2); break;
case "image/jpeg": // Both regular and progressive jpegs
case "image/pjpeg":
case "image/jpg":
$src1 = imagecreatefromjpeg($save2); break;
case "image/png":
case "image/x-png":
$src1 = imagecreatefrompng($save2); break;
default: $typeok = FALSE;
echo "Invalid file format..";
break;
}
if ($typeok)
{
list($cw, $ch) = getimagesize($save2);
$max1 = 50000;
$tw = $cw;
$th = $ch;
if ( $cw > $ch &&  $max1 < $cw)
{
$th = $max1 / $cw * $ch;
$tw = $max1;
}
elseif ( $ch > $cw && $max1 < $ch)
{
$tw = $max1 / $ch * $cw;
$th = $max1;
}
elseif ($max1 < $cw )
{
$tw = $th = $max1;
}
$tmp1 = imagecreatetruecolor($tw, $th);
imagecopyresampled($tmp1, $src1, 0, 0, 0, 0, $tw, $th, $cw, $ch);
imageconvolution($tmp1, array( // Sharpen image
array(-1, -1, -1),
array(-1, 16, -1),
array(-1, -1, -1)
), 8, 0);
imagejpeg($tmp1, $save2);
imagedestroy($tmp1);
imagedestroy($src1);
//echo "<img src='pics/cover/$user/$user.jpg'  class='preview'>";
echo "Uploaded Successfully...!!";
}
}
}
?>