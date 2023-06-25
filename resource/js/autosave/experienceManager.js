$(document).ready(function(){
    

    
    
    $('.modal  .close').click(function(){
        $(".modal").css('display','none')
    });
    
    
    $("#openNewExperience").click(function(){
        $("#newExperienceModal").css('display','block');

    })

    $("#openNewEducation").click(function(){
        $("#newEducationModal").css('display','block');

    })

    $("#openNewCourse").click(function(){
        $("#newCourseModal").css('display','block');

    })

    $("#newExperienceModal > .submit").click(function(){
        var appointment = $("#newExperienceAppointment").val();
        var date = $("#newExperienceDate").val();
        var description = $("#newExperienceDescription").val();

        if(appointment != "" && date != "" && description != ""){
            alert("Enviar info");
            send('user/experiences/new/', {
                'appointment':appointment,
                'date':date,
                'description':description,
            })
        }else{
           alert("Complete todos los campos"); 
        }
        return false;
    })

    $("#newCouseModal > .submit").click(function(){
        var title = $("#newCourseTitle").val();
        var date = $("#newCourseDate").val();
        var description = $("#newCourseDescription").val();

        if(title != "" && date != "" && description != ""){
            alert("Enviar info");
            send('user/courses/new/', {
                'title':title,
                'date':date,
                'description':description,
            })
        }else{
           alert("Complete todos los campos"); 
        }
        return false;
    })


})