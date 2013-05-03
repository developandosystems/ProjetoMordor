$(document).ready(function(){$('.topo').fadeIn(0, function(){});$(".linha").hover(function(){$(this).children('ul').addClass('expanded');$('.expanded').fadeIn('fast', function() {});});$("#conteudo").hover(function(){$('.expanded').fadeOut('slow',function(){});$('.expanded').removeClass('expanded');});$(".expanded").mouseout(function(){$('.expanded').fadeOut('slow',function(){});$('.expanded').removeClass('expanded');}); });
$("#container_mas div:not(jobBox)").live({
	mouseenter:
	   function() {
			//var altura = $(this).find('img').height();
			//$(this).find("a span.details").css({'height':altura,'top':-altura/40});
			$(this).find("a span.details").fadeIn(100);	
	   },
	mouseleave:
	   function() {
			$(this).find("a span.details").fadeOut(100);
	   }
});
