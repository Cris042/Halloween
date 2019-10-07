$(function(){
	
	$('.ajax').ajaxForm({
		dataType:'json',
		beforeSend:function()
		{
			$('.ajax').animate({'opacity':'0.6'});
			$('.ajax').find('input[type=submit]').attr('disabled','true');
		},
		success: function(data)
		{
			$('.ajax').animate({'opacity':'1'});
			$('.ajax').find('input[type=submit]').removeAttr('disabled');
			$('.erro-box').remove();
			$('#exampleModal').modal('hide');
			$('.box-sucesso').remove();
			if(data.sucesso)
			{
				$('.modal-cadastro').prepend('<div class="box-sucesso"><i class="fa fa-check"></i> '+data.mensagem+'</div>');
				$('.erro-box').remove();
				// $('html, header').animate({ scrollTop: $('.ajax').offset().top }, 'slow');
				$('#exampleModal').modal('show');
			}
			else
			{
				$('.modal-cadastro').prepend('<div class="erro-box"><i class="fa fa-times"></i> '+data.mensagem+'</div>');
				$('.box-sucesso').remove();
				// $('html, header').animate({ scrollTop: $('.ajax').offset().top }, 'slow');
				$('#exampleModal').modal('show');
				
			}
			
		}
	})

	$('.ajax_modal').ajaxForm({
		dataType:'json',
		beforeSend:function()
		{
			$('.ajax_modal').animate({'opacity':'0.6'});
			$('.ajax_modal').find('input[type=submit]').attr('disabled','true');
		},
		success: function(data)
		{
			$('.ajax_modal').animate({'opacity':'1'});
			$('.ajax_modal').find('input[type=submit]').removeAttr('disabled');
			$('.erro-box').remove();
			$('.box-sucesso').remove();
			if(data.sucesso)
			{
				$('.modal-ajax').prepend('<div class="box-sucesso"><i class="fa fa-check"></i> '+data.mensagem+'</div>');
				$('.erro-box').remove();
				// $('html, header').animate({ scrollTop: $('.ajax_modal').offset().top }, 'slow');
			}
			else
			{
				$('.modal-ajax').prepend('<div class="erro-box"><i class="fa fa-times"></i> '+data.mensagem+'</div>');
				$('.box-sucesso').remove();
				// $('html, header').animate({ scrollTop: $('.ajax').offset().top }, 'slow');
			
			}
			
		}
	})
	
	$(":input[class=input-busca]").bind('keyup change input', function () {
		sendRequest();
	});

	function sendRequest(){

		$('.ajax_pesquisa').ajaxSubmit({
            success:function(data)
            {
                $('.box-enventos').html(data);
                console.log("olaa mundo");
			}
		})
	}
	
})