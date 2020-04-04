jQuery(document).ready(function($){

    
//    if($(".first-wave").length > 0 || $(".reel-box iframe").length > 0){
    if($(".first-wave").length > 0){        
        if($(".first-wave").length > 0){
            $(".first-wave").Lazy({
            visibleOnly: false,
            delay:0,
            effect: 'fadeIn',
            removeAttribute: true,
            onFinishedAll: function() {
                runSliders();
                runReelSliders()
                runSecond();
                
                $('.loading').toggleClass('loaded');
                if( !this.config("autoDestroy") )
                this.destroy();
             }
            })
       }
   }else{
       $('.loading').toggleClass('loaded');
                runSliders();
                runReelSliders()
                runSecond();
   }
    
    function runReelSliders(){
//        $('.reel-main-box').on('afterChange', function(event, slick, currentSlide, nextSlide){
//
//            $('.reel-box iframe').each(function(index, iframe){
//                var player = new Vimeo.Player(iframe);
////                     player.setCurrentTime(0);
//                    player.pause()
//                
//            });
//       });
//        
//        var count = $('#conter').data('count');

    }
    
    
    function runSecond(){
        $(".second-wave").Lazy({
            scrollDirection: 'vertical',
            effect: 'fadeIn',
            effectTime: 300,
            visibleOnly: true,
                onFinishedAll: function() {
                    if( !this.config("autoDestroy") ){
                        this.destroy();    
                    }
                }
        });
        
    }

	    function runSliders(){
//            var containers = ['.inner_gallery', '.fs-slider', '.image_slider'];
//            
//            
//			
//			containers.forEach(function(element, index){
//                $(element).on('init', function(slick){
//                    if(element == '.fs-slider' && $('.slick-current .video_container').data('video') != ''){
//                        var videoBase = atob( $('.slick-current .video_container').data('video'));
//                        
//                        $('.slick-current .video_container').html(videoBase);
//                        $('.slick-current .video_container').attr('data-video', '');
//                    }
//                        
//                        $('.slick-current video').each(function(e,i){
//                           var video = $(this);
//                           video[0].play();
//                        });
//                }); 
//            });
//			
//			
//			containers.forEach(function(element, index){
//				if( $(element).length > 0 ){
//					$(element).slick({
//						infinite: true,
//						slidesToShow: 1,
//						slidesToScroll: 1,
//						arrows: true,
//						autoplay: true,
//                        draggable: true,
//                        pauseOnHover: false,
//						autoplaySpeed: 5000,
//						prevArrow: '<div class="arrow prev-arrow"></div>',
//						nextArrow: '<div class="arrow next-arrow"></div>'          
//
//					});
//				}
//			});
//			
//			$('.fs-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
//                if( $('.slick-current .video_container').data('video') != ''){
//                    var videoBase = atob( $('.slick-current .video_container').data('video'));
//                        
//                    $('.slick-current .video_container').html(videoBase);
//                    $('.slick-current .video_container').attr('data-video', '');
//                }
//				videoSlider(event, slick, currentSlide, nextSlide);
//			});
//			$('.inner_gallery').on('afterChange', function(event, slick, currentSlide, nextSlide){
//				videoSlider(event, slick, currentSlide, nextSlide);
//			});
////			
////            $('.fs-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
////                console.log(nextSlide);
////            });
//            
//			
//			function videoSlider(event, slick, currentSlide, nextSlide){
//                
//  				$('.fs-slide video').each(function(e,i){
//					var video = $(this);
//                    video[0].currentTime = 0;
//					video[0].pause();
//				});
//				$('.slick-current video').each(function(e,i){
//					var video = $(this);
//					video[0].play();
//				});
//			}
//			
		}
	
	$('.mobile_icon').on('click', function(event){
		$('header').toggleClass('mobile_open');
		$(this).toggleClass('opened');
		$('.menu-main-menu-container').toggleClass('opened');
	});

});		
	
    