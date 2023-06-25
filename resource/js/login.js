$(document).ready(function(){
    var placeholderOn = {
        'font-size':'0.75rem',          'color':'var(--primary) ',
        'height':'min-content',         'padding':'0 5px',
        'transform':'translateY(0%)', 'background':'#fff0'
    };

    var placeholderOff = {
            'color':'var(--graylight)',
            'font-size': '1rem',
            'height': '100%',
            'transform': 'translateY(0%)',
            'padding': '0 5px',
            'background':'#fff0'
    }
    $('p.line').mouseover(function(){
        $(this).children('.placeholder').css(placeholderOn);
    }).mouseleave(function(){
        if($(this).children('input').val() == ""){
            $(this).children('.placeholder').css(placeholderOff);
        }
    });



    $("#authenticate").click(function(){
        let u = $('#username').val()
        let p = $('#password').val()
        if(u == "" || p == ""){
            alert("Complete todos los campos");
            return;
        }

        send('login/authenticate', {'username':u,'password':p})
    });


});//end document.ready