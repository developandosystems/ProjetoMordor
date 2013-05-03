$(document).ready(function(){$('.topo').fadeIn(0, function(){});$(".linha").hover(function(){$(this).children('ul').addClass('expanded');$('.expanded').fadeIn('fast', function() {});});$("#conteudo").hover(function(){$('.expanded').fadeOut('slow',function(){});$('.expanded').removeClass('expanded');});$(".expanded").mouseout(function(){$('.expanded').fadeOut('slow',function(){});$('.expanded').removeClass('expanded');});});
$('.imgEstoque').hover(function(){
  /*$(this).animate({ 
        width: "99%",
        opacity: 1,
        marginLeft: "0.0in",
        fontSize: "1em", 
        borderWidth: "2px"
      }, 200 );*/
});
$('.imgEstoque').mouseout(function(){/*
  $(this).animate({ 
        width: "95%",
        opacity: 0.5,
        marginLeft: "0.0in",
        fontSize: "1em", 
        borderWidth: "1px"
      }, 100 );*/
});