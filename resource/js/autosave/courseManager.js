$(document).ready(function(){
    
        $('.modal  .close').click(function(){
            $(".modal").css('display','none')
        });
        
        
        $("#openNewCourse").click(function(){
            $("#newCourseModal").css('display','grid');
        })
    
    
        $("#newCourseModal > .submit").click(function(){
            var institution = $("#newCourseInstitution").val();
            var date = $("#newCourseDate").val();
            var description = $("#newCourseDescription").val();
    
            if(institution != "" && date != "" && description != ""){
                alert("Enviar info");
                send('user/course/new/', {
                    'institution':institution,
                    'date':date,
                    'description':description,
                })
            }else{
               alert("Complete todos los campos"); 
            }
            return false;
        })
    
    
        // Si cambia el cargo en una experiencia creada
        $('#course .institution').change(function(){
            var rel = $(this).attr('rel'); 
            send('user/course/update', {'position':rel, 'institution':$(this).val()})
        })
        // Si cambia la fecha en una experiencia creada
        $('#course .date').change(function(){
            var rel = $(this).attr('rel'); 
            send('user/course/update', {'position':rel, 'date':$(this).val()})
        })
        // Si cambia la descripcion en una experiencia creada
        $('#course .description').change(function(){
            var rel = $(this).attr('rel'); 
            send('user/course/update', {'position':rel, 'description':$(this).val()})
        })
    
        // Si se elimina la experiencia
        $(".trashCourse").click(function(){
            var position = $(this).attr('rel');
            send('user/course/trash/', {'position':position});
            $(this).parent('.content-block').css('display','none');
        })
    
    })