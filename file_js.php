<?php
?>
<script src='js/jquery-1.8.2.min.js' type='text/javascript'></script>
<!--
<script  type='text/javascript' src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<script type='text/javascript' src='fbcss/top_bottom.js'></script> 
-->
<!--			Lazy||Unveil Images			-->
<!-- <script src="js/unveil.min.js"></script>  -->

<!--			Jquery used in VEbmate				-->
<script src="js/unveil.js"></script>
<script type='text/javascript' src='js/jquery.lazy.js'></script>
<script type="text/javascript">
		 function lazy(){
	$("img").unveil();
	}
</script>

			<!-- aToolTip js -->
<script type="text/javascript"src="js/jquery.atooltip.min.js"></script>

<script type="text/javascript">
/*			  Examples - FancYBox-Elastic			*/
	function fancyboxfn123(){
			$("a#example1").fancybox();
			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});
			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});
			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});
			$("a#example5").fancybox();
			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});
			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});
			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});
			$("a[rel=group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
/*
			Examples - various
*/
			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
			$("#various2").fancybox();
			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
		});

		$('a[rel*=facybox]').facybox({
		// noAutoload: true
		});
	}
$(document).ready(function($) {
$.ajaxSetup({ cache: true });
	 //				FacyBox Used For Login/Signup			//

$("h2",$("#changelog")).css("cursor","pointer").click(function(){
		$(this).next().slideToggle('fast');
	}).trigger("click");

//			For Lazy Load			//

	 window.setTimeout("lazy()",3000);

var j=1;
	while(j<12){
	window.setTimeout('loadjs'+j+'()',2000);
	++j;
	}
/*
$('div#postmsg ,#slidy').niceScroll({touchbehavior:false,cursoropacitymax:0.6,cursorwidth:8,usetransition:true,hwacceleration:true});
*/
}); // document.ready ends
</script>

<!--		Function for loading Jscript Asyncronously			-->
<script type="text/javascript">
//$.getScript('js/jquery-ui-1.9.0.custom.js',function(data1){console.log('data1');});
	function loadjs1(){ 
		$.getScript('js/jquery.validationEngine.js',function(data1){console.log('Validation ENgine');});
	}

	function loadjs2(){ $.getScript('js/jquery.validationEngine-en.js',function(data2){console.log('Validation-English');});}

	function loadjs3(){ $.getScript('js/ajax-pagination.js',function(data3){console.log('Ajax-pagination loaded');});}

	function loadjs3(){ $.getScript('js/facybox.js',function(data3){console.log('facyBOx  loaded');});}

	function loadjs4(){ $.getScript('fancybox/jquery.fancybox-1.3.2.js',function(data4){
	console.log('Fancybox Loaded');
	$.getScript('js/sexyfacybox.js',function(data5){
		console.log('Facybox-Light Loaded');
		window.setTimeout('fancyboxfn123()',1000);
		});
	});}

	function loadjs5(){ $.getScript('./fancybox/jquery.mousewheel-3.0.4.pack.js',function(data6){console.log('mousewheel-3 loaded');});}

	function loadjs6(){ $.getScript('./fancybox/jquery.easing-1.3.pack.js',function(data7){console.log('Jquery Easing');});}

	function loadjs7(){ $.getScript('js/modernizr.custom.28468.js',function(data8){console.log('Custom modernizr');});}

	function loadjs8(){ $.getScript('js/popbox.js',function(data9){
	console.log('Popbox Loaded');
	$('.popbox').popbox();
	});}

	function loadjs9(){ $.getScript('js/modernizr.custom.63321.loading.js',function(dataa){console.log('Loading Custom Modernizr');});}

	function loadjs10(){ $.getScript('js/jquery.form.js',function(datab){console.log('Form.Js Loaded');});}

	function loadjs11(){ $.getScript('js/sliding.form.js',function(datab){console.log('Sliding Form');});}
</script>
<!--
	<script>
		$(window).load(function() {
		    $('#footer').pinFooter();
		});
		$(window).resize(function() {
		$('#footer').pinFooter();
		});
	</script>
-->
