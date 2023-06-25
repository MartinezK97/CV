<?php $user = $this->getData['currentUser'];?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valeria CV</title>
    <?php $this->libs([ 'colorpicker', 'jsPDF','fontawesome']);?>
    <?php $this->css(['default', 'header','a4', 'estilo1','modals','all']);?>
    <style id="userSettings">
        :root{
            --primaryColor: <?php echo $user['styles']['primaryColor'];?>;
            --titleColor: <?php echo $user['styles']['titleColor'];?>;
            --subtitleColor: <?php echo $user['styles']['subtitleColor'];?>;
            --borderRadiusBox: <?php echo $user['styles']['borderRadiusBox']."px";?>;
            --borderRadiusPicture: <?php echo $user['styles']['borderRadiusPicture']."px";?>;
            --fontSizeHeader: <?php echo $user['styles']['fontSizeHeader']."px";?>;
            --fontSizeHeader2: <?php echo $user['styles']['fontSizeHeader2']."px";?>;
            --borderWidthImg: <?php echo $user['styles']['borderWidthImg']."px";?>;
            --userPictureProfile: <?php echo "url(../img/users/".$user['foto'].");"?>;
            --userPicturePositionX: <?php echo $user['styles']['foto_x']."% "?>;
            --userPicturePositionY: <?php echo $user['styles']['foto_y']."%"?>;
            --userPicturePosition: var(--userPicturePositionX) var(--userPicturePositionY);
            --userPictureSize: <?php echo $user['styles']['foto_z']."%";?>;
        }
        .contenedor-foto{
             
                background-image:url(<?php echo "resource/". $user['foto']?>);
                border-width: var(--borderWidthImg);
        }
        
    </style>
</head>
<body>
    <!-- Header -->
    <section id="header" class="borderRadiusBox fontSizeHeader">
        <a href="<?php echo constant('URL');?>"> Currículum Web</a>
        <section class="buttons">
            <i class="fa fa-bars"></i>
        </section>
    </section>

    <!-- A4 -->
    <?php require "hoja.php"?>

    
        

    <section id="adjust" class="accordion">
        <h2 class="ajustes">Colores</h2>
            <div>
                <p class="line">Primario<input type="color" name="" id="primaryColor" value="<?php echo $user['styles']['primaryColor']?>"></p>
                <p class="line">Titulos:<input type="color" name="" id="titleColor" value="<?php echo $user['styles']['titleColor']?>"></p>
                <p class="line">Subtitulos:<input type="color" name="" id="subtitleColor" value="<?php echo $user['styles']['subtitleColor']?>"></p>
                <!-- <h4>Bordes curvos</h4>
                
                <div class="content-slider">
                    <span>Imagen</span>
                    <div id="slider-br-pic" class="bar">
                        <div id="slid-br-p" class="slid ui-slider-handle"></div>
                    </div>
                </div>

                <div class="content-slider">
                    <span>Cajas<span>
                    <div id="slider-br-box" class="bar">
                        <div id="slid-br-b"  class="slid ui-slider-handle"></div>
                    </div>
                </div>
                <h4>Tamaño de fuentes</h4>
                <div class="content-slider">
                    <span>Cabecera<span>
                    <div id="slider-sz-fnt-head" class="bar">
                        <div id="slid-sz-ft-hd"  class="slid ui-slider-handle"></div>
                    </div>
                </div>
                <div class="content-slider">
                    <span>Profesion<span>
                    <div id="slider-sz-fnt-head2" class="bar">
                        <div id="slid-sz-ft-hd2"  class="slid ui-slider-handle"></div>
                    </div>
                </div> -->
                <input type="hidden" id="borderRadiusBox" value="<?php echo $user['styles']['borderRadiusBox']?>">
                <input type="hidden"  id="borderRadiusPicture" value="<?php echo $user['styles']['borderRadiusPicture']?>">
                <input type="hidden"  id="fontSizeHeader" value="<?php echo $user['styles']['fontSizeHeader']?>">
                <input type="hidden"  id="fontSizeHeader2" value="<?php echo $user['styles']['fontSizeHeader2']?>">
                <input type="hidden"  id="borderWidthImg" value="<?php echo $user['styles']['borderWidthImg']?>">
                <input type="hidden"  id="picturePositionX" value="<?php echo $user['styles']['foto_x']?>">
                <input type="hidden"  id="picturePositionY" value="<?php echo $user['styles']['foto_y']?>">
                <input type="hidden"  id="pictureSize" value="<?php echo $user['styles']['foto_z']?>">
            </div>

        <h2>Cabecera</h2>
        <div class="header-adjust">
            <div class=" header-align header-type-select">
                <span>Alineacion derecha</span>
                <div class="header-type">
                    <span class="header-type-pic-left"></span>
                </div>
            </div>
            <div class="header-align">
                <span>Alineacion izquierda</span>
                <div class=" header-type">
                    <span class="header-type-pic-right"></span>
                </div>
            </div>
        
        </div>


        <h2>Margenes</h2>
        <div class="margins">
            <p>superior 
                <input rel="top"  id="document_margin_top" type="number" value="0">
                <select id="document_margin_top_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
            <p>inferior 
                <input rel="bottom" id="document_margin_bottom" type="number" value="0">
                <select  id="document_margin_bottom_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
            <p>derecho 
                <input rel="right" id="document_margin_right" type="number" value="0">
                <select id="document_margin_right_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
            <p>izquierdo 
                <input rel="left" id="document_margin_left" type="number" value="0">
                <select id="document_margin_left_unit">
                    <option value="mm" selected>mm</option>
                    <option value="cm" >cm</option>
                </select>
            </p>
        </div>
    </section> 

    <section class="content-fixed-buttons">

        
        
        <button  title="Guardar documento" id="save_pdf"><i class="fa fa-file-pdf"></i></button>
        <button title="Imprimir documento" id="print"><i class="fa fa-print"></i></button>
        
        <form id="htmltopdf" action="<?php echo constant('URL');?>user/export" method="post">
            <textarea name="html" id="html" style="display:none;"></textarea>
            <button id="export" type="submit" ><i class="fa fa-file-pdf"></i> <span>Vista previa</span></button>
        </form>
    </section>

    <?php 
    // $this->render('user/modals/all');
    $this->libs(['print','jquery', 'axios','colorpicker','jsPDF']);
    $this->js(['config','updateUserData','printAreaJQuery','modals','menu']);
    ?>
</body>
</html>