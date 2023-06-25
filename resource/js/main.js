$(document).ready(function(){

    $('#banner .b01').css('background-size','150%');
    setTimeout(() => {
        $('#banner p01').css('background-position','100% 50%');
        
    }, 10000);

    
    var lastScrollTop = 0;
        //  $('body').css({
        //      'background-attachment':'fixed',
        //      'background-image':'url(public/img/company/starsback.png)',
        //  });
      
        $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop){

              if(st > 0){
                $('#header').css('background','#0001')
              }
              if(st > 20){
                $('#header').css('background','#0003')
              }
              if(st > 50){
                $('#header').css('background','#0006')
              }
              if(st > 100){
                $('#header').css('background','#000')
              }
            setTimeout(function(){
              $('body').css('background-position', '0 '+ (st / 5) +'px');
              $('#frontstars').css('background-position', '0 '+ (st / 2) +'px');
              // $('.content_img').css('box-shadow', '0px 5px 5px -1px var(--primary-color)');

            }, 0.2);
        } else {
          setTimeout(function(){
            $('body').css('background-position', '0 '+ (st / 5) +'px');
            $('#frontstars').css('background-position', '0 '+ (st / 2) +'px');
              // $('.content_img').css('transition', '0.3s');
              // $('.content_img').css('box-shadow', '0px -5px 5px -1px var(--primary-color)');

          }, 0.2);


        }
              // $('.content_img').css('box-shadow', '0px 0px 5px -1px var(--primary-color)');

        lastScrollTop = st;
        console.log(lastScrollTop);
});


});