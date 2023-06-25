
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valeria CV</title>
    <?php $this->view->libs([ 'colorpicker', 'jsPDF','fontawesome']);?>
    <?php $this->view->css(['default', 'header','a4', 'estilo1','modals','fontawesome']);?>
    <style>
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
    <section id="a4" class="hoja ">
        <section class="cabecera">
        

            <a href="#" class="contenedor-foto">
                
                <!-- <img src="<?php echo constant('URL'). $user['foto'];?>" alt=""> -->
                <button class="add"><i class="fa fa-edit"></i> Cambiar</button>
                <button class="edit openModal" rel="adjustImage"><i class="fa fa-cog"></i> Ajustar</button>
            </a>
            <input type="file" id="file" style="display:none;">
            <div id="contenedor-nombre">
                <input type="text" id="nombre" class="" value="<?php echo $user['nombre'];?>">
                <input type="text" id="profesion" class="profesion" value="<?php echo $user['profesion'];?>">
            </div>
        </section>
        <!-- SECCION IZQUIERDA -->
            <section  class="left-box">
                <!-- Contactos -->
                <div id="contactos" class="block contactos">
                    <p><i class="fa fa-envelope-o"></i> <input type="text" id="email" placeholder="Direccion email" value="<?php echo $user['email'];?>"></p>
                    <p><i class="fa fa-whatsapp"></i> <input type="text" id="movil" placeholder="Numero de contacto" value="<?php echo $user['movil'];?>"></p>
                    <p><i class="fa fa-map-marker"></i> <input type="text" id="localidad" placeholder="Ciudad de recidencia" value="<?php echo $user['localidad'];?>"></p>
                </div>
                <!-- Sobre mi -->
                <div  class="block  sobremi">
                    <h3 class="title"><i class="fa fa-user"></i> Sobre mi</h3>
                    <textarea id="sobremi" id="" placeholder="Brebe descripcion de mi actualizad y personalidad"><?php echo $user['sobremi'];?></textarea>
                </div>
                <div id="competencias" class="block list">
                    <h3 class="title"><i class="fa fa-user"></i> Competencias</h3>
                    <div class="content-data">

                        <?php foreach($user['competencias'] as $k=>$v):?>
                            <p><input type="text" rel="<?php echo $k; ?>" value="<?php echo $v; ?>"><i class="fa fa-times trash trash-comp"></i></p>
                        <?php endforeach; ?>
                    </div>
                        <button class="button-size-s btn-secondary add"><i class="fa fa-plus"></i></button>
                </div>
                <div id="habilidades" class="block list">
                    <h3 class="title"><i class="fa fa-user"></i> Habilidades</h3>
                    <?php foreach($user['habilidades'] as $k=>$v):?>
                        <p><input type="text" rel="<?php echo $k; ?>" value="<?php echo $v; ?>"></p>
                    <?php endforeach; ?>
                </div>
            </section>

    
   <?php
    $this->view->libs(['print','jquery', 'axios','colorpicker','jsPDF']);
    ?>
</body>
</html>