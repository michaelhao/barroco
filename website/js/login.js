$(function(){
	var userName='';
	var userSchool='';
	var errorTxt='中英文合計20字內';
	$('#loginForm p').text(errorTxt);
	$('input').focus(function(){
		$(this).attr('autocomplete', 'off');
	});

	//call login Box
	$('a.loginBtn').fancybox({
		'scrolling' : 'no',
		'titleShow' : false,
		'padding' : 0,				
		'overlayShow': false,
		'hideOnOverlayClick': false,
		'beforeClose' : function() {
			$('#loginForm p').text(errorTxt);
			$('input[type="text"]').val('');
			setTimeout(function(){$('#loginForm').show();$('#loginError').hide();},600);
		}
	});
	$('#loginError').hide();
	$('#loginError button').click(function(){
		$.fancybox.close();
	});

	//check input value
	function inputCheck(elemet){
		//replace symbol 
		// $('#'+elemet).val($('#'+elemet).val().replace(/[^\a-\z\A-\Z0-9\u4E00-\u9FA5\u2e80-\u33ffh]/g,''));

		//check text length
		var thisLength=$('#'+elemet).val().length;
		if( thisLength < 1) {
			$('.'+elemet+'Box p').text('請輸入文字').show();
		}else{
			$('.'+elemet+'Box p').text(errorTxt).show;
		};	
	};

	$('#school').keyup(function(){
		inputCheck('school');
	});
	$('#name').keyup(function(){
		inputCheck('name');
	});
	$('#loginForm').bind("submit", function() {
		
		inputCheck('school');
		inputCheck('name');
		userName=$('#name').val();
		userSchool=$('#school').val();

		var schoolInput=$('#school').val().length;
		var nameInput=$('#name').val().length;
		if(schoolInput != 0 && nameInput != 0){
			//check error text
			var input={
				'school':userSchool,
				'name':userName
			};
			console.log(input);
			//----不雅字詞驗證----
			$.post('http://localhost/fc/barroco/index.php/api/inspect',input,function(data){
				// test array
				var inspect = JSON.parse(data);
				if(inspect.error){//error = false ：無不雅字詞
					console.log(inspect.message);
					$('#loginForm').hide();
					$('#loginError').show();
				}else{
					console.log(inspect.message);
					setTimeout(function(){window.location.assign("select.html");},100);
				}
				// var error=[true,false];
				// if(error[1]){//有不雅字詞->顯示錯誤訊息
				// 	$('#loginForm').hide();
				// 	$('#loginError').show();
				// }else{//無不雅字詞->開始遊戲
				// 	setTimeout(function(){window.location.assign("select.html");},100);
				// };
			});
			//----不雅字詞驗證----
		}

		/*var errorTxtArray=["/","?"];
		for(var i=0;i<=errorTxtArray.length;i++){
			if(errorTxtArray[i] !=""){
				if ($('input').val().indexOf(errorTxtArray[i])!=-1){
					console.log('請勿使用特殊符號 : '+ errorTxtArray[i]);
				};
			};
			return false;
		};*/
		return false;
	});
});