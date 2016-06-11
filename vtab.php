<?php
echo<<<_END
<style type="text/css">

        #vtab {
            margin: auto;
            width: auto;
            height: 100%;
        }
        #vtab > ul > li {
            width: 110px;
            height: 110px;
            background-color: #fff !important;
            list-style-type: none;
            display: block;
            text-align: center;
            margin: auto;
            padding-bottom: 10px;
            border: 1px solid #fff;
            position: relative;
            border-right: none;
            opacity: .3;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
            filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=30);
        }
        #vtab > ul > li.home {
            background: url('images/slick_image/hdpi/unselected/chat.png') no-repeat center center;
        }
		#vtab > ul > li.home.selected {
            background: url('images/slick_image/hdpi/chat.png') no-repeat center center;
        }
        #vtab > ul > li.login {
            background: url('images/slick_image/hdpi/unselected/administrator4.png') no-repeat center center;
        }
		#vtab > ul > li.login.selected {
            background: url('images/slick_image/hdpi/administrator4.png') no-repeat center center;
        }
        #vtab > ul > li.support {
            background: url('images/slick_image/hdpi/unselected/relationship8.png') no-repeat center center;
        }
		#vtab > ul > li.support.selected {
            background: url('images/slick_image/hdpi/relationship8.png') no-repeat center center;
        }
        #vtab > ul > li.selected {
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
            filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
            border: 1px solid #ddd;
            border-right: none;
            z-index: 10;
            background-color: #fafafa !important;
            position: relative;
        }
        #vtab > ul {
            float: left;
            width: 110px;
            text-align: left;
            display: block;
            margin: auto 0;
            padding: 0;
            position: relative;
            top: 30px;
        }
        #vtab > div {
            background-color: #fafafa;
            margin-left: 110px;
            border: 1px solid #ddd;
            min-height: 500px;
            padding: 12px;
            position: relative;
            z-index: 0;
            -moz-border-radius: 20px;
        }
        #vtab > div > h4 {
            color: #800;
            font-size: 1.2em;
            border-bottom: 1px dotted #800;
            padding-top: 5px;
            margin-top: 0;
        }
        #loginForm label {
            float: left;
            width: 100px;
            text-align: right;
            clear: left;
            margin-right: 15px;
        }
        #loginForm fieldset {
            border: none;
        }
        #loginForm fieldset > div {
            padding-top: 3px;
            padding-bottom: 3px;
        }
        #loginForm #login {
            margin-left: 115px;
        }
    </style>


_END;
echo<<<_END
<div id="vtab">
        <ul>
            <li class="home selected"></li>
            <li class="login"></li>
            <li class="support"></li>
        </ul>
        <div >
            <h4>Welcome To Your Profile!!</h4>
	
_END;
	require_once('formfillup.php');
echo<<<_END
	</div>
        <div >
            <h4>Secure Account Change Session</h4>
            <form id="loginForm" action="">
            <fieldset>
                <legend>You need to sign in with your Email & Password to continue.</legend>
                <div>
                    <label for="email">
                        Email:</label>
                    <input type="text" name="email" id="email" />
                </div>
                <div>
                    <label for="password">
                        Password:</label>
                    <input type="password" name="password" id="password" />
                </div>
                <div>
                    <input id="login" type="submit" value="Fake Login" />
                </div>
            </fieldset>
            </form>
        </div>
        <div >
            <h4>Online Support/Help</h4>
				
<section class="tabs">
	            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		        <label for="tab-1" class="tab-label-1">About</label>
		
	            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		        <label for="tab-2" class="tab-label-2">Services</label>
		
	            <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
		        <label for="tab-3" class="tab-label-3">Work</label>
			
	            <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
		        <label for="tab-4" class="tab-label-4">Contact</label>

		        <div class="content">
			        <div class="content-1">
						<h2>About us</h2>
                        <p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man.</p>
						<h3>How we work</h3>
						<p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
				    </div>
			        <div class="content-2">
						<h2>Services</h2>
                        <p>Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that's what you see at a toy store. And you must think you're in a toy store, because you're here shopping for an infant named Jeb.</p>
						<h3>Excellence</h3>
						<p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
				    </div>
			        <div id='tab3' class="content-3">
					
				    </div>
				    <div class="content-4">
						<h2>Contact</h2>
                        <p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic.</p>
						<h3>Get in touch</h3>
						<p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows. Some pilots get picked and become television programs. Some don't, become nothing. She starred in one of the ones that became nothing. </p>
						<input type='text'/>
				    </div>
		        </div><input type='text'/>
			</section>

        </div>
    </div>
<script>
var frm= $('#account');
</script>
<script>
function devil(){
$.ajax({
		type: 'GET',
	url: 'tab3.php',
	success: function (data) {
		document.getElementById('tab3').innerHTML=data;
		}
	});
}
	$('#tab-3').click(function(){
window.setTimeout('devil()',50);
});
</script>
    <script type="text/javascript">
        $(function() {
            var items = $('#vtab>ul>li');
            items.click(function() {
                items.removeClass('selected');
                $(this).addClass('selected');

                var index = items.index($(this));
                $('#vtab > div').hide().eq(index).show();
            }).eq(1).click();
        });
    </script>
_END;
?>