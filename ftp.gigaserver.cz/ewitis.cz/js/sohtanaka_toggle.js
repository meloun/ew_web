$(document).ready(function(){
	
	$(".toggle_container").hide();
 
	$("h2.trigger").toggle(function(){
		$(this).addClass("active"); 
		}, function () {
		$(this).removeClass("active");
	});
	
	$("h2.trigger").click(function(){
		$(this).next(".toggle_container").slideToggle("slow,");
	});
 
});