$(document).ready(function(){
    $('#skill input').change(function(){
        var rel = $(this).attr('rel');
        send('user/skill/update', {'position':rel, 'value': $(this).val()})
    })

    $('#skill .trashskill').click(function(){
        var rel = $(this).attr('rel');
        send('user/skill/trash', {'position':rel})
        $(this).parent("p").css('display','none');
    })

    $('#skill .newSkill').click(function(){
        $("#skill .contentNewSkill").css('display','block');
            

    })

    $("#newSkillVal").change(function(){
        var val = $(this).val();
        var save = send('user/skill/new/', {'value':val});
        if(save.data){
            console.log("23 true");
            alert("save.data.success");
        }
    })


});