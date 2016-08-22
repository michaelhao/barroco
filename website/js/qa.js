$(function(){
	//----api要十題題目----
	var questions;
	$.post("http://localhost/fc/barroco/index.php/api/questions", function(data){
		questions = JSON.parse(data);
		console.log(questions);
		qaGame(questions);//開始快問快答
	});
	//----api要十題題目----
	var question=[
	  {
	    "description": "第二次世界大戰誰沒有參加",
	    "pic": "imgs/qa_pic1.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "瑞典",
	        "correct": true
	      },
	      {
	        "description": "日本",
	        "correct": false
	      },
	      {
	        "description": "中國",
	        "correct": false
	      },
	      {
	        "description": "俄國",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "妳知道《大員港市鳥瞰圖》是描繪現在的什麼地方嗎？",
	    "pic": "imgs/qa_pic2.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "桃園市大園區",
	        "correct": false
	      },
	      {
	        "description": "台南市安平區",
	        "correct": false
	      },
	      {
	        "description": "新北市淡水區",
	        "correct": true
	      },
	      {
	        "description": "彰化縣鹿港鎮",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "維梅爾向來喜歡描繪女性做為他的畫中主角，然而唯二的《天文學家》與《地理學家》是以他的男性好友-盧文霍克為創作對象，而你知道盧文霍克是一位？",
	    "pic": "imgs/qa_pic1.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "哲學家",
	        "correct": false
	      },
	      {
	        "description": "科學家",
	        "correct": true
	      },
	      {
	        "description": "文學家",
	        "correct": false
	      },
	      {
	        "description": "數學家",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "25歲的貝尼尼創作了《大衛》這件雕塑作品，他呈現的是大衛正在進行什麼動作呢？",
	    "pic": "imgs/qa_pic2.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "即將對巨人哥利亞攻擊的瞬間",
	        "correct": true
	      },
	      {
	        "description": "戰勝後踩著巨人哥利亞的頭顱",
	        "correct": false
	      },
	      {
	        "description": "正在舉起哥利亞的頭顱",
	        "correct": false
	      },
	      {
	        "description": "將武器放置肩上並注視著敵人的英姿",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "第二次世界大戰誰沒有參加",
	    "pic": "imgs/qa_pic1.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "瑞典",
	        "correct": true
	      },
	      {
	        "description": "日本",
	        "correct": false
	      },
	      {
	        "description": "中國",
	        "correct": false
	      },
	      {
	        "description": "俄國",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "妳知道《大員港市鳥瞰圖》是描繪現在的什麼地方嗎？",
	    "pic": "imgs/qa_pic2.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "桃園市大園區",
	        "correct": false
	      },
	      {
	        "description": "台南市安平區",
	        "correct": false
	      },
	      {
	        "description": "新北市淡水區",
	        "correct": true
	      },
	      {
	        "description": "彰化縣鹿港鎮",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "維梅爾向來喜歡描繪女性做為他的畫中主角，然而唯二的《天文學家》與《地理學家》是以他的男性好友-盧文霍克為創作對象，而你知道盧文霍克是一位？",
	    "pic": "imgs/qa_pic1.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "哲學家",
	        "correct": false
	      },
	      {
	        "description": "科學家",
	        "correct": true
	      },
	      {
	        "description": "文學家",
	        "correct": false
	      },
	      {
	        "description": "數學家",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "25歲的貝尼尼創作了《大衛》這件雕塑作品，他呈現的是大衛正在進行什麼動作呢？",
	    "pic": "imgs/qa_pic2.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "即將對巨人哥利亞攻擊的瞬間",
	        "correct": true
	      },
	      {
	        "description": "戰勝後踩著巨人哥利亞的頭顱",
	        "correct": false
	      },
	      {
	        "description": "正在舉起哥利亞的頭顱",
	        "correct": false
	      },
	      {
	        "description": "將武器放置肩上並注視著敵人的英姿",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "第二次世界大戰誰沒有參加",
	    "pic": "imgs/qa_pic1.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "瑞典",
	        "correct": true
	      },
	      {
	        "description": "日本",
	        "correct": false
	      },
	      {
	        "description": "中國",
	        "correct": false
	      },
	      {
	        "description": "俄國",
	        "correct": false
	      }
	    ]
	  },
	  {
	    "description": "妳知道《大員港市鳥瞰圖》是描繪現在的什麼地方嗎？",
	    "pic": "imgs/qa_pic2.jpg",
	    "score": 10,
	    "note" :"《聖馬太的啟示》(The Inspiration of St. Matthew），卡拉瓦喬 Michelangelo Merisi da Carvaggio 1602，油彩/畫布，292x186",
	    "options": [
	      {
	        "description": "桃園市大園區",
	        "correct": false
	      },
	      {
	        "description": "台南市安平區",
	        "correct": false
	      },
	      {
	        "description": "新北市淡水區",
	        "correct": true
	      },
	      {
	        "description": "彰化縣鹿港鎮",
	        "correct": false
	      }
	    ]
	  }
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

	$('#qaGame').before('<audio id="win"><source src="sounds/win.mp3"></source></audio><audio id="fail"><source src="sounds/fail.mp3"></source></audio>');
	var qaList=$('.qaList');//question list box
	var qaLength=9;//question length 0~9 total 10 list
	var userScore=0;
	var idNum=0;//in which one question, now
	var answerA=[];//all question's answera
	var answered=false;//button was clicked
	var gameTime=15;//Set the length of time
	var gameOver=false;
	var name=$.session.get("name");//從login.js接進來
	var school=$.session.get("school");
	// var time='105.08/22 15:02';

	function qaGame(data){
		$('#scoreList').hide();
		qaList.empty();
		//add question list
		for(var i=0;i<=qaLength;i++){
			qaList.append('<li id="q'+i+'">'+
					'<div class="qaQ">'+
						'<ul>'+
							'<li class="qaTxt"><div>'+data[i].description+'</div></li>'+
							'<li class="qaASelect">'+
								'<ul class="table">'+
									'<li><div class="qaA0"><a>'+data[i].options[0].description+'</a></div><div class="qaA1"><a>'+data[i].options[1].description+'</a></div></li>'+
									'<li><div class="qaA2"><a>'+data[i].options[2].description+'</a></div><div class="qaA3"><a>'+data[i].options[3].description+'</a></div></li>'+
								'</ul>'+
							'</li>'+
							'<li class="qaNote">'+data[i].note+
						'</ul>'+
					'</div>'+
					'<div class="qaPic"><img src="'+data[i].pic+'"></div>'+
				'</li>');
			$('#q'+i).css('opacity',0);

			//question text, select and pic size
			$('#q'+i+' .qaASelect div').height($('#q'+i+' .qaASelect div > a').height());
			if(data[i].description.length < 19){
				$('#q'+i+' .qaTxt').css('text-align','center');
			}else{
				$('#q'+i+' .qaTxt').css('text-align','justify');
			};

			//button event
			for(var ai=0;ai<=3;ai++){
				//get answer array
				if(data[i].options[ai].correct!=false){
					answerA.push(ai);
				};
				$('#q'+i+' .qaA'+ai+' a').click(function(){
					answered=true;
					var thisId=($(this).parent().attr('class'));//get this button class name ex:qaA0
					var answerNum='qaA'+answerA[idNum];//answer ex:qaA0
					console.log('btn id:'+thisId);
					console.log('answerNum:'+answerNum);
					clearTimeout(timeRoop);//timer stop
					if(thisId==answerNum){
						userScore+=10;
						$('#win')[0].play();
						console.log('userScore:'+userScore);
						nexQ($('#q'+idNum),answerNum,userScore);	
					}else{
						$('#fail')[0].play();
						nexQ($('#q'+idNum),answerNum,userScore);
						return false;
					};
				});				
			};	
		};	

		//switch pages event, qaId is question ilst id ex:$('#q0'), qaA is answer ex:qaA0
		function nexQ(qaId,qaA,score){
			qaId.find('a').off('click').css({background:'#ccc',cursor:'default'});//all button click off, change background to #ccc
			qaId.find('.'+qaA+' a').css({background:'#f00',fontSize:'40px',padding:'10px'});//just for answer style
			setTimeout(function(){
				if(idNum >= qaLength){
					// gameOver();
					idNum=qaLength;
					$('.winName').text(name);
 					$('.scoreNum').text(userScore);
					$.fancybox('#scoreBox',{
						'scrolling' : 'no',
						'titleShow' : false,
						'padding' : 0,
						'closeBtn':false,
						helpers : { 
					        overlay : {closeClick: false}
					    }
					});
				}else{
					qaId.hide();
					idNum++;
					timer(gameTime,idNum);	
				}
				$('#q'+idNum).show();
				$('#win')[0].pause();
				$('#fail')[0].pause();
				$('#win')[0].currentTime = 0;
				$('#fail')[0].currentTime = 0;
				answered=false;
				console.log('idNum:'+idNum);
			},3000);
		};

		//light box button
		$('.ScoreCloseBtn').click(function(){
			$.fancybox.close();
			idNum=0;
			gameOver();
		});
		$('.fancybox-close').click(function(){
			window.location.assign('select.html');
		});

		//timer events
		function timer(t,q){
			$('.timer').text(t);
			t--;
			timeRoop=setTimeout(function(){timer(t,q);},1000);
			if(t == -1){
				$('#fail')[0].play();
				var answerNum='qaA'+answerA[idNum];
				nexQ($('#q'+idNum),answerNum);
				clearTimeout(timeRoop);//timer stop
			};
			if(q > qaLength){
				clearTimeout(timeRoop);//timer stop
			};
		};
		
		//question images resize
		$('img').imagesLoaded().done( function() {
			for(var i=0;i<=$('.qaList li').length;i++){
				var qaPic=$('#q'+i+' .qaPic img');
				var qaPicBox=$('#q'+i+' .qaPic');
				if(qaPic.width()>qaPic.height()){
					qaPic.css({width:qaPicBox.width(),height:'auto'});
					qaPicBox.css('paddingTop',(qaPicBox.height()-qaPic.height())/2);
				}else{
					qaPic.css({height:qaPicBox.height(),width:'auto'});
					qaPicBox.css('padding',0);
				};
				$('#q'+i).hide().css('opacity',1);//hide all question		
			};
			$('#q0').show();//show first question
			timer(gameTime,idNum);//timer start
		});
		
		//game over show score list
		function gameOver(){
			//----遊戲結束，儲存分數----
			var score = {
				'type' : 11,
				'school' : school,
				'name' : name,
				'score' : userScore
			}
			$.post("http://localhost/fc/barroco/index.php/api/insert_score", score, function(data){
				console.log("儲存分數");
				//----api要前十排行榜----
				var scoreDatas;
				$.get("http://localhost/fc/barroco/index.php/api/rank?type=11", function(data2){
					scoreDatas = JSON.parse(data2);
					console.log(scoreDatas);
					scoreList(scoreDatas,name,school);
				});
				//----api要前十排行榜----
			});
			//----遊戲結束，儲存分數----
			
		};
		console.log(answerA);
	};

	//score events
	function scoreList(data,name,school){
 		//post data
 		var qaData={
 			'name':name,
 			'school':school,
 			'score':userScore,
 			// 'time':time
 		};
 		console.log(qaData);//要回傳rank的資料
 		$('#qaGame').hide();
		$('body').addClass('bg4');
		$('#scoreList').show();
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

	// qaGame(question);
});