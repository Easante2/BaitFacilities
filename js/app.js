$(document).ready(function(){
	setLinks();
	
});

function setLinks(){
	$("nav a").click(function(e){
		var sectionID = e.currentTarget.id + "Section";
		
		
		$("html body").animate({
			scrollTop: $("#" + sectionID).offset().top
		}, 1000)
	})
	
	
}