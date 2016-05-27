var hitEvent = 'ontouchstart' in document.documentElement ? 'touchstart' : 'click';
$(function() {
	var menuVisible = false, canClick=true;
	$('#menuBtn').on(hitEvent, function(evt) {
		evt.stopPropagation();
		
		if (menuVisible) {
			$(this).css({'transform':'rotate(0deg)'});
			$('#wrapper').css({'transform':'translate(0 0)'});
			menuVisible = false;
			return;
		}
		$(this).css({'transform':'rotate(90deg)'});
		$('#wrapper').css({'transform':'translate(250px)'});
		menuVisible = true;
	});
	$('body').on(hitEvent, function() {
		if (canClick&&menuVisible) {
			$('#menuBtn').css({'transform':'rotate(0deg)'});
			$('#wrapper').css({'transform':'translate(0)'});
			menuVisible = false;
			return;
		}
		canClick=true;
	});
	$('#leftNav').on(hitEvent, function() {
		canClick=false;
	});
	$('#header1').on(hitEvent, function() {
		canClick=false;
	});
	
	// fields of interest
	$('.fieldsOfInterest').each(function(){
		var _this = this, i = 0;
		$(this).find('td').eq(1).find('li li').each(function() {
			
			$(_this).find('td').eq(0).find('ul').eq(0).find('li li').eq(i).append('<div class="bgStretch" data-width="' + $(this).text() + '"></div>');
			i++;
		});
	});
	
	// stretch em up
	setTimeout(function() {
		$('.bgStretch').each(function() {
			$(this).css('width', $(this).attr('data-width') + "%");
		});
	}, 100);
});