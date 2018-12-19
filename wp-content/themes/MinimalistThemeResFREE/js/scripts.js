  function creative_slider() {
  
//	var intervalID_slide;
        my_slider_counter = 0;
        curr_slide = 0;
        
        $('#slideshow_cont .slide_box').each(function() {
            $(this).addClass('slide_' + my_slider_counter);
            my_slider_counter++;
           
        });
        
        function home_switch_slide() {
  
            if(curr_slide >= my_slider_counter)
                curr_slide = 0;
            else if(curr_slide < 0)
                curr_slide = (my_slider_counter-1);
            
            $('.slide_' + curr_slide).fadeIn(400);
                
        }
        
        function hide_curr_slide() {
               $('.slide_' + curr_slide).stop();
               //$('.slide_' + curr_slide).fadeOut(1000);
               $('.slide_' + curr_slide).fadeOut(900);
        }
        
        function next_slide_slider(jump_to_slide) {
            hide_curr_slide(); 
            
            if(jump_to_slide == null)
                curr_slide++;     
            else 
                curr_slide = jump_to_slide;
            
            t_slide=setTimeout(home_switch_slide,50); 
            //home_switch_image();
        }
        
        function prev_slide_slider(jump_to_slide) {
            hide_curr_slide();
            
            
//            curr_slide--;        
            if(jump_to_slide == null)
                curr_slide--;     
            else 
                curr_slide = jump_to_slide;
            //home_switch_image();
            t_slide=setTimeout(home_switch_slide,50);
        }        
        
        $('.slide_prev').click(function() {
          
            prev_slide_slider();
            //clearInterval(intervalID_slide);
            //intervalID_slide = setInterval(next_slide_slider, 8000);
		
/*		$('#slideshow_cont').unbind('mouseenter mouseleave');
		$('#slideshow_cont').hover(
			function() {
				clearInterval(intervalID_slide);
				//alert('hover in');
			},
			function() {
				intervalID_slide = setInterval(next_slide_slider, 8000);  
				//alert('hover out');
			}
		);		*/
        });
        
        $('.slide_next').click(function() {
            
            next_slide_slider();
            //clearInterval(intervalID_slide);
            //intervalID_slide = setInterval(next_slide_slider, 8000);
		/*
		$('#slideshow_cont').unbind('mouseenter mouseleave');
		$('#slideshow_cont').hover(
			function() {
				clearInterval(intervalID_slide);
				//alert('hover in');
			},
			function() {
				intervalID_slide = setInterval(next_slide_slider, 8000);  
				//alert('hover out');
			}
		);*/
        });                
        
        //setInterval(next_slide_image, 5000);
        intervalID_slide = setInterval(next_slide_slider, 9000);  
	
	$('#slideshow_cont').hover(
		function() {
			clearInterval(intervalID_slide);
			//alert('hover in');
		},
		function() {
			intervalID_slide = setInterval(next_slide_slider, 9000);  
			//alert('hover out');
		}
	);
  
  
  }  
$(document).ready(function() {
	creative_slider();
	
    $('.header_menu li').hover(
        function () {
            $('ul:first', this).css('display','block');
        }, 
        function () {
            $('ul:first', this).css('display','none');         
        }
    );  
	$('.header_spacing').css('height', $('#header').outerHeight() + 'px');
	    
	$('#main_header_menu').slicknav();
	    
	if($('#header').css('position') == 'absolute')
		$('#header').css('top', $('.slicknav_menu').outerHeight() + 'px');
	else
		$('#header').css('top', '0px');                 				
	$("#home_cont").on("mouseenter", "#stalac_cont .stalac_box", function(event){
		$(this).find('.stalac_box_hover').css('display','block');
	}).on("mouseleave", "#stalac_cont .stalac_box", function(event){
		$(this).find('.stalac_box_hover').css('display','none');
	});  
	    
	$('.archive_box_media').hover(
		function() {
			$(this).find('.archive_box_hover').css('display','block');
		},
		function() {
			$(this).find('.archive_box_hover').css('display','none');
		}
	);
	var $container = $('.home_posts_cont');
	// initialize
	$container.imagesLoaded( function() {
		$container.masonry({
	//		columnWidth: 555,
	/*		columnWidth: function( containerWidth ) {
				return containerWidth / 2;
			},*/
	//		columnWidth: '46%',
			itemSelector: '.home_box',
		    columnWidth: '.grid-sizer',
		    gutter: '.gutter-sizer',			
	//		gutter: 60,
		});
	});
	    
	    
});
$(window).load(function() {
	$('.header_spacing').css('height', $('#header').outerHeight() + 'px');
});
$(window).scroll(function() {
	$('.header_spacing').css('height', $('#header').outerHeight() + 'px');
	if($('#header').css('position') == 'absolute')
		$('#header').css('top', $('.slicknav_menu').outerHeight() + 'px');
	else
		$('#header').css('top', '0px');
	
});
$(window).resize(function() {
	$('.header_spacing').css('height', $('#header').outerHeight() + 'px');
	if($('#header').css('position') == 'absolute')
		$('#header').css('top', $('.slicknav_menu').outerHeight() + 'px');
	else
		$('#header').css('top', '0px');
});