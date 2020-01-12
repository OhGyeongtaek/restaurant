Array.prototype.max = function() {
   var max = 0;
   for(var i=0,finish=this.length;i<finish;i++) {
      max = max < Number(this[i]) ? Number(this[i]) : max;
   }
   return max;
};

jQuery.fn.values = function() {
   var values = [];
   for(var i=0, finish=this.length; i<finish;i++) {
      values[i] = this[i].value;
   }
   return values;
};

$(function(){
	
	if($('.left-right').length > 0){
		var slide_number = 1,
			animation = null;

		$('.left-right a').click(function(e){
			e.preventDefault();
			slide_number += $(this).attr('href') == 'left'? -1  : 1;
			if(slide_number < 1) slide_number = 3;
			else if(slide_number > 3) slide_number = 1;
			$('.slide-btn a:nth-of-type('+slide_number+')').click();
		});

		$('.slide-btn a').click(function(e){
			e.preventDefault();
			clearTimeout(animation);
			if(this.className === 'active') return false;

			$('.slide-btn .active').removeClass('active');
			$(this).addClass('active');

			var val = $(this).attr('href');
				slide_number = Number(val);

			$('.slide-box').attr('data-slide',val);

			animation = setTimeout(function(){				
				slide_number++
				if(slide_number > 3) slide_number = 1;
				$('.slide-btn a:nth-of-type('+slide_number+')').click();
			},3000);
		});


		animation = setTimeout(function(){
			slide_number++
			if(slide_number > 3) slide_number = 1;
			$('.slide-btn a:nth-of-type('+slide_number+')').click();
		},3000);
	}


	$('.login').dialog({
		autoOpen : false,
		modal:true
	});

	$('.join').dialog({
		autoOpen : false,
		modal:true,
		width : "700px"
	});
	
	$('#header > section > div a').not('.logout').click(function(e){
		e.preventDefault();
		var target = $(this).attr('href');
		$('.'+target).dialog('open');
	});

	var id_chk = false,
		pw_chk = false,
		auto_val = null;

	$('#j_id').keyup(function(){
		var val = this.value;
			chk = /^[a-z]+[\w]{4,17}$/g;
		
		if(chk.test(val)){
			$.get('/action/user/id_chk',{ 'id' : val },function(text){
				if(text == '0'){
					id_chk = true;
					$('.id_chk').html('사용가능한 아이디입니다.');
					$('.id_chk').css('color','green');
				}else{
					id_chjk = false;
					$('.id_chk').html('중복된 아이디입니다.');
					$('.id_chk').css('color','red');
				}
			});
		}else{
			id_chk = false;
			$('.id_chk').html('아이디는 영문으로 시작해야하며, 5~16글자 사이로 만들어주세요.');
			$('.id_chk').css('color','red');
		}
	});

	$('#j_pw').keyup(function(){
		var chk = /[!@#]/gi,
			val = this.value;

		pw_chk = chk.test(val);
		if(!pw_chk){
			$('.pw_chk').html('비밀번호에 !,@,#중 하나를 넣어주세요.').css('color','red');
		}else{
			$('.pw_chk').html('사용가능한 비밀번호 입니다. 입니다.').css('color','green');
		}
	});

	$('.join form').submit(function(){
		var is_submit = true;

		$('.join table input').each(function(){
			if(this.value === ""){
				$(this).css('background','#f99');
				is_submit = false;
			}else{
				$(this).css('background','#fff');
			}
		});
		var auto_chk = $('#auto').val() == auto_val;
		if(!is_submit) alert('필수입력사항을 확인해주세요');
		else if(!auto_chk){
			alert('자동가입방지를 다시 입력해주세요.');
			$('#auto').css('background','#f99');
		}else if(!id_chk){
			alert('아이디를 다시 입력해주세요.');
			$('#j_id').css('background','#f99');
		}else if(!pw_chk){
			alert('비밀번호를 다시 입력해주세요.');
			$('#j_pw').css('background','#f99');
		}
		return is_submit && id_chk && pw_chk && auto_chk;
	});

	function make_capcha(){
		if($('.auto img').length >= 1){
			$('.auto img').before('<canvas width="150" height="80"></canvas>').remove();
		}
		var str = '1234567890qwertyuiopasdfghjklzxcvbnm',
			arr = str.split('').sort(function(){ return 0.5-Math.random(); });
			str = arr.join('').substr(1,5);
		
		var c = document.querySelector('.join canvas');
			ctx = c.getContext('2d');

		ctx.beginPath();
			ctx.font = "20px margun gothic"
			ctx.fillText(str,50,50);
			ctx.fillStyle = 'red';
			ctx.fillRect(20,45,110,1);
		ctx.closePath();

		var url = c.toDataURL();
		auto_val = str;

		$('.join canvas').before('<img src="'+url+'" alt="자동가입방지" title="자동가입방지"></img>').remove();	
	}
	make_capcha();
	
	$('.auto [type=button]').click(function(){
		make_capcha();
	});

	$('.join .move-box [type=button]').click(function(){
		$('.join').dialog('close');
	});

	if($('.reserve').length > 0){
		var max_amount = 200;

		function dateSelect(date){
			$('.play-box').dialog('open');
			$('.date-view').html(date);
			$('#date').val(date);
		}

		function amount_spin(ui,value){
			var val = typeof(value.value) == 'number'? value.value : this.value;
			$('.total-amount').html(max_amount-val+'명');
		}

		$('.reserve > .date').datepicker({
			minDate : 0,
			onSelect:dateSelect,
			dateFormat : 'yy-mm-dd'
		});
		
		$('.reserve .play-box').dialog({
			autoOpen : false,
			modal : true,
			width : '700px'
		});
		
		var reserve_submit = false;

		$('#minite').change(function(){
			reserve_submit = false;
		});

		$('#time').change(function(){
			reserve_submit = false;
			var html_2 = '<option value="00">00</option><option value="30">30</option>',
				html_1 = '<option value="00">00</option>';

			$('#minite').html(this.value === '21'? html_1 : html_2);
		});

		$('.play-box form').submit(function(){
			
			if(!reserve_submit)
				alert('예약확인 버튼을 눌러주세요.');
			else if(max_amount - $('#amount').val() < 0){
				alert('예약가능 인원이 초과하였습니다.');
				reserve_submit = false;
			}
			return reserve_submit;
		});

		$('.play-box [type=button]').click(function(){
			var option = {
				date : $('.date-view').html(),
				time : $('#time').val(),
				minite : $('#minite').val()
			}

			$('#amount').spinner({
				spin : amount_spin,
				change : amount_spin
			});
			
			$('#amount').removeAttr('disabled');
			$('.total-amount').html(max_amount - $('#amount').val()+'명');

			$.get('/action/reserve/amount_chk',option, function(text){
				console.log(text);
				max_amount = 200-Number(text);
				$('.total-amount').html(max_amount-$('#amount').val()+'명');
			});
			
			reserve_submit = true;
		});
	}

	if($('.admin').length > 0){

		function select_function(s_date){
			$.get('/action/admin/get_reserve',{date : s_date}, function(text){
				$('.reserve-list').html(text);
			});
			$('.time-table').dialog('open');
		}

		$('.datepicker').datepicker({
			minDate : 0,
			dateFormat : 'y-m-d',
			onSelect: select_function
		});
		
		$('.time-table').dialog({
			autoOpen : false,
			modal : true,
			width : '603px'
		});

		$('.time-table div').sortable({
			connectWith : '[data-time] div, .reserve-list',
			item : '.reserve-list div'
		});

		$('.time-table .move-box [type=button]').click(function(){
			$('.time-table').dialog('close');
		});

		$('.time-table form').submit(function(){
			$('[data-time] input').each(function(){
				var idx= $(this).attr('data-idx'),
					val = $(this).parents('[data-time]').attr('data-time');
				$(this).attr('name','idx'+idx).val(val);
				return
			});
		});



		/*function canvas(){
			var year = { "year" : $('select').val() };

			var c = document.querySelector('.admin canvas');
				ctx = c.getContext('2d');

			var canvas_val = null;

			$.ajaxSetup({ async:false });

			$.get('/action/admin/canvas',year,function(text){
				$('.canvas-val').html(text);
			});
			
		}*/

		function canvas(){
			var year = { "year" : $('select').val() };

			var c = document.querySelector('.admin canvas');
				ctx = c.getContext('2d');

			var canvas_val = null;

			$.ajaxSetup({ async:false });

			$.get('/action/admin/canvas',year,function(text){
				$('.canvas-val').html(text);
			});

			var values = $('.canvas-val input').values();
			var max = values.max();
			var marginLeft = 67;
			var marginTop = 250;
			var barHeight = 200;
			var barWidth = 200;

			$('.canvas-val input').each(function(i){
				var data = this.value;

				ctx.beginPath();
					ctx.fillStyle = 'red';
					ctx.fillRect(110 + marginLeft * i, marginTop - (data / max) * barHeight , 10 , (data / max) * barHeight);
				ctx.closePath();

				ctx.beginPath();
					ctx.font="12px malgun gothic";
					ctx.fillStyle = '#444';
					ctx.fillText(data+'명',103 + marginLeft * i, marginTop - (data / max) * barHeight -10 );
				ctx.closePath();
			});

		}

		canvas();
		
		ctx.beginPath();
			ctx.fillStyle ="#666";
			ctx.fillRect(0,250,900,1);
		ctx.closePath();

		ctx.beginPath();
			ctx.fillStyle ="#666";
			ctx.fillRect(80,0,1,300);
		ctx.closePath();

		for(var i = 0; i <12; i++){
			ctx.beginPath();
				ctx.font = '15px margun gothic';
				ctx.fillText((i+1)+'월',100+(i *67 ),280);
			ctx.closePath();
		}

		$('.admin select').change(canvas);
	}
});