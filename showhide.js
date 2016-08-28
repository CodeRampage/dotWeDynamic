$(document).ready(function() {
	/**
	setTimeout(popup, 2000);
	
	function popup{
		$("#first").css("display","inline-block");
	}
	**/
	
	$("#pass").click(function(){
		$("#second").css("display","block");
	});
	
	$("#sign").click(function(){
		$(this).parent().parent().hide();
	});
	
	/**Toogle Between Sign-in and Sign-up**/
	$("#signup").click(function() {
		$("#first").slideUp("slow",function(){
			$("#second").slideDown("slow");
		});
	});
	
	$("#signin").click(function(){
		$("#second").slideUp("slow", function() {
			$("#first").slideDown("slow");
		});
	});/**End Toggle Between sign-in and Sign-up**/
});