$(document).ready(function(){
    
    
    
    $('.modal  .close').click(function(){
        $(".modal").css('display','none')
    });
    
    
    $("#openNewEducation").click(function(){
        $("#newEducationModal").css('display','grid');

    })


    $("#newEducationModal .submit").click(function(){
        
        alert();
        var institution = $("#newEducationIntitution").val();
        var date = $("#newEducationDate").val();
        var description = $("#newEducationDescription").val();

        if(institution != "" && date != "" && description != ""){
            var asd = send('user/education/new/', {
                'institution':institution,
                'date':date,
                'description':description,
            })
            console.log(asd);
        //     var html = '<div class="content-block">';
        //     var html =+ '<button title="Eliminar" class="trash trashEducation" rel="<?php echo $i?>"><i class="fa fa-trash"></i></button>';
        //     <input class="institution" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['institution']?>">
        //     <input class="tt3 date" type="text" rel="<?php echo $i?>" value="<?php echo $user['formacion'][$i]['date'];?>">
        //     <textarea class="description" rel="<?php echo $i?>"><?php echo $user['formacion'][$i]['description'];?></textarea>
        // </div>
        //     "
            $('#education').append(html);
        }else{
           alert("Complete todos los campos"); 
        }
        return false;
    })


    // Si cambia el cargo en una experiencia creada
    $('#education .institution').change(function(){
        var rel = $(this).attr('rel'); 
        send('user/education/update', {'position':rel, 'institution':$(this).val()})
    })
    // Si cambia la fecha en una experiencia creada
    $('#education .date').change(function(){
        var rel = $(this).attr('rel'); 
        send('user/education/update', {'position':rel, 'date':$(this).val()})
    })
    // Si cambia la descripcion en una experiencia creada
    $('#education .description').change(function(){
        var rel = $(this).attr('rel'); 
        send('user/education/update', {'position':rel, 'description':$(this).val()})
    })

    // Si se elimina la experiencia
    $(".trashEducation").click(function(){
        var position = $(this).attr('rel');
        send('user/education/trash/', {'position':position});
        $(this).parent('.content-block').css('display','none')
    })

})