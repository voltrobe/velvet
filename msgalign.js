
function loadTArea(ids) {
for (var i = 0; i < ids.length; i++) {
var text = document.getElementById(ids[i]);

function resize(el) {
el.style.height = 'auto';
el.style.height = text.scrollHeight + 'px';
}
resize(text);
}
}
$('.notifyland').append('<div class="notify"><button class="ud3btn">X</button><fieldset class="field">'+ msg +'</fieldset><b class="ud1btn">'+user+'</b><img src="'+pic+'" /></div>');