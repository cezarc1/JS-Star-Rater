<?php
session_start();
$con = mysql_connect('localhost:888', 'root', 'root');
if(!$con) echo "Couldn't Connect".mysql_error();
mysql_select_db("articles", $con);//
$id = $_POST["article_id"];
$vote = $_POST["curRating"];
preg_replace('/[^0-9]/', '', $id); //input sanitazation
preg_replace('/[^0-5]/', '', $vote); //input sanitazation
$ratings = "INSERT INTO article_ratings (article_id, rating) VALUES ('$id', '$vote')";
if(! (isset($_SESSION['votes'])) )
	$_SESSION['votes'] = array(""); 

if(!(array_key_exists ("".$id, $_SESSION['votes'])) ){
	if(mysql_query($ratings)){
		echo "Sucess! rated article ".$id." with ".$vote." stars";
		$_SESSION['votes'][$id] =$vote;
	}
}
else echo "Didn't you already vote?";
?>