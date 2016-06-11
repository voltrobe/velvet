<?php

$name = $_POST['name'];

$lab = $_POST['lab'];

$pgm = $_POST['pgm'];


//the data
$data = "\n$pgm\n";

//create a file
//$fileLocation = getenv("files") . "/$name.txt";
//$ourFileName = "$name.txt";
//$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");

//open the file and choose the mode
//$fh = fopen("$lab->$name", "a");

if($lab=='ada')
{ 
$loc="ada";
}
else $loc= "mp";

$fh = fopen($_SERVER['DOCUMENT_ROOT'] . "/files/$loc/$name.txt","a");
fwrite($fh, $data);

//close the file
fclose($fh);
if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/files/$loc/$name.txt"))
echo 1;
else
echo 2;

?>