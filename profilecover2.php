<span id='cpics'>
<?php
//require_once'rnfunctions.php';
require_once'online.php';
if((file_exists("pics/cover/$user/$user.jpg" ) == null ) && (file_exists("pics/profile/$user/thumbnail/$user"."_thumb.jpg" ) == null ))
{
  echo "<br/><div align='left'  style='background-image:url(bg2.png) ;border:thick ridge rgba(78, 154, 163, 0.7);margin-right:40%;width:70%;height:370px;'";
  echo "<p><h2 style='margin-left:12%;margin-top:50px;color:white;font-family:segoe print;'>Upload Your's  & a Cover Photo To give a look to Your Profile ";
  echo "<br/>Access to Your <font id='refresh'><a class='button grey' href='rnprofile.php'>Profile Page</a></font> And Edit Your Info....!!</h2></p> ";
  echo " <img id='profilepic' src='pics/p-photo.png' alt='images/ajax-loader_2.gif'   style='margin-left:60%;margin-top:-20px;width:150px;height:145px;border:thin ridge;'/></div><br/>";
}
elseif((file_exists("pics/cover/$user/$user.jpg" ) == null ) || (file_exists("pics/profile/$user/thumbnail/$user"."_thumb.jpg" ) == null ))
{
 if (file_exists("pics/cover/$user/$user.jpg" ) == null )
 {
  echo "<br/><div align='left'  style='background-image:url(bg2.png)  ;border:thick ridge rgba(78, 154, 163, 0.7);margin-right:40%;width:70%;height:370px;'";
  echo "<p><h2 style='margin-left:12%;margin-top:50px;color:white;font-family:segoe print;'>Upload a Cover Photo To give a look to Your Profile ";
  echo " <br/>Access to Your <font id='refresh'><a class='button grey' href='rnprofile.php'>Profile Page</a></font> And Edit Your Info....!!</h2></p>";
  echo "<img id='profilepic' alt='images/ajax-loader_2.gif' src='pics/profile/$user/thumbnail/$user"."_thumb.jpg'"."   style='margin-left:60%;margin-top:-20px;width:150px;height:145px;border:thin ridge;'/> ";
  echo " </div><br/>";
 }
 elseif (file_exists("pics/profile/$user/thumbnail/$user"."_thumb.jpg" ) == null )
 {
  echo "<div align='left'  style='display:block;width:65%;min-width:300px;height:370px;'><img id='coverpic' align='left' alt='images/loading_gf.gif'  src='pics/cover/$user/$user.jpg'/>";
  echo " <img id='profilepic' src='pics/p-photo.png' alt='images/ajax-loader_2.gif'   style='margin-left:20%;margin-top:3px0px;width:150;height:145px;border:thin ridge;'/></div><br/><br/>";
 }
}
else
{
echo "<div align='left' style='display:block;min-width:300px;width:65%;' ><img id='coverpic' align='left' alt='images/loading-gif/loading2.gif'  src='pics/cover/$user/$user.jpg' />  ";
echo "<img id='profilepic' alt='images/loading-gif/round1.gif' src='pics/profile/$user/thumbnail/$user"."_thumb.jpg'"." align='left' /> ";
echo " </div><hr style='margin-top: 0.5px;margin-left:0px;width:75%;'/><br/> ";
}
?>
</span>