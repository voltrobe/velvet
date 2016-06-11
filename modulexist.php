<?php

echo "<!DOCTYPE><html> ";

echo <<<_END
  <head>
  <meta charset="utf-8">
	<title>jQuery UI Dialog - Modal form</title>
	<link rel="stylesheet" href="styles/themes/base/jquery.ui.all.css"/>
	<link rel="stylesheet" href="css/logform.css"/>
	
	<script src="styles/jquery-1.8.2.js"></script>
	<script src="js/modalquery.js"></script>
	
	<script src="styles/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="styles/ui/jquery.ui.core.js"></script>
	<script src="styles/ui/jquery.ui.widget.js"></script>
	<script src="styles/ui/jquery.ui.mouse.js"></script>
	<script src="styles/ui/jquery.ui.button.js"></script>
	<script src="styles/ui/jquery.ui.draggable.js"></script>
	<script src="styles/ui/jquery.ui.position.js"></script>
	<script src="styles/ui/jquery.ui.resizable.js"></script>
	<script src="styles/ui/jquery.ui.dialog.js"></script>
	<script src="styles/ui/jquery.ui.effect.js"></script>
	<link rel="stylesheet" href="styles/demos.css">
	<style>
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
	</style>
	
	
	<link rel="stylesheet" media="screen" href='css/avgrundmodal.css'/>
		<link rel="stylesheet" media="screen" href='css/avgrund.css'/>

	<link rel="stylesheet" media="screen" href='css/forkit.css'/>
		<link rel="stylesheet" media="screen" href='css/forkitdemo.css'/>
	<link rel="stylesheet" media="screen" href='css/Menyslide.css'/>
	
	<script>
			function openDialog() {
				Avgrund.show( '#default-popup' );
			}
			function closeDialog() {
				Avgrund.hide();
			}
		</script>
		

_END;

echo "</head>";
if (function_exists("array_combine"))
{
echo "Function exists";
}
else
{
echo "Function does not exist - better write our own";
}


echo <<<_END
<body>

<div class="meny">
			<h2>More Experiments</h2>
			<ul>
				<li><a href="http://lab.hakim.se/avgrund/">Avgrund</a></li>
				<li><a href="http://lab.hakim.se/radar/">Radar</a></li>
				<li><a href="http://lab.hakim.se/forkit-js/">forkit.js</a></li>
				<li><a href="http://lab.hakim.se/scroll-effects/">stroll.js</a></li>
				<li><a href="http://lab.hakim.se/zoom-js">zoom.js</a></li>
				<li><a href="http://lab.hakim.se/reveal-js">reveal.js</a></li>
				<li><a href="http://itunes.apple.com/us/app/sinuous/id543097218">Sinuous for iOS</a></li>
				<li><a href="http://hakim.se/experiments/css/domtree/">DOM Tree</a></li>
				<li><a href="http://hakim.se/experiments/css/holobox/">Holobox</a></li>
				<li><a href="http://hakim.se/experiments/html5/404/netmag.html">404</a></li>
			</ul>
		</div>
	<aside id='default-popup' class='avgrund-popup'>
			<h2>That's all, folks</h2>
			<p>
				You can hit ESC or click outside to close the modal. Give it a go to see the reverse transition.
			</p>
			<p>
				If you like this you would probably enjoy <a href='http://lab.hakim.se/meny'>Meny</a>, <a href='http://lab.hakim.se/reveal-js'>reveal.js</a> and <a href='http://lab.hakim.se/scroll-effects'>stroll.js</a>.
			</p>
			<button class='avgbutton' onclick='javascript:closeDialog();'>Close</button>
		</aside> 	
		

<div class="contents">
<div class='avgrund-contents'>
<div id="dialog-form" title="Create new user">
	<p class="validateTips">All form fields are required.</p>

	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>


<div id="users-contain" class="ui-widget">
	<h1>Existing Users:</h1>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>John Doe</td>
				<td>john.doe@example.com</td>
				<td>johndoe1</td>
			</tr>
		</tbody>
	</table>
</div>
<button id="create-user">Create new user</button>

<div class="demo-description">
<p>Use a modal dialog to require that the user enter data during a multi-step process.  Embed form markup in the content area, set the <code>modal</code> option to true, and specify primary and secondary user actions with the <code>buttons</code> option.</p>
</div>







		
		
			<h1>Avgrund</h1>
			<p>
				A modal concept which aims to give a sense of depth between the page and modal layers. Click the button below to give it a try.
			</p>
			<button class='avgbutton' onclick='javascript:openDialog();'>Open Avgrund</button>
			<p>
				Uses CSS transforms to scale components and CSS filters to blur the page. Built for the fun of 
				it, not intended for any practical use.
			</p>
			<p>
				<em>Avgrund</em> is Swedish for abyss.
			</p>
			<small>
				Created by <a href='http://twitter.com/hakimel'>@hakimel</a> / <a href='http://hakim.se/'>http://hakim.se</a>
			</small>

			<div class='sharing'>
				<a href='http://twitter.com/share' class='twitter-share-button' data-text='Avgrund - a depth-based modal concept from @hakimel' data-url='http://lab.hakim.se/avgrund' data-count='small' data-related='hakimel'></a>
				
				<iframe id='facebook-button' src='http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Flab.hakim.se%2Favgrund%2F&layout=button_count&show_faces=false&width=83&action=like&font=arial&colorscheme=light&height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:85px; height:24px; position: relative; top: 4px;' allowTransparency='true'></iframe> 
			</div>
	

		<div class='avgrund-cover'></div>

		<script type='text/javascript' src='js/avgrund.js'></script>

		
		
		

		<div class="meny-arrow"></div>

		
			<article>
				<h1>Meny</h1>
				<p>
					A three dimensional and space efficient menu.
				</p>
				<p>
					Move your mouse towards the arrow &mdash; or swipe in from the arrow if you're on a touch device &mdash; to open.
					Test it with any page by appending a URL, like so: <a href="http://lab.hakim.se/meny/?u=http://hakim.se">lab.hakim.se/meny/?u=http://hakim.se.</a> 
				</p>
				<p>
					Meny can be positioned on any side of the screen: <br>
					 <a href="http://lab.hakim.se/meny/?p=top">top</a> 
					 - <a href="http://lab.hakim.se/meny/?p=right">right</a> 
					 - <a href="http://lab.hakim.se/meny/?p=bottom">bottom</a>
					 - <a href="http://lab.hakim.se/meny/?p=left">left</a> 
				</p>
				<p>
					Instructions and download at <a href="http://github.com/hakimel/meny">github.com/hakimel/meny</a>.
				</p>
				<p>
					The name, <em>Meny</em>, is swedish.
				</p>
				<small>
					Created by <a href="http://twitter.com/hakimel">@hakimel</a> / <a href="http://hakim.se/">http://hakim.se</a>
				</small>
			</article>

			<div class="sharing">
				<a href="http://twitter.com/share" class="twitter-share-button" data-text="Meny - a three dimensional and space efficient menu concept by @hakimel" data-url="http://lab.hakim.se/meny" data-count="small" data-related="hakimel"></a>
				
				<iframe id="facebook-button" src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Flab.hakim.se%2Fmeny%2F&layout=button_count&show_faces=false&width=83&action=like&font=arial&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:85px; height:24px; position: relative; top: 4px;" allowTransparency="true"></iframe> 
			</div>

			<a href="https://github.com/hakimel/meny"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/camo.github.com/e6bef7a091f5f3138b8cd40bc3e114258dd68ddf/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub"></a>
		

		<script src="js/meny.min.js"></script>
		<script>
			// Create an instance of Meny
			var meny = Meny.create({
				// The element that will be animated in from off screen
				menuElement: document.querySelector( '.meny' ),

				// The contents that gets pushed aside while Meny is active
				contentsElement: document.querySelector( '.contents' ),

				// [optional] The alignment of the menu (top/right/bottom/left)
				position: Meny.getQuery().p || 'left',

				// [optional] The height of the menu (when using top/bottom position)
				height: 200,

				// [optional] The width of the menu (when using left/right position)
				width: 260,

				// [optional] Distance from mouse (in pixels) when menu should open
				threshold: 40
			});

			// API Methods:
			// meny.open();
			// meny.close();
			// meny.isOpen();
			
			// Events:
			// meny.addEventListener( 'open', function(){ console.log( 'open' ); } );
			// meny.addEventListener( 'close', function(){ console.log( 'close' ); } );

			// Embed an iframe if a URL is passed in
			if( Meny.getQuery().u && Meny.getQuery().u.match( /^http/gi ) ) {
				var contents = document.querySelector( '.contents' );
				contents.style.padding = '0px';
				contents.innerHTML = '<div class="cover"></div><iframe src="'+ Meny.getQuery().u +'" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
			}
		</script>

		<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

		<div class="forkit-curtain">
			<div class="close-button"></div>
			
			<section class="container">
    <div class="logform">
      <h1>Login to Web App</h1>
      <form method="post" action="index.html">
        <p><input type="text" name="login" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="logform-help">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>
  </section>
			
		</div>
		
		
		<a class="forkit" data-text="Top Secret" data-text-detached="Drag down >" href="https://github.com/hakimel/forkit.js"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/camo.github.com/e6bef7a091f5f3138b8cd40bc3e114258dd68ddf/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub"></a>

		<script src="js/forkit.js"></script>
		
		</div>
</div>
</body></html>
_END;
?>