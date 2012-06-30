
<?php
/*
Requires a article id as a paramteter and returns the computed avereage of all of it's ratings
If there are no ratings present then fucntion will return 0
*/
function avgRating($a_id){
	$con = mysql_connect('localhost:888', 'root', 'root');
	if(!$con) echo "Couldn't Connect".mysql_error();
	mysql_select_db("mypod", $con);

	$ratings = "SELECT * FROM article_ratings WHERE article_id = '$a_id' ";
  	if($query = mysql_query($ratings)){
  		$numRows = mysql_num_rows($query);
		if($numRows ==0){
			return false; //If not ratings found then return 0 for avereage ;)
		}
		$tempArray = array();
		while($row = mysql_fetch_assoc($query))// adding DB query to a array
		{
			$tempArray[] =  $row['rating'];
		}
		$sum=0;
		for( $i = 0; $i < $numRows; $i++){ //Calculating cumulative sum
			$sum += $tempArray[$i];
		}
		$avg = $sum/$numRows;
		//echo "Average for article_id ".$a_id." is ".$avg; //For testing purposes only
		return $avg;
		
	}
	else return false;
}


?>