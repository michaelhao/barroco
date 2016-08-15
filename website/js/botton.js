$(function() {
  	$('body').before('<audio id="mySoundClip"><source src="sounds/button.mp3"></source></audio>');
	$('a,button,input[type="submit"]').click(function(){
		$('#mySoundClip')[0].play();
	});

	function hrefDelay(elemet,href){
		elemet.click(function(){
			setTimeout(function(){window.location.assign(href);},100);
		});
	}
	hrefDelay($('.logo a'),('login.html'));
	hrefDelay($('.selectQaBtn'),('qa_game.html'));
	hrefDelay($('.selectMapBtn'),('map_game.html'));
	hrefDelay($('.homeBtn'),('login.html'));
	hrefDelay($('.qaPlayagain'),('qa_game.html'));
});