$(document).ready(function(){
    $("#exportPDF").click(function(){
        
        var html  = $(".hoja").html();
        html = "<section class='hoja A4'>"+html+"</section>";
        var idTemplate = $("#templateID").val();
        send('user/saveCV/', {'html':html, 'templateID':idTemplate});
        setTimeout(() => {
            window.location.href = URL+'user/export/'+idTemplate;
            $("#loading").css('display','grid');
        }, 3000);
    });
})