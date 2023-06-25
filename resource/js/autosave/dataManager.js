$(document).ready(function(){

    $("#name").change(function(){
        send('user/name', {'name':$(this).val()});
    });

    $('#profession').change(function(){
        send('user/profession', {'profession':$(this).val()})
    })

    $('#email').change(function(){
        send('user/email', {'email':$(this).val()})
    })

    $('#mobile').change(function(){
        send('user/mobile', {'mobile':$(this).val()})
    })

    $('#location').change(function(){
        send('user/location', {'location':$(this).val()})
    })

    $('#myprofile').change(function(){
        send('user/myprofile', {'myprofile':$(this).val()})
    })

    $('#experiencias .appointment').change(function(){
        var rel = $(this).attr('rel'); 
        send('user/experiences/update', {'position':rel, 'appointment':$(this).val()})
    })
    $('#experiencias .date').change(function(){
        var rel = $(this).attr('rel'); 
        send('user/experiences/update', {'position':rel, 'date':$(this).val()})
    })
    $('#experiencias .description').change(function(){
        
        var rel = $(this).attr('rel'); 
        alert(rel);
        send('user/experiences/update', {'position':rel, 'description':$(this).val()})
    })

})