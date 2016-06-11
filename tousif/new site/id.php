<?php
//creates a unique id w ith the 'about' prefix
$a = uniqid(about);
echo $a;
echo "<br>";
//creates a longer unique id w ith the 'about' prefix
$b = uniqid (about, true);
Echo $b;
echo "<br>";
//creates a unique ID w ith a random number as a prefix - more secure than a static prefix
$c = uniqid (rand (),true);
echo $c;
echo "<br>";
//this md5 encrypts the username from above, so its ready to be stored in your database
$md5c = md5($c);
echo $md5c;
?>
