
<?php 
    $user = $this->getData['currentUser'];
    $templates = $this->getData['templates'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a OnlineCV!</title>
    <?php 
        $this->css(['root', 'default','dashboard', 'fontawesome']);
        $this->js(['main', 'menu']);
        $this->libs(['fontawesome']);
    ?>
    <style>
        :root{
            --maxSizeBlock:calc(var(--a4w) + 420px);
        }
    </style>
</head>
<body>
    <?php $this->render('dashboard/header',['user'=>$user]);?>
    <section class="content-all">
        <?php $this->render('dashboard/leftMenu');?>
        <?php $this->render('dashboard/rightMenu');?>
        <div class="body">
            <section class="summary">
                <h3 class="title">Crea un CV rápido y fácil!</h3>
                <div><i class="fa fa-3x fa-file-alt" ></i> Busca tu template favorito y ajústalo a tu perfil.</div>
                <div><i class="fa fa-3x fa-user-edit" ></i> Completalo con tus datos, y agrega una foto</div>
                <div> <i class="fa fa-3x fa-file-pdf" ></i> Lo puedes imprimir o incluso, descargar en PDF</div>
            </section>
            <?php $this->render('nav')?>
            <section class="content-templates">
                <?php 
                    foreach($templates as $key[] =>$val):
                        $src = "";
                        $img = "";
                        if(file_exists('resource/img/templates/'.$val['id'].".png")):
                            $src = 'resource/img/templates/'.$val['id'].'.png';
                            $img = "<img src='".constant('URL').$src."'>";
                        endif;
                ?>

                    <a href="<?php echo constant('URL')."templates/preview/".$val['id'];?>" class="box" ><?php echo $img;?></article>
                <?php endforeach;?>
            </section><!--FIN CONTENT TEMPLATES-->
        </div>//<!--Fin body -->

    </section><!--FIN CONTENT ALL-->
    <?php
        $this->libs(['jquery','axios',]);
        $this->js(['default','config','main', 'menu']);

    ?>
</body>
</html>