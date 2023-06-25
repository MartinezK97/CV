$(document).ready(function(){
    $("#leftMenu > .lang > a").click(function(){
        var lang = $(this).attr('rel');
        send('user/lang/', {'lang':lang});
    })
})