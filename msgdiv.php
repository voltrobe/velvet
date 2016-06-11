<?php
echo "<table ><tr align='left'><td width='70%' '>
<div id='xbtn' class='defb' style='margin-bottom:-2px;text-align:center;'>
	<div id='st-trigger-effects'><button data-effect='t-effect-2' id='slidebtn' class='ud1btn'>.</button></div>Message Feed<span align='right' id='currentuser'></span></div>

<div style='height:350px;overflow-y:scroll;min-width:300px;' align='left'>";

//				For Posting Msgs						//

echo "<div id='postmsg'>";
//echo"<span>";
require_once('messagepost.php');
echo"</div>";
//				For Posting Msgs						//
echo "</div></td> ";
echo <<<_END
<td width='20%'   align='left' >
<div  id='div-messagebox'  align='center'>

<form method='post' id='div-message' name='div_message' action='messagepost.php'>
<b class='defb'>
<span id='msggifinfo'>Compose Message: </span></b>
_END;

	echo"<div class='recipavail'>";
	for($i=0 ;$i<$numheader; $i++){
	$rowheader=mysql_fetch_row($resultheader);
	if($rowheader[1]==$user) continue;
	$userpicexists=(file_exists("pics/profile/$rowheader[1]/thumbnail/$rowheader[1]"."_thumb.jpg"))? "pics/profile/$rowheader[1]/thumbnail/$rowheader[1]"."_thumb.jpg" : "pics/p-photo.png";
	$nameabc=ucwords($rowheader[3]." ".$rowheader[4]);
	echo"<button class='fieldavailableusers' rel='clic' value='$nameabc' style='width:90%;' id='$rowheader[1]'>
	<img src='$userpicexists' align='left'/><small id='fieldvalue' >$rowheader[3] $rowheader[4]</small></button>";
	}
	echo"</div>";

echo<<<_END

<span id='textarea1' style='height:100px;' >
<textarea id='txtinput1' style='resize:none' placeholder=' U can Press Enter+Shift for NEW-LINE,While Writing!!' name='textarea' class='txtinput1' cols='27' rows='4'></textarea>
</span>

<br />
<small style='font-size:10px;' class='ud3btn'>Check it,To enable Newline <b style='font-size:10px;' class='ud1btn'><<input  type='checkbox'  id='chk'/>></b></small><span class='recipajaxname'>
<input type='hidden' id='recipajaxname' name='recipent' value='$msgsetrecent[0]'></input></span><span id='submitmsgspan'>
<input type='submit' class='button green' name='submitmsg' id='submitmsg' onclick="document.div_message.submitmsg.value = 'Sending.!!';" style='height:20px;width:30px;line-height:20px;display:none;' value='Send' /><span>
_END;

echo "</form>";
echo"</div>

</td></tr></table>";
?>