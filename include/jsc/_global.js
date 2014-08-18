$(document).ready(function() {
	
	//actions
	
	$('#continue').bind('click', function() {
		var lang = $(this).attr('lang');
		if(lang == 1) {$('form').eq(0).submit();}
		else {window.location = "include/php/forward.php";}
	});
	
	$('#back').bind('click', function() {window.location = "include/php/backward.php";});
	
	$('#insert').bind('click', function() {
		$.fn.positions();
		$('.cover').css('visibility', 'visible');;
		element = 0;
		$.fn.request();
		$('form').eq(0).trigger('reset');;
	});
	
	$('#cancel').bind('click', function() {$.fn.reset();});
	
	$('#update').bind('click', function() {
		$.fn.positions();
		element = 1;
		$('form').eq(1).attr('action','include/php/update.php');
		$.fn.request();
	});
	
	//functions
	
	$.fn.positions=(function() {
		$('.cover').css('width', $(document).width());
		$('.cover').css('height', $(window).height());
		$('.cover img').css('marginLeft', Math.floor(($(window).width() - 150) / 2));
		$('.cover img').css('marginTop', Math.floor(($(window).height() - 150) / 2));
		$('.box').css('left', Math.floor(($(window).width() - $('.box').outerWidth()) / 2));
		$('.box').css('top', Math.floor(($(window).height() - $('.box').outerHeight()) / 2));
	});
	
	$.fn.popup=(function() {
		$('.cover').css('visibility', 'visible');
		$('.cover').animate({left:"+=0", opacity:1});
		if(element == 1) {
			$('.box').css('visibility', 'visible');
			$('.box').animate({left:"+=0", opacity:1});
		}
	});
	
	$.fn.fill=(function(item){
		for(i = 1;i < document.forms[1].elements.length;i++){
			document.forms[1].elements[i].value = eval("$('#val"+item+"_"+i+"').html()");
		}
	});
	
	$.fn.commands=(function() {
		$('.items img').each(function() {
			if($(this).attr('title') == 'delete') {
				$(this).bind('click', function() {
					if(confirm("Are you sure you want to delete this entry?")) {
						var item=$(this).attr('lang');
						$.fn.positions();
						$('.cover').css('visibility', 'visible');
						element = 1;
						$('#item').attr('value', item);
						$('form').eq(1).attr('action','include/php/delete.php');
						$.fn.request();
					}
				});
			}
			else {
				$(this).bind('click', function() {
					var item=$(this).attr('lang');
					element = 1;
					$('#item').attr('value', item);
					$.fn.fill(item);
					$.fn.positions();
					$.fn.popup();
				});
			}
		});
	});
	
	$.fn.commands();
	
	$.fn.reset=(function() {
		$('.cover').animate({left:"+=0", opacity:0});
		$('.cover').css('visibility', 'hidden');
		if(element == 1){
			$('.box').animate({left:"+=0", opacity:0});
			$('.box').css('visibility', 'hidden');
		}
	});
	
	$.fn.request=(function() {
		$.ajax({
			type: 'POST',
			url: $('form').eq(element).attr('action'),
			data: $('form').eq(element).serializeArray(),
			dataType: 'html',
			cache: false,
			timeout: 60000,
			beforeSend: function() {
				if($('.cover').css('visibility') == 'hidden') {$.fn.popup();}
			},
			success : function(items) {
				$('#list').html("");
				$('#list').html(items);
				$.fn.commands();
				$.fn.reset();
			},
			error: function(xhr, textStatus, errorThrown){
				$('.cover').css('visibility', 'hidden');
				$('.box').css('visibility', 'hidden');
				alert('An error occurred! ' + (errorThrown ? errorThrown : xhr.status));
			}
		});
	});
	
});