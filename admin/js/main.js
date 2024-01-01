
var $duration = 1000;
$(document).ready(function(){
	// - ACCOUNT DROPDOWN
	$('.ui.admindropdown').dropdown({
		transition: 'drop',
		on : 'click',
		duration  : 500		
	});
	$('.ui.moredropdown').dropdown({
		transition: 'fade down',
		duration  :300
	});

	// - SHOW & HIDE SIDEBAR
    $("#showmobiletabletsidebar").click(function(){
        $('.mobiletabletsidebar.animate .menu').transition({
		  	animation : 'swing right',
		    duration  : $duration
		  })
		;
		$('#mobiletabletsidebar').removeClass('hidden');
    });
    $("#hidemobiletabletsidebar").click(function(){
        $('.mobiletabletsidebar.animate .menu')
		  .transition({
		  	animation : 'fade',
		    duration  : $duration
		  });
    });
    $(".ui.accordion").accordion({
		exclusive: false
	});
});

