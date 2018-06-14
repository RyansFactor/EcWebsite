$(function(){
	$("ul.dropSub").hide();
	$("ul.drop li") .hover(function(){
		$("ul:not(:animated)", this).slideDown("slow");
	},
	function(){
		$("ul", this).slideUp("slow");
	});
});


//$(function(){
//	  $('.single-item').slick({
//	    accessibility: true,
//	    autoplay: true,
//	    autoplaySpeed: 1000,
//	    dots: true,
//	    fade: true,
//	  });
//	});