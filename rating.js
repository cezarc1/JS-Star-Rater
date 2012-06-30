function rateStar(curRating, article_id){
	var Stars = new Array(),
	starsLength = $('.star').length;
	var hasHalf =false;
	if($('.star').hasClass('half')) hasHalf=true;
	$('.star').each(function(){
		thisStar = $(this);
		Stars.push(thisStar);
		$(this).parent().mouseenter(function(e){//mouse enter on one of the stars
			var thisStar = $(this).children(".star");
			var curId= parseInt($(thisStar).attr('id')),
			j = i = curId;
			while(i--) Stars[i].attr("class","star");
			while(j < starsLength) Stars[(j++)].attr("class", "star empty" );
		}).mouseleave(function(e){//hande mouse leave events
			var thisStar = $(this).children(".star");
			var curId= parseInt($(thisStar).attr('id'));
			curRating = Math.ceil(curRating);
			if((curId - curRating ) < 0){//need to fill up stars up to curRating -1 the star hovered was less that the current rating
				while( curId < (curRating) ) Stars[curId++].attr("class","star");
			}
			
			else if( (curId-curRating) > 0 ){ //Current star is greater than the rating --fill down
				while(curId > (curRating ) ){
					curId--;
					Stars[curId].attr("class","star empty");
				}
			}
			curId--;
			if(hasHalf) Stars[curId].attr("class","star half");
			else Stars[curId].attr("class", "star");
		}).click(function(e){//handle click events
				var thisStar = $(this).children(".star");
				curRating = parseInt($(thisStar).attr('id'));
				var request = $.ajax({
					url: "submitRating.php",
					type: "POST",
					data: {article_id: article_id, curRating: curRating},
					dataType: "html",
					success: function(response) {
						hasHalf = false;
		    			$('#log').fadeTo(500, 0, function(){
		    				$(this).empty().append('Thanks for voting!').fadeTo(500, 1);
		    			});
		    			//alert(response);//FOR DEBUGGING ONLY; REMOVE ONCE LIVE
		    		}
			});
			request.fail(function(jqXHR, textStatus) {
				hasHalf = false
				$('#log').fadeTo(500, 0, function(){
		    			$(this).empty().append('Unfortunetly a error has occured while processing your request. This error has been logged: '+textStatus).fadeTo(500, 1); //It has not been logged but it would be nice?
				});
				
		    	});
			
			});

		});
	};






