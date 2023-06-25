$(document).ready(function(){

  //  alert()
  
  var h = $(".right-box").css('height');
      $('hr.timeline').css('height', h);


    $("#save_pdf").click(function(e){
      e.PreventDefault;
      var wh = $(window).height() - 40;
      var dh = $(".hoja").height() ;
      // var wh = $(window).height();
      console.log(wh); ;
      console.log(dh); 
      let rel = (((dh/10 * wh/10)/100)/100)
      $(".hoja").css('transition','1s');
      $("body").append("<div class='message_modal'><p><i class='fa fa-spinner fa-pulse fa-fw'></i> Generando PDF</p></div>");
      $('.message_modal').css({
        "color": "#fff",
        "z-index":"3",
        "position":"absolute",
        "top":"50%",
        "background":"#0005",
        "font-size":"3rem",
        "padding":"25px 50px",
        "border-radius":"10px",
        "top":"0",
        "bottom":"0",
        "left":"0",
        "right":"0",
        "display":"grid",
        "place-items":"center",
        "backdrop-filter":"blur(5px)",
      });
      $(".hoja").css('transform','scale('+rel+') translate(-20%, -25%)');
      $(".hoja").css('position','sticky');
      $(".hoja").css('top','calc(var(--headerH) + 10px)');
      $(".hoja").addClass('scann');

     $("#loadingPDFpreview").css('display','block');
      $('#a4 .notShow').css('display','none');
      var htmlContent = $('#a4').html();
      // var cssContent = "<style>"+$('#userSettings').html() + "</style>";
      $(htmlContent).find(".notShow").remove();
      $("#html").val( htmlContent);
      $("#htmltopdf").submit();
    });


    $(".hoja textarea").on('input',function(){
      auto_grow(this)
    })

    $("#print").click(function(){
      $(".hoja").printArea();
    })

    $(".left-box, .right-box").sortable();

    $(".content-block").mouseenter(function(){
      $(this).css('border','dashed 1px var(--graylight)');
      $(this).children(".trash").css('color','var(--graylight)')
      $(this).children(".dot").css('background','var(--primaryColor)')
    }).mouseleave(function(){
      $(this).css('border','dashed 1px #0000');

      $(this).children(".trash").css('color','#0000')
      $(this).children(".dot").css('background','#fff')

    });

    $(".content-block .trash").mouseenter(function(){
      $(this).css('color','var(--trash)');
      $(this).parent().css('border','dashed 1px var(--trash)');
      $(this).prev(".dot").css('background','var(--trash)')

    }).mouseleave(function(){
      $(this).css('color','var(--graylight)');
      $(this).parent().css('border','dashed 1px var(--graylight)');
      $(this).prev(".dot").css('background','var(--primaryColor)')

    });

    $(".contenedor-foto .add").click(function(){
        $("#file").click()

    })

    $("#file").change(function(){
        alert("Foto de perfil cambiada");
        send('user/imagen/name', {'imgname':$("#file").val()});

        preview();
    });

    $('#borderRadiusBox').change(function(){
        alert();
        send('user/styles/borderRadiusBox/', {'borderRadiusBox':$("#borderRadiusBox").val()});
        
    });

    $("#nombre").change(function(){
        send('user/nombre/',{'nombre':this.value});

    });

    $("#profesion").change(function(){
        send('user/profesion/',{'profesion':this.value});

    });

    $(".trash-exp").click(function(){
      alert($(this).attr('rel'));
      send('user/experiencias/eliminar',{'posision':$(this).attr('rel')});

    });


    $(".trash-for").click(function(){
      alert($(this).attr('rel'));
      send('user/formacion/eliminar',{'posision':$(this).attr('rel')});

    });

    

  //   $(".content-block button.trash").mouseenter(function(){
  //     $(this).parent('.content-block').css('border','solid 1px var(--error)')
  // }).mouseleave(function(){
  //   $(this).parent('.content-block').css('border','solid 1px transparent')

  


    $("#borderRadiusBox").change(function(){
       changeBorderRadiusPicture( this.value);
    })

    $("#email").change(function(){
        send('user/info/email', {'email':this.value});
     })

     $("#movil").change(function(){
        send('user/info/movil', {'movil':this.value});
     })

     $("#localidad").change(function(){
        send('user/info/localidad', {'localidad':this.value});
     })

     $("#sobremi").change(function(){
        send('user/sobremi', {'sobremi':this.value});
     })



     $("#competencias input").change(function(){
        var rel = $(this).attr('rel'); 
        var val = $(this).val();
        send('user/competencias/actualizar', {'position':rel, 'value':val});
     })
     $("#competencias .trash-comp").click(function(){
      var position = $(this).prev().attr('rel');
      let save = send('user/competencias/eliminar', {'competence_delete':position});
      if(save == true){
        alert("Eliminado");
      }
    })

     $("#habilidades input").change(function(){
        var rel = $(this).attr('rel'); 
        var val = $(this).val();
        send('user/habilidades/actualizar', {'position':rel, 'value':val});
     })

     $("#experiencias .date").change(function(){
      var rel = $(this).attr('rel'); 
      var val = $(this).val();
      send('user/experiencias/actualizar', {'position':rel, 'date':val});
   })

   $("#experiencias .appointment").change(function(){
      var rel = $(this).attr('rel'); 
      var val = $(this).val();
      send('user/experiencias/actualizar', {'position':rel, 'appointment':val});
   })

   $("#experiencias .description").change(function(){
    var rel = $(this).attr('rel'); 
    var val = $(this).val();
    send('user/experiencias/actualizar', {'position':rel, 'descripcion':val});
  })
//-------------------------------------
  $("#formacion .date").change(function(){
    var rel = $(this).attr('rel'); 
    var val = $(this).val();
    send('user/formacion/actualizar', {'position':rel, 'date':val});
 })
 $("#formacion .institution").change(function(){
  var rel = $(this).attr('rel'); 
  var val = $(this).val();
  send('user/formacion/actualizar', {'position':rel, 'institution':val});
})

 $("#formacion .description").change(function(){
  var rel = $(this).attr('rel'); 
  var val = $(this).val();
  send('user/formacion/actualizar', {'position':rel, 'descripcion':val});
})

  $("#primaryColor").change(function(){
    send('user/styles/primaryColor/', {'primaryColor':$("#primaryColor").val()});
  });
  $("#titleColor").change(function(){
    send('user/styles/titleColor/', {'titleColor':$("#titleColor").val()});
  });
  $("#subtitleColor").change(function(){
    send('user/styles/subtitleColor/', {'subtitleColor':$("#subtitleColor").val()});
  });


     
});


$( function() {
    var handle = $( "#slid-br-p" );
    $( "#slider-br-pic" ).slider({
        value:$("#borderRadiusPicture").val(),
      create: function() {
        handle.text( $( this ).slider( "value" ) );
      },
      slide: function( event, ui ) {
        handle.text( ui.value );
        setDocumentPropiety('borderRadiusPicture', ui.value+'px')

      },
      change: function(event, ui){
        $('#borderRadiusPicture').val(ui.value);
        send('user/styles/borderRadiusPicture', {'borderRadiusPicture':ui.value})
      }
    });
  });

  $( function() {
    var handle = $( "#slid-br-b" );
    $( "#slider-br-box" ).slider({
        value:$('#borderRadiusBox').val(),
      create: function() {
        handle.text( $( this ).slider( "value" ) );
      },
      slide: function( event, ui ) {
        handle.text( ui.value );
        setDocumentPropiety('borderRadiusBox', ui.value+'px')
        // $('#borderRadiusBox').val(ui.value);
      },
      change: function(event, ui){
        $('#borderRadiusBox').val(ui.value);
        send('user/styles/borderRadiusBox', {'borderRadiusBox':ui.value})
      }
      
    });
  });


//Font size header
$( function() {
  var handle = $( "#slid-sz-ft-hd" );
  $( "#slider-sz-fnt-head" ).slider({
      value:$("#fontSizeHeader").val(),
      min:14,
      max:100,
    create: function() {
      handle.text( $( this ).slider( "value" ) );
    },
    slide: function( event, ui ) {
      handle.text( ui.value );
      setDocumentPropiety('fontSizeHeader', ui.value+'px')

    },
    change: function(event, ui){
      $('#fontSizeHeader').val(ui.value);
      send('user/styles/fontSizeHeader', {'fontSizeHeader':ui.value})
    }
  });
});

$( function() {
  var handle = $( "#slid-sz-ft-hd2" );
  $( "#slider-sz-fnt-head2" ).slider({
      value:$("#fontSizeHeader2").val(),
    create: function() {
      handle.text( $( this ).slider( "value" ) );
    },
    slide: function( event, ui ) {
      handle.text( ui.value );
      setDocumentPropiety('fontSizeHeader2', ui.value+'px')

    },
    change: function(event, ui){
      $('#fontSizeHeader2').val(ui.value);
      send('user/styles/fontSizeHeader2', {'fontSizeHeader2':ui.value})
    }
  });
});

//Border width oimage
$( function() {
  var handle = $( "#slid-br-w" );
  $( "#slider-br-width" ).slider({
      value:$("#borderWidthImg").val(),
    create: function() {
      handle.text( $( this ).slider( "value" ) );
    },
    slide: function( event, ui ) {
      handle.text( ui.value );
      setDocumentPropiety('borderWidthImg', ui.value+'px')
    },
    change: function(event, ui){
      $('#borderRadiusPicture').val(ui.value);
      send('user/styles/borderWidthImg', {'borderWidthImg':ui.value})
    }
  });
});

$( function() {
  var handle = $( "#slid-pic-s" );
  $( "#slider-pic-size" ).slider({
      value:$("#pictureSize").val(),
      min:100,
      max:200,
    create: function() {
      handle.text( $( this ).slider( "value" ) );
    },
    slide: function( event, ui ) {
      handle.text( ui.value );
      setDocumentPropiety('userPictureSize', ui.value+'%')
    },
    change: function(event, ui){
      $('#pictureSize').val(ui.value);
      send('user/styles/fotoZ', {'foto_z':ui.value})
    }
  });
});

$( function() {
  var handle = $( "#slid-p-x" );
  $( "#slider-pic-x" ).slider({
      value:$("#picturePositionX").val(),
      min:-100,
      max:100,
    create: function() {
      handle.text( $( this ).slider( "value" ) );
    },
    slide: function( event, ui ) {
      handle.text( ui.value );
      setDocumentPropiety('userPicturePositionX', ui.value +'%')
    },
    change: function(event, ui){
      $('#picturePositionX').val(ui.value);
      send('user/styles/fotoX', {'foto_x': ui.value})
    }
  });
});

$( function() {
  var handle = $( "#slid-p-y" );
  $( "#slider-pic-y" ).slider({
      value:$("#picturePositionY").val(),
      orientation: "vertical",
      min:-100,
      max:100,
    create: function() {
      handle.text( $( this ).slider( "value" ) );
    },
    slide: function( event, ui ) {
      handle.text( ui.value );
      setDocumentPropiety('userPicturePositionY', ui.value+'%')
    },
    change: function(event, ui){
      $('#picturePositionY').val(ui.value);
      send('user/styles/fotoY', {'foto_y':ui.value})
    }
  });
});


let colorPicker;

let vrbls = [
  'headerColor'
]

window.addEventListener("load", headerColor, false);
window.addEventListener("load", titleColor, false);
window.addEventListener("load", subtitleColor, false);
window.addEventListener("load", profColor, false);
window.addEventListener("load", nameColor, false);



function profColor() {
    colorPicker = document.querySelector("#profColor");
    colorPicker.addEventListener("input", changeProfColor, false);
    colorPicker.select();
  }

  function headerColor() {
    colorPicker = document.querySelector("#headerColor");
    colorPicker.addEventListener("input", changeHeaderColor, false);
    colorPicker.select();
  }

function titleColor() {
    colorPicker = document.querySelector("#titleColor");
    colorPicker.addEventListener("input", changeTitleColor, false);
    // colorPicker.addEventListener("change", send('user/styles/titleColor/', {'titleColor':$("#titleColor").val()}), false);
    colorPicker.select();
  }

  function nameColor() {
    colorPicker = document.querySelector("#nameColor");
    colorPicker.addEventListener("input", changeNameColor, false);
    // colorPicker.addEventListener("change", send('user/styles/titleColor/', {'titleColor':$("#titleColor").val()}), false);
    colorPicker.select();
  }

  function subtitleColor() {
    colorPicker = document.querySelector("#subtitleColor");
    colorPicker.addEventListener("input", changeSubtitleColor, false);
    // colorPicker.addEventListener("change", send('user/styles/subtitleColor/', {'subtitleColor':$("#subtitleColor").val()}), false);
    colorPicker.select();
  }

  /********** */
    function color(id){
      colorPicker = document.querySelector("#"+color);
      colorPicker.addEventListener("input", changeVarCss(id), false);
      colorPicker.select();
    }

    function changeVarCss(vrbl, event){
      document.documentElement.style.setProperty('--'+vrbl, event.target.value);
    }
  /************************ */
  function changeHeaderColor(event) {
    document.documentElement.style.setProperty('--headerColor', event.target.value);
  }


function changeNameColor(event) {
    document.documentElement.style.setProperty('--nameColor', event.target.value);
  }

  function changeProfColor(event) {
    document.documentElement.style.setProperty('--profColor', event.target.value);
  }

  function changeTitleColor(event) {
    document.documentElement.style.setProperty('--titleColor', event.target.value);
  }

  function changeSubtitleColor(event) {
    document.documentElement.style.setProperty('--subtitleColor', event.target.value);
  }

  function setDocumentPropiety(p, v) {
    document.documentElement.style.setProperty('--'+p, v);
  }

  function updateAll(event) {
    // document.querySelectorAll("p").forEach((p) => {
    //   p.style.color = event.target.value;
    // });
    console.log(event);
  }

  function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}




function preview() {
  var img = document.getElementById('file');
  alert("Main::preview() → running");
  let content_img = $('.contenedor-foto');
    
      if (img.files && img.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $(content_img).css("background-image", "url("+ e.target.result + ")");
        };
        
      }
      reader.readAsDataURL(img.files[0]);
  
}