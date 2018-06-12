$(function(){
	$("ul.dropSub").hide();
	$("ul.drop li") .hover(function(){
		$("ul:not(:animated)", this).slideDown("slow");
	},
	function(){
		$("ul", this).slideUp("slow");
	});
});