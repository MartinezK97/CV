$(document).ready(function(){
    console.log("saveImage.js is ready");

    //Abrir biblioteca de archivos local al haver click en la imagen
    $(".contenedor-foto").click(function(){ $('#faceID').click(); });

    //Detecta cuando haya un cambio de imagen
    $("#faceID").change(function(){
        //Previsualizar
        preview();
        //Desplegar la opcion del menu
        $('#rightMenu > button.img-set, #rightMenu > section.image-setting ').addClass('expand');
        //Guardar
        updateImageProfile()
    })

    $('#faceID').change(function() {
        var file = this.files[0];
        if (file) {
          var reader = new FileReader();
    
          reader.onload = function(e) {
            var image = $('<img>').attr('src', e.target.result);
            $('.contenedor-foto').empty().append(image);
    
            
          };
    
          reader.readAsDataURL(file);
        }
      });
    

    //Previsualiza la imagen en tiempo real
    function preview(){
        console.log("preview() run ");

        var img = $("#faceID");
        if (img.files && img.files[0]) {
            console.log("preview() exist file ");

            var reader = new FileReader();
            reader.onload = function (e) {
                $("#contentPreviewImg").html("<img class='previewImgClient' src='"+e.target.result +"'/>");
            };
            reader.readAsDataURL(img.files[0]);
        }
    }

    //Guarda la imagen
    function updateImageProfile(){
        // console.log("updateImageProfile() ");
        var img = document.getElementById("faceID");
        if (img.files && img.files[0]) {
            alert("Hay imagen")
            var form = new FormData();
            form.append('file',img.files[0]);
            sendFile('user/picture/update',{'file':img.files[0]});
        }
    }

    $(".contenedor-foto > img").draggable({
        stop: function(){
            var xPos = $(this).css('left');
            var yPos = $(this).css('top');
            send('user/styles/picturePosition', {'top':yPos,'left':xPos})
            // console.log('(top:'+xPos+', left:'+yPos+')')
        }
    });

    function updateCounterStatus( $event_counter, new_count ) {
        // first update the status visually...
        if ( !$event_counter.hasClass( "ui-state-hover" ) ) {
          $event_counter.addClass( "ui-state-hover" )
            .siblings().removeClass( "ui-state-hover" );
        }
        // ...then update the numbers
        $( "span.count", $event_counter ).text( new_count );
      }

})//END jQUERY