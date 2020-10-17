$( document ).ready(function() {
	$('.post form').submit(function(){
		var title , content , excerpt;
		title    = $(".post form input[name = 'title']").val();
		content  = $(".post form textarea").val();
		excerpt  = $(".post form input[name = 'excerpt']").val();

		if (title.length < 100 || title.length > 100) {
			$('.post form div.errtitle').fadeIn(500);
			return false;
		}else{
			$('.post form div.errtitle').fadeOut(500);
		}


		if (content.length < 500 || content.length > 10000) {
			$('.post form div.errcontent').fadeIn(500);
			return false;
		}else{
			$('.post form div.errcontent').fadeOut(500);
		}


		if (excerpt.length !== 0) {
			if (excerpt.length < 100 || excerpt.length > 500) {
				$('.post form div.errexcerpt').fadeIn(500);
				return false;
			}else{
				$('.post form div.errexcerpt').fadeOut(500);
			}
		}

		return true;
	})
 
});
/*
 
 errcontent
 errexcerpt
*/