$(document).ready(function(){




    $('.openModal').click(function(){
        var rel = $(this).attr('rel')
        $("#modal"+rel).css('display','block');
    });


    //Close modals
    $(".closeModal").click(function(){
        $(this).parent('.modal').css('display','none')
    })

    $('html').keydown(function(e){
    if(e.which == 27){
        $(".modal").css('display','none');
    }
});

    $("#modalnewexperience .submit").click(function(){
        if($('#newExperienceTitle').val() != "" && $('#newExperienceDescription').val() != ""){
            var t = $('#newExperienceTitle').val()
            var d = $('#newExperienceDescription').val()
            send('user/experiencias/agregar', {'title':t,'description':d});
            $(this).parent('.modal').css('display','none')
            
            return;
        }
        alert("Complete todos los campos");
    })

});


function confirmate(msg){
    var modal  = $("<section class='modal'>Confirmar:<p>"+msg+"</p></section>");
    $("body").html += modal;
    modal.css('display','block');

}

