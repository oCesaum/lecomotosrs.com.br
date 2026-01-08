$(function(){

	$('.vehicle-thumbnails li').click(function(){
		var index = $(this).index();
		$('.vehicle-image .active').removeClass('active');
		$('.vehicle-image div:eq('+index+')').addClass('active');
	});

	$('.menu-toggle').click(function(e){
		e.preventDefault();
		$(this).closest('header').toggleClass('active');
	});



	$('.menu-item-login').mouseenter(function(){
		$('.login-box').addClass('active');
	});
	$('.login-box').click(function(e){
		e.stopPropagation();
	});
	$(document).click(function(e){
		if($('.login-box').hasClass('active')){
			$('.login-box').removeClass('active');
		}
	});

	document.addEventListener('keyup',function(e){
		if(e.keyCode==27) {
			if($('.login-box').hasClass('active')){
				$('.login-box').removeClass('active');
			}
		}
	});


	// setInterval(function(){

	// 	var next = $('.carousel-item.active').next();
	// 	if(!next.length) next = $('.carousel-item').first();
	// 	$('.carousel-item.active').removeClass('active');
	// 	next.addClass('active');

	// 	//	var img = next.find('img');
	// 	//	var img_h = img.height();
	// 	//	img.css('top',$('.carousel-item').height() - img_h);
	// 	//	console.log($('.carousel-item').height() - img_h);

	// },6000);


	 $( ".ano-slider" ).slider({
     	range: true,
      min: 10000,
      max: 100000,
      step: 100,
      values: [ 10000, 100000 ],
      slide: function( event, ui ) {
        $( ".busca-valor-label" ).text( "R$ " + ui.values[ 0 ] + " - R$ " + ui.values[ 1 ] );
        $( ".busca-valor" ).val( ui.values[ 0 ] + "-" + ui.values[ 1 ] );
      }
    });
		$( ".busca-valor-label" ).text( "R$ " + $( ".ano-slider" ).slider( "values", 0 ) + " - R$ " + $( ".ano-slider" ).slider( "values", 0 ) );


	$('.whatsapp-toggle').click(function(e){
		e.preventDefault();
		var el = $(this).parent().find('.whatsapp-options');
		if(el.is(':visible')){
			el.hide();
			return;
		}
		el.show();
	});

});
