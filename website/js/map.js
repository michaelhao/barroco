$(function(){
	var questions=[
	  {
	    'description': [
	    	{
	    		'appreciation':'這幅畫的構圖實在很不一樣！天使身上的紗巾與半跪在桌前書寫的聖馬太，形成S狀的螺旋型，讓畫面活潑起來，仔細一瞧，搖搖晃晃的椅凳，彷彿要跌出畫面了！',
	    		'question':'請找出這件作品的S狀的螺旋型構圖。',
	    		'answer':'你找到了嗎？從天使的紗巾、手勢，連接到馬太的頭和拱起的背、跪著的腳，形成彎曲的S形狀，這樣的構圖讓畫面具有強烈的動感，捕捉住稍縱即逝的瞬間。'
	    	}
	    ],
	    'pic': 'imgs/map_pic0.jpg',
	    'answerBtn':'<a class="mapA0"><img src="imgs/mapBtn1.png"></a>',
	    'note' :'《聖馬太的啟示》The Inspiration of St. Matthew<br/>Michelangelo Merisi da Caravaggio,1602,<br/>油彩畫布, 292 x 186 cm<br/>San Luigi dei Francesi, Rome, Italy',
	  },
	  {
	    'description': [
	    	{
	    		'appreciation':'15-17世紀間的大航海時代，地圖是商船在世界貿易往來的重要工具；地圖中密布的經緯線之外，還隱藏了四季以及12星座呢！',
	    		'question':'你能找到台灣在哪裡嗎？',
	    		'answer':'1624年荷蘭人佔據台灣成為東亞貿易的重要據點，在台南建立了「熱蘭遮城」（Zeelandia），也就是現在的「安平古堡」，讓台灣成為大航海時代世界經濟的一環。'
	    	}
	    ],
	    'pic': 'imgs/map_pic1.jpg',
	    'answerBtn':'<a class="mapA1"></a>',
	    'note' :'《世界地圖》 Nova Orbis Tabula in Lucem edita<br/>Frederick De Wit,1670-80, 銅版畫 水彩上色, 47.9 x 56.2 cm<br/>Bibliotheque royale de Belgique<br/>圖片來源│Wikimedia Commons',
	  },
	  {
	    'description': [
	    	{
	    		'appreciation':'畫中的年輕人專注地盯著正在幫他算命的老吉普賽人，完全沒注意到身旁的情形，讓人看了好著急。這件精采的畫作，讓很少署名的德拉圖爾在畫上留下了簽名。',
	    		'question':'快來幫助這位年輕人，找出哪雙手是小偷的手?',
	    		'answer':'你發現了嗎？週遭圍觀的婦人，相互以眼神示意，一人手割金鍊條，一人偷拿錢包，看似平靜的瞬間，卻隱藏著驚人之舉！'
	    	}
	    ],
	    'pic': 'imgs/map_pic2.jpg',
	    'answerBtn':'<a class="mapA2"></a>',
	    'note' :'《占卜者》Fortune Teller<br/>Georges de La Tour ,1633-35, 油彩畫布, 101.9x123.5 cm,<br/>The Metropolitan Museum of Art, New York',
	  },
	  {
	    'description': [
	    	{
	    		'appreciation':'這幅群像畫利用生動活潑的人物姿態，突破了17世紀原先的刻板風格，林布蘭透過光影與構圖的安排，引導著觀眾的視線焦點。',
	    		'question':'請找出畫面中光線的來源。',
	    		'answer':'從左上方投射的光線，有如聚光燈一般地照射在畫面中央，周遭圍繞著身穿黑衣的醫師們，使慘白的屍體上成為了畫面的焦點。'
	    	}
	    ],
	    'pic': 'imgs/map_pic3.jpg',
	    'answerBtn':'<a class="mapA3"></a>',
	    'note' :'《杜爾普醫生的解剖課》<br/>The Anatomy Lecture of Dr. Nicolaes Tulp<br/>Rembrandt van Rijn,1632,油彩畫布, 169.5 x 216.5 cm<br/>Mauritshuis Royal Picture Gallery, Hague, Netherlands',
	  },
	  {
	    'description': [
	    	{
	    		'appreciation':'在維梅爾的畫中，許多的細節與物件都具有象徵性的意義，仔細觀察這個室內景象，模特兒頭上戴著月桂葉花冠，手上拿了喇叭和書籍，這件極具象徵意涵的作品，值得我們細細品味。',
	    		'question':'請猜猜看，畫面中什麼物件最能代表，17世紀時的荷蘭是個航海貿易非常發達的國家？',
	    		'answer':'畫中的書、樂譜與面具，分別象徵詩、音樂與戲劇，背景牆上巧妙的安排著大幅的荷蘭地圖，這種種細節彷彿象徵著荷蘭在藝術、歷史、政治上的重要地位。'
	    	}
	    ],
	    'pic': 'imgs/map_pic4.jpg',
	    'answerBtn':'<a class="mapA4"></a>',
	    'note' :'《繪畫的藝術》The Art of Painting,<br/>Vermeer Johannes ,1665-1668,油彩,畫布,120x100cm<br/>Kunsthistorisches Museum, Vienna',
	  },
	  
	];
	var scoreData=[
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		},
		{
			'school':'甌八瑪',
			'name':'八瑪中學',
			'score':'80',
			'time':'105.08/22 15:02'
		}
	];

	var mapList=$('.mapList');//question list box
	var mapLength=4;//question length 0~9 total 10 list
	var userScore=0;
	var idNum=0;//in which one question, now
	var gameOver=false;
	var name='王小明';
	var school='中崙國中';
	var time='105.08/22 15:02';

	function mapGame(data){
		$('#scoreList').hide();
		mapList.empty();
		//add question list
		for(var i=0;i<=mapLength;i++){
			mapList.append('<li id="map'+i+'">'+
					'<ul class="mapTxt">'+
						'<li class="txt1">'+data[i].description[0].appreciation+'</li>'+
						'<li class="txt2">'+data[i].description[0].question+'</li>'+
						'<li class="txt3">'+data[i].description[0].answer+'</li>'+
					'</ul>'+
					'<div class="mapPic">'+
						'<div class="mapPicNote">'+data[i].note+'</div>'+
						'<div class="mapPic'+i+'">'+data[i].answerBtn+'<img src="'+data[i].pic+'"></div>'+
					'</div>'+
					'</li>');
			var mapId='#map'+i;
			$('.txt2,.txt3,.t2,.t3,.mapBtnBar li,.mapPic a').hide();
			$('.mapPic a').css('opacity',0)
			$('.mapPic img').css('cursor','default');
			$(mapId).hide();
			//answer button event
			$('.mapA'+i).click(function(){
				showAnswer();
				loop(1);
				userScore+=20;
				$('#win')[0].play();
				console.log('userScore:'+userScore);
				console.log('idNum:'+idNum);
			});
		};

		//question images resize
		$('img').imagesLoaded().done( function() {
			$('.mapChallengeBtn').show();
			// $(mapId,'.mapA'+i).css('opacity',1).hide();
			$('#map0').show();
			$('#map0 .txt1').show();
			$('#map0 .mapPicNote').css('left','-510px');
		});
		
		//main btn	
		$('.mapChallengeBtn').click(function(){
			$('.mapA'+idNum).show();
			$('.mapPic'+idNum+' img').css('cursor','pointer');
			$('#map'+idNum+' .txt1,.t1').hide();
			$('#map'+idNum+' .txt2,.t2').show();
			$(this).hide();
			$('.mapAnwserBtn').show();
			console.log('idNum:'+idNum);
		});
		$('.mapAnwserBtn').click(function(){
			$('#fail')[0].play();
			$(this).hide();
			showAnswer();
			loop(1);
			console.log('idNum:'+idNum);
		});
		$('.mapNextBtn').click(function(){
			showAnswer();
			loop(0);
			$('#win')[0].pause();
			$('#fail')[0].pause();
			$('#win')[0].currentTime = 0;
			$('#fail')[0].currentTime = 0;
			$('.mapA'+idNum).stop().hide();
			$('#map'+idNum).hide();
			$('#map'+idNum+' .txt3,.t3').hide();
			$('#map'+idNum+' .txt1,.t1').show();
			idNum++;
			$('#map'+idNum).show();
			$(this).hide();
			$('.mapChallengeBtn').show();
			
			console.log('idNum:'+idNum);
		});
		$('.mapScoreBtn').click(function(){
				$('#win')[0].pause();
				$('#fail')[0].pause();
				$('#win')[0].currentTime = 0;
				$('#fail')[0].currentTime = 0;
				scoreList(scoreData,name,school,userScore);
			});

		//show answer
		function loop(i){
			if(i==0){
				$('.mapA'+idNum).stop().css('opacity',0);
			}else{
				$('.mapA'+idNum).animate({opacity:1},1000,'easeOutQuad').animate({opacity:0},1000,'easeOutQuad',function(){loop();});
			}
		};
		function showAnswer(){
			if(idNum<4){
				$('.mapNextBtn').show();
			}else{
				$('.mapScoreBtn').show();
			};
			$('.mapA'+idNum).off('click');
			$('#map'+idNum+' .txt2,.t2').hide();
			$('#map'+idNum+' .txt3,.t3').show();
			$('.mapAnwserBtn').hide();
			$('.mapPic'+idNum+' img,.mapA'+idNum).css('cursor','default');
		};

		//game over show score list
		function gameOver(){
			scoreList(scoreData,name,school,userScore);
		};
	};

	//score events
	function scoreList(data,name,school,scoreNum){
 		//post data
 		var mapData={
 			'name':name,
 			'school':school,
 			'score':userScore,
 			'time':time
 		};
 		console.log(mapData);
 		$('#mapGame').hide();
		$('body').addClass('bg5');
		$('#scoreList').show();
 		$('.winName').text(name);
 		$('.scoreNum').text(scoreNum);
 		$.fancybox('#scoreBox',{
			'scrolling' : 'no',
			'titleShow' : false,
			'padding' : 0
		});
		$('.ScoreCloseBtn').click(function(){
			$.fancybox.close();
		});
		for(var i=0;i<=9;i++){
			$('#scoreList .table').append('<li>'+
					'<div><span>'+data[i].score+'</span></div>'+
					'<div><span>'+data[i].school+'</span></div>'+
					'<div><span>'+data[i].name+'</span></div>'+
					'<div><span>'+data[i].time+'</span></div>'+
				'</li>');
		};
	};

	//get user computer date
	function getScoreTime(){
		var fullDate = new Date();
 		var yearOfTaiwan = fullDate.getFullYear()-1911;
 		var twoDigitMonth = (fullDate.getMonth() > 10) ? (fullDate.getMonth()) : '0' + (fullDate.getMonth());
 		var twoDigitDate = (fullDate.getDate() > 10) ? (fullDate.getDate()) : '0' + (fullDate.getDate());
 		var twoDigitHours=(fullDate.getHours() > 10) ? (fullDate.getHours()) : '0' + (fullDate.getHours());
 		var twoDigitMinutes = (fullDate.getMinutes() > 10) ? (fullDate.getMinutes()) : '0' + (fullDate.getMinutes());
 		time = yearOfTaiwan+'.'+twoDigitMonth+'/'+twoDigitDate+' '+twoDigitHours+':'+twoDigitMinutes;
	};
	mapGame(questions);
});