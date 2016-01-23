(function($){

	$divs = $('.box, .box-title, input, p');
	modal = false;

	$('a.maclass').click(function(e){
		e.preventDefault();
		e.stopPropagation();
		if (!modal) {
			modal = true;
			$divs.hide().velocity('transition.flipXIn', { duration: 1000, stagger: 100 });
			//$divs.hide().velocity('transition.bounceUpIn', { duration: 1000, stagger: 100 })
		}
	});

	$('a#forgot').click(function(e){
   // $('.box-overlay').click(function(e){
		e.preventDefault();
		if (modal) {
			modal = false;
		   // $divs.velocity('transition.flipXOut', { duration: 1000, stagger: 100, backwards: true })
			$divs.velocity('transition.bounceDownOut', { duration: 1000, stagger: 100, backwards: true });
		}
	});

	//   $('.box').click(function(e){
	//     e.stopPropagation();
	// })

	$('a#forgot').click(function(e){
	//$('.box').click(function(e){
		e.stopPropagation();
	});

})(jQuery);
