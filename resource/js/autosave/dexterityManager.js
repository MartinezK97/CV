$(document).ready(function(){
    $('#dexterity input').change(function(){
        var rel = $(this).attr('rel');
        send('user/dexterity/update', {'position':rel, 'value': $(this).val()})
    })

    $('#dexterity .trashDexterity').click(function(){
        var rel = $(this).attr('rel');
        send('user/dexterity/trash', {'position':rel})
        $(this).parent("p").css('display','none');
    })

    $('#dexterity .newDexterity').click(function(){
        $("#dexterity .contentNewDextery").css('display','block');
            

    })

    $("#newDexterityVal").change(function(){
        var val = $(this).val();
        var save = send('user/dexterity/new/', {'value':val});
        if(save.data){
            console.log("23 true");
            alert("save.data.success");
        }
    })


});