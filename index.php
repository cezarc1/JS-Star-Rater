<?php 
	include_once "rating.php";  
	session_start();
?> 
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title>Rating Test</title>
		<script src="jquery.min.js" type="text/javascript"></script>
		<link href="ratings.css" rel="stylesheet" type="text/css">
		<script src="rating.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="cont">
			<div id="pic" >
				<?php 
				/*
				Rating Stars !
				The only thing that should be set is the article_Id and potentially totStars
				depends on rating.php, submitRating.php, rating.js
				*/
				$articleId =  1; //this should be set when user loads page
				$totStars = 5; //total number of stars to print
				if(isset($_SESSION['votes']) && array_key_exists(''.$articleId, $_SESSION['votes'])) $avg = intval($_SESSION['votes'][$articleId]);
				else {
					$avg = avgRating($articleId);
					if(!$avg)//error checking
						$avg = 3.5; //fallback in case of db query error
				}
				$full_stars= floor($avg);
				$remainder = $avg-$full_stars;
				for($i = 0; $i < $totStars; $i++){
					$star = '<div id="star-cont">';
						$star .= '<div class="star-bg"></div>';
						$star .= '<div id="'.($i + 1).'" class="star';
						if($i >= $full_stars && !($remainder)){
							$star .= ' empty';
						}else if($i >= $full_stars){// If between .3 and .7 it will have a half star
							if( ($remainder < 0.7) && ($remainder > 0.3) ) $star .= ' half';
							else if($remainder <= .3) $star .= ' empty';
							$remainder =0;//reset. Only want to go through this if block once
						}
						$star .= '"></div>';
					$star .= '</div>';
					echo $star;
				}
				echo "<div itemprop='aggregateRating' itemscope='' itemtype='http://schema.org/AggregateRating'>
   					 	<span itemprop='ratingValue' style='visibility: hidden'>".$avg."</span></div>"; //inserting Schema.org tag code
				?>
			</div>
			<p id="log">
			<?php
				if(isset($_SESSION['votes']) && array_key_exists($articleId, $_SESSION['votes'])) echo "Thanks for voting!";
				else echo "Like this article? Rate it!";
			?>
			</p>
		</div>
		<script>rateStar(<?php echo $avg; ?>, <?php echo $articleId; ?>);</script>
	</body>
</html>