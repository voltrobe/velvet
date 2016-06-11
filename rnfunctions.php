<?php // rnfunctions.php
require_once('requirefn.php');

function showProfile($user)
{
//			COver and PROFILE IMAGE			//
echo"<div id='cpic'>";
require_once('profilecover.php');
echo"</div>";

//			Quote of the Day			//
echo"<fieldset id='quoteajax' class='outer' style='background-image:url(son.png);'>";
require_once('quote.php');
echo"</fieldset><br clear=right />";
}

//		function used by fomfillup.php to update quote.php
$quote_cover ="
function quote_ajax(){
	$.ajax({
		type: 'GET',
	url: 'quote.php',
	success: function (dataq) {
document.getElementById('quoteajax').innerHTML=dataq;
		}
	});
}";

//		function used by rnProfile.php to update profilecover.php
$pc_pic = "
$(function(){
	$.post('profilecover2.php',
function (datacp){
		$('#cpic').html(datacp);
		});
	})
	/*
	$('#cpic').load('profilecover2.php #cpics');
	*/
";
?>