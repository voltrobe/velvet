<?php // rnsetup.php
include_once 'rnfunctions.php';
echo '<h3>Setting up</h3>';
createTable('snmembers', 'user VARCHAR(25), pass VARCHAR(100), fname VARCHAR(20), lname VARCHAR(20), email VARCHAR(50), contact VARCHAR(15), country VARCHAR(25), city VARCHAR(25), gender VARCHAR(10), age INT, time INT UNSIGNED,
INDEX(user(10))');
createTable('rnmessages',
'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
auth VARCHAR(20), recip VARCHAR(20), pm CHAR(1),
time INT UNSIGNED, message VARCHAR(40096),
INDEX(auth(6)), INDEX(recip(6))');
createTable('rnwalls', 'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
auth VARCHAR(20) NOT NULL, recip VARCHAR(20) NOT NULL, pm CHAR(1), piclink VARCHAR(200) DEFAULT NULL, picthumb VARCHAR(200) DEFAULT NULL, vidlink VARCHAR(200) DEFAULT NULL, 
 status VARCHAR(40096), time INT UNSIGNED,
INDEX(auth(10)), INDEX(recip(10))');
createTable('rnfriends', 'user VARCHAR(16), friend VARCHAR(16),
INDEX(user(10)), INDEX(friend(10))');
createTable('rnprofiles', 'user VARCHAR(20), text VARCHAR(5000), psrd VARCHAR(100),
INDEX(user(10))');
?>