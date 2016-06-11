$(document).ready(function() {

	var hash = window.location.hash.substr(1);
	//var href = $('#nav li a').each(function(){
	var href = $('#refresh a').each(function(){
		var href = $(this).attr('href');
		if(hash==href.substr(0,href.length-5)){
			var toLoad = hash+'.html #ajax-content';
			$('#ajax-content').load(toLoad)
		}
	});

//<span class='main'><ul  class='bokeh'><li></li><li></li><li></li><li></li></ul></span>

	 $('#refresh a').click(function(){ 
if(frm){
	$.ajax({
			type: frm.attr('method'),
			url: frm.attr('action'),
			data: frm.serialize(),
			success: function () {
		//alert('Congrats...Status Posted');
			}
		});
	}
		var gifload = '<span id="load"></span>';

		var toLoad = $(this).attr('href')+' #ajax-content';
		$('#ajax-content').fadeOut('slow',loadContent);
		//$('#ajax-content').slideOut(loadContent());
		$('#load').remove();
		$('#wrapper').append(gifload).append( jQuery.facybox({ 'span':'#load'}));
		$('#load').fadeIn('normal');
		window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-5);
		function loadContent() {
			$('#ajax-content').load(toLoad,'',showNewContent())
		}
		function showNewContent() {
			$('#ajax-content').show('slow',hideLoader());
		}
		function hideLoader() {
			$('#load').fadeOut('fast');
		jQuery(document).trigger('close.facybox');
		}
		return false;

	});

}); 