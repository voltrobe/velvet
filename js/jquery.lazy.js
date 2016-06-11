(function($,window,document,undefined)
{$.fn.lazy=function(settings)
{var configuration={bind:"load",threshold:2000,fallbackHeight:2000,visibleOnly:true,delay:-1,combined:false,attribute:"data-src",removeAttribute:true,effect:"show",effectTime:0,enableThrottle:false,throttle:250,beforeLoad:null,onLoad:null,afterLoad:null,onError:null}
if(settings)
$.extend(configuration,settings);var items=this;if(configuration.bind=="load")
$(window).load(_init);else if(configuration.bind=="event")
_init();if(configuration.onError)
items.bind("error",function(){configuration.onError($(this));});function lazyLoadImages(allImages)
{if(typeof allImages!="boolean")
allImages=false;items.each(function()
{var element=$(this);if(element.attr(configuration.attribute)&&element.attr(configuration.attribute)!=element.attr("src")&&!element.data("loaded")&&(element.is(":visible")||!configuration.visibleOnly))
{if(_isInLoadableArea(element)||allImages)
{if(configuration.afterLoad)
element.bind("load",function(){configuration.afterLoad(element);element.unbind("load");});if(configuration.beforeLoad)
configuration.beforeLoad(element);element.hide().attr("src",element.attr(configuration.attribute))[configuration.effect](configuration.effectTime);element.data("loaded",true);if(configuration.onLoad)
configuration.onLoad(element);if(configuration.removeAttribute)
element.removeAttr(configuration.attribute);}}});items=$(items).filter(function()
{return!$(this).data("loaded");});}
function _init()
{if(configuration.delay>=0)
setTimeout(function(){lazyLoadImages(true);},configuration.delay);if(configuration.delay<0||configuration.combined)
{lazyLoadImages();$(window).bind("scroll",_throttle(configuration.throttle,lazyLoadImages));$(window).bind("resize",_throttle(configuration.throttle,lazyLoadImages));}}
function _isInLoadableArea(element)
{var top=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop;if((top+_getActualHeight()+configuration.threshold)>(element.offset().top+element.height()))
{return true;}
return false;}
function _getActualHeight()
{if(window.innerHeight)
return window.innerHeight;if(document.documentElement&&document.documentElement.clientHeight)
return document.documentElement.clientHeight;if(document.body&&document.body.clientHeight)
return document.body.clientHeight;if(document.body&&document.body.offsetHeight)
return document.body.offsetHeight;return configuration.fallbackHeight;}
function _throttle(delay,call)
{var _timeout;var _exec=0;function callable()
{var elapsed=+new Date()-_exec;function run()
{_exec=+new Date();call.apply();};_timeout&&clearTimeout(_timeout);if(elapsed>delay||!configuration.enableThrottle)
run();else
_timeout=setTimeout(run,delay-elapsed);}
return callable;}
return this;}
$.fn.Lazy=$.fn.lazy;})(jQuery,window,document);