<?php include("../header.php"); ?>
<?php
$user="Tousif Sayyed";
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $user; ?></title>
<link rel="stylesheet" type="text/css" href="assets/styles/style.css" media="screen" />

<style type="text/css">
.style1 {
	font-size: 20px;
	color: #5593CA;
}
</style>

</head>
<body>
<span class="search">
<input type="search" placeholder="search.." style="height: 28px;width:240px;" ><input name="search" type="submit" value="Search" >
</span>
<div class="wrapper">
 
  <section id="about">
  	<h1 class="title"><?php echo $user; ?></h1><hr>
    <h10 class="style1">About Me</h10>
    <blockquote> Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus viverra nulla ut metus varius laoreet. Aenean vulputate eleifend tellus.</blockquote>
    <div class="row">
      <div class="nine columns"> 
      <a href="http://www.flickr.com/photos/dexxus/4158928239/" target="_blank"><img src="assets/images/lighthouse.jpg" class="image left" alt="" style="margin:5px 15px 0 0" /></a>
        <h4 style="margin:0 0 10px 0">Update Status</h4>
        <p><span class="dropcap">L</span>orem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum.</p>
        <h4>Lorem Ipsum</h4>
        <p> <span class="dropcap">S</span>emper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. <br />
        </p>
      </div>
      <div class="right">
        <h4>Skills</h4>
        <ul class="list checked">
          <li>HTML5 + CSS3</li>
          <li>JavaScript + jQuery</li>
          <li>php + MySQL</li>
          <li>Web Design</li>
          <li>Graphic Design</li>
          <li>SEO</li>
        </ul>
        <h4>Awards</h4>
        <ul class="list bestseller">
          <li>First Prize At Somewhere</li>
          <li>Best Entry At Somewhere</li>
          <li>Third Prize At Somewhere</li>
          <li>Second Prize At Somewhere</li>
          <li>Nice Entry At Somewhere</li>
        </ul>
      </div>
    </div>
    <br>
    <br>
    <div class="row">
      <div class="three columns"> 
      <a href="http://www.flickr.com/photos/ranopamas/1157510788" target="_blank"><img src="assets/images/versailles.jpg" width="210" class="image" alt="" ></a> 
      </div>
      <div class="three columns"> 
      <a href="http://www.flickr.com/photos/marcelgermain/3041101310/" target="_blank"><img src="assets/images/church.jpg" width="210" class="image" alt="" ></a> 
      </div>
      <div class="three columns"> 
      <a href="http://www.flickr.com/photos/cuellar/244449798/" target="_blank"><img src="assets/images/triomphe.jpg" width="210" class="image" alt="" ></a> 
      </div>
      <div class="three columns"> 
      <a href="http://www.flickr.com/photos/ecstaticist/3829762702/" target="_blank"><img src="assets/images/steel_town.jpg" width="210" class="image" alt="" ></a> 
      </div>
    </div>
    <hr>
  </section>
  
  <section id="gallery">
    <h10 class="style1">Gallery</h10>
    <ul class="gallery">
      <li>
        <h4>Title</h4>
        <a class="fancybox" href="assets/images/Elegant_Press.png"><img src="assets/images/Elegant_Press.png" alt="" width="250" /></a> </li>
      <li>
        <h4>Title</h4>
        <a class="fancybox" href="assets/images/Elegant_Press.png"><img src="assets/images/Elegant_Press.png" alt="" width="250" /></a> </li>
      <li>
        <h4>Title</h4>
        <a class="fancybox" href="assets/images/Elegant_Press.png"><img src="assets/images/Elegant_Press.png" alt="" width="250" /></a> </li>
      <li>
        <h4>Title</h4>
        <a class="fancybox" href="assets/images/Elegant_Press.png"><img src="assets/images/Elegant_Press.png" alt="" width="250" /></a> </li>
      <li>
        <h4>Title</h4>
        <a class="fancybox" href="assets/images/Elegant_Press.png"><img src="assets/images/Elegant_Press.png" alt="" width="250" /></a> </li>
      <li>
        <h4>Title</h4>
        <a class="fancybox" href="assets/images/Elegant_Press.png"><img src="assets/images/Elegant_Press.png" alt="" width="250" /></a> </li>
    </ul>
  </section>
  
<hr>
</div>
</body>
</html>