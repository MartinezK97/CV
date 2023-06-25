$(document).ready(function() {
    // aquí puedes escribir tu código jQuery
    
    $('#rightMenu > .acc').click(function(){
        
        var rel = $(this).attr('rel');
        $('.slid.'+rel).toggleClass('expand');
        $(this).toggleClass('expand')
        $(this).children('.contract').toggleClass('fa-sort-down');
        $(this).children('.contract').toggleClass('fa-times')
    })

    $('#leftMenu > .acc').click(function(){
        
        var rel = $(this).attr('rel');
        $('.slid.'+rel).toggleClass('expand');
        $(this).toggleClass('expand');
        // $(this).children('i').toggleClass('fa-sort-down', 'fa-times')
        $(this).children('.contract').toggleClass('fa-sort-down');
        $(this).children('.contract').toggleClass('fa-times')


    })

    $('#leftMenu .addCertificated').click(function(){
        $("#escolaridad").click();
    })



    

    $(".accordion").accordion({
        collapsible: true
    });

    $(".margins p input" ).keyup(function(){
        
        var sizes = setMarginDocument();
        $('.hoja').css('padding', sizes);
        $('.cabecera').css('margin', sizes);
    })

    $(".margins p select" ).change(function(){
        var sizes = setMarginDocument();
        $('.hoja').css('padding', sizes);
        $('.cabecera').css('margin', sizes);
    })

    setMarginDocument()

    if($('.hoja').css("padding-left") > 0){
        alert("margin left > 0");
    }


  });

  function setMarginDocument(){
    var all = ['top','right','bottom','left']
    var name = "document_margin_";
    var res = ""; 
    for(var i=0; i<all.length; i++){
        let elem = $('#'+name+all[i]);
        let size = $('#'+name+all[i]+'_unit');
        if(elem.val() == '' || elem.val == NaN){ elem.val(0)}

        res += elem.val() + size.val() + " ";
    }
    return res;
  }