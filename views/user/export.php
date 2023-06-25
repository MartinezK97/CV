<!-- <?php $user = $this->getData['currentUser'];?> -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Valeria CV</title>
        <?php $this->libs([ 'colorpicker', 'jsPDF','fontawesome']);?>
        <?php $this->css(['default', 'header','a4', 'estilo1','modals','fontawesome','suscriptions']);?>
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
            <?php $this->render('user/header');?>

            <div class="content-all">
                <div class="content-box">
                    <article class="box">
                        <p class="title">Free</p>
                        <p><i class="fa fa-check"></i> Descarga en PDF</p>
                        <p><i class="fa fa-check"></i> Imprime en tiempo real</p>
                        <p><i class="fa fa-check"></i> Imprime en tiempo real</p>
                        <a href="#" class="button">Lo quiero!</a>
                    </article>
                </div>
            </div>
    </body>
<html>