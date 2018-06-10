$(function(){
	$("ul.dropSub").hide();
	$("ul.drop li") .hover(function(){
		$("ul:not(:animated)", this).slideDown("fast");
	},
	function(){
		$("ul", this).slideUp("fast");
	});
});